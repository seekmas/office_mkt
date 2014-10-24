<?php

namespace Web\BackendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Web\BackendBundle\Form\TestType;

class HomeController extends Controller
{
    public function indexAction(Request $request)
    {
        $type = new TestType();
        $form = $this->createForm($type);
        $form->handleRequest($request);
        if($form->isValid())
        {
            ld($form->getData());
        }

        return $this->render('WebBackendBundle:Home:index/index.html.twig',['form'=>$form->createView()]);
    }
}

