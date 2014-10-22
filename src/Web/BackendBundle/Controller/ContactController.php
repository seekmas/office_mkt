<?php


namespace Web\BackendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Web\BackendBundle\Entity\Contact;
use Web\BackendBundle\Form\ContactType;

class ContactController extends Controller
{
    public function indexAction(Request $request)
    {
        $contact = new Contact();
        $contact->setUser($this->getUser());

        $type = new ContactType();
        $form = $this->getForm($contact,$type,$request);

        if($form->isValid())
        {
            $exists = $this->get('contact_entity')->findByCompanyId($contact->getCompany()->getId());
            foreach($exists as $client)
            {
                if($client->getName() === $contact->getName())
                {
                    $this->flash('danger' , '添加失败,发现重复的联系人 '.$contact->getName() . '(所在公司: '.$contact->getCompany().')');
                    return $this->redirect('web_contact_home');
                }
            }

            $contact->setCreatedAt(new \Datetime());

            $em = $this->getManager();
            $em->persist($contact);
            $em->flush();

            $this->flash('success' , '客户'.$contact->getName().'的信息添加成功');
            return $this->redirect('contact_list');
        }

        return $this->render('WebBackendBundle:Contact:index/index.html.twig' , ['form'=>$form->createView()]);
    }

    public function viewAction(Request $request , $uuid)
    {
        $contact = $this->get('contact_entity')->find($uuid);

        return $this->render('WebBackendBundle:Contact:view/index.html.twig' ,
            [
                'contact' => $contact
            ]
        );
    }

    public function listAction()
    {
        $pagination = $this->get('contact_paginator')->getPaginator(5);

        return $this->render('WebBackendBundle:Contact:list/index.html.twig' , ['pagination'=>$pagination]);
    }

    public function findAction(Request $request)
    {

        return $this->render('WebBackendBundle:Contact:find/index.html.twig' );
    }
}
