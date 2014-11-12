<?php


namespace Web\FrontendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Web\BackendBundle\Controller\Controller;
use Web\FrontendBundle\Entity\Supply;
use Web\FrontendBundle\Form\SupplyType;

class InfoController extends Controller
{
    public function indexAction(Request $request)
    {

        $supplies = $this->get('supply')->findAll();
        return $this->render('WebFrontendBundle:Info:index/index.html.twig' ,
            [
                'supplies' => $supplies
            ]
        );
    }

    public function addAction(Request $request , $id = 0)
    {
        $em = $this->getManager();

        $supply = $this->get('supply')->find($id);

        if($supply == NULL)
        {
            $supply = new Supply();
        }

        $form = $this->getForm($supply,new SupplyType() , $request);
        if($form->isValid())
        {
            $supply->setCreatedAt(new \Datetime());
            $em->persist($supply);
            $em->flush();

            $this->flash('success' , '供应商添加成功');
            return $this->redirect('web_info');
        }

        return $this->render('WebFrontendBundle:Info:add/index.html.twig' ,
            [
                'form' => $form->createView() ,
            ]
        );
    }

    public function trashAction()
    {
        $em = $this->getManager();
        $filters = $em->getFilters();
        $filters->disable('softdeleteable');

        $supplies = $this->getDoctrine()->getRepository('WebFrontendBundle:Supply')->findAll();

        return $this->render('WebFrontendBundle:Info:trash/index.html.twig' ,
            [
                'supplies' => $supplies
            ]
        );
    }

    public function deleteAction(Request $request,$id)
    {
        $supply = $this->get('supply')->find($id);
        $em = $this->getDoctrine()->getManager();

        $em->remove($supply);
        $em->flush();

        return $this->redirect('web_info');
    }

    public function restoreAction(Request $request , $id)
    {
        $em = $this->getDoctrine()->getManager();
        $filters = $em->getFilters();
        $filters->disable('softdeleteable');

        $supply = $this->get('supply')->find($id);
        $supply->setDeletedAt(NULL);

        $em->persist($supply);
        $em->flush();

        return $this->redirect('web_info');
    }
}