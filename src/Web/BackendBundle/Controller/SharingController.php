<?php
namespace Web\BackendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Web\BackendBundle\Entity\Attachment;
use Web\BackendBundle\Entity\Sharing\Category;
use Web\BackendBundle\Form\AttachmentType;
use Web\BackendBundle\Form\Sharing\CategoryType;

class SharingController extends Controller
{
    public function indexAction(Request $request , $categoryId = NULL)
    {

        if( $categoryId != NULL)
        {
            $category = $this->get('sharing_category_entity')->find($categoryId);
        }else
        {
            $is_init = $this->get('sharing_category_entity')->findAll();
            if($is_init)
            {
                $category = $is_init[0];
            }else
            {
                $category = new Category();
                $category->setName('Uncategorized');
                $em = $this->getManager();
                $em->persist($category);
                $em->flush();
            }

        }

        $attachment = new Attachment();
        $type = new AttachmentType();
        $form = $this->getForm($attachment , $type ,$request);
        if($form->isValid())
        {
            $em = $this->getManager();
            $fm = $this->get('attachment.manager');
            $fm->bind($form,$attachment);
            $fm->save();

            $attachment->setSharing($category);

            $em->persist($attachment);
            $em->flush();
            $this->flash('success' , 'File is uploaded successfully ! ');
            if($categoryId)
            {
                return $this->redirect('specific_category' , ['categoryId' => $categoryId ]);
            }else
            {
                return $this->redirect('sharing_home');
            }
        }

        $categories = $this->get('sharing_category_entity')->findAll();

        return $this->render('WebBackendBundle:Sharing:index/index.html.twig' ,
            [
                'categories' => $categories ,
                'form' => $form->createView() ,
                'category' => $category ,
            ]
        );
    }

    public function createCategoryAction(Request $request)
    {
        $category = new Category();
        $type = new CategoryType();
        $form = $this->getForm($category,$type,$request);
        if($form->isValid())
        {
            $exists = $this->get('sharing_category_entity')->findOneByName($category->getName());
            if($exists)
            {
                $this->flash('danger' , 'Category already exists !');
                return $this->redirect('sharing_home');
            }
            $em = $this->getManager();
            $em->persist($category);
            $em->flush();

            $this->flash('success' , 'New category is created ! ');
            return $this->redirect('sharing_home');
        }

        return $this->render('WebBackendBundle:Sharing:create/create.html.twig' ,
            [
                'form' => $form->createView()
            ]
        );
    }
}