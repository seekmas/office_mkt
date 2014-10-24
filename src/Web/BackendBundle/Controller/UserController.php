<?php
namespace Web\BackendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Web\BackendBundle\Entity\Attachment;
use Web\BackendBundle\Entity\Document;
use Web\BackendBundle\Form\AttachmentType;
use Web\BackendBundle\Form\DocumentType;

class UserController extends Controller
{
    public function indexAction(Request $request)
    {
        $document = $this->getUser()->getDocument() ? $this->getUser()->getDocument() : new Document();
        $document->setUser($this->getUser());
        $type = new DocumentType();
        $form = $this->getForm($document,$type,$request);
        if($form->isValid())
        {
            $document->setUpdatedAt(new \Datetime());
            $em = $this->getManager();
            $em->persist($document);
            $em->flush();
            $this->flash('success' , '个人资料更新成功');
            return $this->redirect('user_document');
        }
        return $this->render('WebBackendBundle:User:index/index.html.twig' ,
            [
                'form' => $form->createView() ,
            ]
        );
    }

    public function contractAction(Request $request)
    {
        $user = $this->getUser();

        if($user->getDocument() == NULL)
        {
            $this->flash('danger' , 'Finish your profile first ! ');
            return $this->redirect('user_document');
        }

        $attachment = new Attachment();
        $attachment->setDocument($user->getDocument());
        $type = new AttachmentType();
        $form = $this->getForm($attachment,$type,$request);
        if($form->isValid())
        {
            $fm = $this->get('attachment.manager');
            $fm->bind($form,$attachment);
            $fm->save();

            $em = $this->getManager();
            $em->persist($attachment);
            $em->flush();

            $this->flash('success' , '合同附件上传成功');
            return $this->redirect('user_contract');
        }

        return $this->render('WebBackendBundle:User:contract/index.html.twig' ,
            [
                'user' => $user ,
                'form' => $form->createView() ,
            ]
        );
    }

    public function downloadAction(Request $request , $uuid)
    {
        $this->flash('success' , 'File Download Successfully!');
        return $this->get('attachment.manager')->output($uuid);
    }
}