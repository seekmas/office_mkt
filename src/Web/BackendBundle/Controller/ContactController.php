<?php


namespace Web\BackendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Web\BackendBundle\Entity\Contacts;
use Web\BackendBundle\Form\ContactsType;

class ContactController extends Controller
{
    public function indexAction(Request $request)
    {
        $contact = new Contacts();
        $contact->setUser($this->getUser());

        $type = new ContactsType();
        $form = $this->getForm($contact,$type,$request);

        if($form->isValid())
        {
            $contact->setCreatedAt(new \Datetime());

            $em = $this->getManager();
            $em->persist($contact);
        }

        return $this->render('WebBackendBundle:Contact:index/index.html.twig' , ['form'=>$form->createView()]);
    }

}
