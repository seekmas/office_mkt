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
            $exists = $this->get('contacts_entity')->findByCompanyId($contact->getCompany()->getId());

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
            return $this->redirect('web_contact_home');
        }

        return $this->render('WebBackendBundle:Contact:index/index.html.twig' , ['form'=>$form->createView()]);
    }

}
