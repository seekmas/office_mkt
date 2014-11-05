<?php

namespace Web\BackendBundle\Controller;

use Doctrine\ORM\EntityNotFoundException;
use Symfony\Component\HttpFoundation\Request;
use Web\BackendBundle\Entity\Client;
use Web\BackendBundle\Form\ClientType;

class ClientController extends Controller
{
    public function indexAction(Request $request)
    {
        $client = new Client();
        $client->setUser($this->getUser());
        $type = new ClientType();
        $form = $this->getForm($client,$type,$request);
        if($form->isValid())
        {
            $client->setCreatedAt(new \Datetime());

            $em = $this->getManager();
            $em->persist($client);
            $em->flush();

            $this->flash('success' , 'New client is created ! ');
            return $this->redirect('client_home');
        }

        return $this->render('WebBackendBundle:Client:index/index.html.twig' ,
            [
                'form' => $form->createView() ,
            ]
        );
    }

    public function listAction($ucwords = NULL)
    {
        $user = $this->getUser();

        if($ucwords)
        {
            $ucwords = trim($ucwords);
            $query = $this->get('client_entity')
                            ->createQueryBuilder('c');
            $clients = $query->select('c')
                  ->where('c.shortName LIKE :ucwords')
                  ->setParameter('ucwords' , $ucwords.'%')
                  ->orderBy('c.createdAt' , 'desc')
                  ->getQuery()
                  ->getResult();
        }else
        {
            $clients = $this->get('client_entity')->findAll();
        }

        return $this->render('WebBackendBundle:Client:list/index.html.twig' ,
            [
                'ucwords' => isset($ucwords) ? $ucwords : 1024 ,
                'clients'=>$clients
            ]
        );
    }

    public function updateAction(Request $request , $id)
    {
        $client = $this->get('client_entity')->find($id);
        if($client == NULL)
        {
            throw new EntityNotFoundException('Client not found ! ');
        }

        return $this->render('WebBackendBundle:Client:update/index.html.twig' ,
            [
                'client' => $client ,
            ]
        );
    }
}