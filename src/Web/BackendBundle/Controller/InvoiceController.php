<?php

namespace Web\BackendBundle\Controller;

class InvoiceController extends Controller
{
    public function indexAction()
    {
        $user = $this->getUser();

        return $this->render('WebBackendBundle:Invoice:index/index.html.twig' , ['user' => $user]);
    }

    public function projectAction($clientId)
    {
        $client = $this->get('client_entity')->find($clientId);

        return $this->render('WebBackendBundle:Invoice:project/index.html.twig' , ['client' => $client]);
    }

    public function createInvoiceAction($contractId)
    {

    }
}