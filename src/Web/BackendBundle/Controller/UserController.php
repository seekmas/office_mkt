<?php
namespace Web\BackendBundle\Controller;

use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Web\BackendBundle\Entity\Attachment;
use Web\BackendBundle\Entity\Avatar;
use Web\BackendBundle\Entity\Document;
use Web\BackendBundle\Form\AttachmentType;
use Web\BackendBundle\Form\AvatarType;
use Web\BackendBundle\Form\DocumentType;

class UserController extends Controller
{
    public function indexAction(Request $request)
    {

        $avatar = $this->getUser()->getAvatar();
        $avatar = $avatar ? $avatar : new Avatar();
        $avatarFile = $avatar->getAvatar();
        $avatarForm = $this->createSubForm($avatar,new AvatarType(),$request,'Avatar is updated ! ');

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

        if($avatarForm instanceof Form)
        {
            return $this->render('WebBackendBundle:User:index/index.html.twig',
                [
                    //display avatar if avatar is existed
                    'avatarFile' => $avatarFile ,
                    //render a form of profile
                    'form' => $form->createView(),
                    //render a form of avatar
                    'avatarForm' => $avatarForm->createView(),
                ]
            );
        }else
        {
            return $avatarForm;
        }
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
        if($form->isValid()) {
            $fm = $this->get('attachment.manager');
            $fm->bind($form, $attachment);
            $fm->save();

            $em = $this->getManager();
            $em->persist($attachment);
            $em->flush();

            $this->flash('success', '合同附件上传成功');
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

        if($this->getUser() == 'anon.')
        {
            throw new AccessDeniedException();
        }

        $this->flash('success' , 'File Download Successfully!');
        return $this->get('attachment.manager')->output($uuid);
    }

    protected function createSubForm($entity , $form , $request , $message)
    {
        $entity->setUser($this->getUser());

        if($entity->getAvatar())
        {
            $entity->setAvatar(NULL);
        }

        $form = $this->createForm($form , $entity);
        $form->handleRequest($request);
        if($form->isValid())
        {
            $this->get('avatar.manager')->bind($form ,$entity , 'avatar');
            $entity->setAvatar( $this->get('avatar.manager')->save() );
            $em = $this->getManager();
            $em->persist($entity);
            $em->flush();
            $this->flash('success' , $message);
            return $this->redirect('user_document');
        }

        return $form;
    }
}