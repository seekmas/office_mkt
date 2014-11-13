<?php

namespace Web\FrontendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Web\BackendBundle\Controller\Controller;
use Web\FrontendBundle\Entity\AccountInfo;
use Web\FrontendBundle\Form\AccountInfoType;

class AccountInfoController extends Controller
{
    public function indexAction()
    {
        $accounts = $this->get('accountInfo')->findAll();

        return $this->render('WebFrontendBundle:AccountInfo:index/index.html.twig' , ['accounts' => $accounts]);
    }

    public function createAction(Request $request)
    {
        $em = $this->getManager();

        $accountInfo = new AccountInfo();
        $form = $this->getForm($accountInfo,new AccountInfoType(),$request);
        if($form->isValid())
        {
            $accountInfo->setCreatedAt(new \Datetime());

            $em->persist($accountInfo);
            $em->flush();

            return $this->redirect('account_info');
        }

        return $this->render('WebFrontendBundle:AccountInfo:create/index.html.twig' , ['form' => $form->createView()]);
    }

    public function editAction(Request $request , $id)
    {

        if($this->get('security.context')->getToken()->isGranted('ROLE_ADMIN') == false)
        {
            $this->flash('danger' , 'Permission is not allowed ! ');
            return $this->redirect('account_info_edit' , ['id'=>$id]);
        }

        $em = $this->getManager();

        $accountInfo = $this->get('accountInfo')->find($id);
        $form = $this->getForm($accountInfo,new AccountInfoType(),$request);
        if($form->isValid())
        {
            $accountInfo->setCreatedAt(new \Datetime());

            $em->persist($accountInfo);
            $em->flush();

            return $this->redirect('account_info');
        }

        return $this->render('WebFrontendBundle:AccountInfo:create/index.html.twig' , ['form' => $form->createView()]);
    }


    public function trashAction()
    {
        $em = $this->getManager();
        $filters = $em->getFilters();
        $filters->disable('softdeleteable');

        $accounts = $this->getDoctrine()->getRepository('WebFrontendBundle:AccountInfo')->findAll();

        return $this->render('WebFrontendBundle:AccountInfo:trash/index.html.twig' ,
            [
                'accounts' => $accounts
            ]
        );
    }

    public function deleteAction(Request $request,$id)
    {
        $supply = $this->get('accountInfo')->find($id);
        $em = $this->getDoctrine()->getManager();

        $em->remove($supply);
        $em->flush();

        return $this->redirect('account_info');
    }

    public function restoreAction(Request $request , $id)
    {
        $em = $this->getDoctrine()->getManager();
        $filters = $em->getFilters();
        $filters->disable('softdeleteable');

        $supply = $this->get('accountInfo')->find($id);
        $supply->setDeletedAt(NULL);

        $em->persist($supply);
        $em->flush();

        return $this->redirect('account_info');
    }
}