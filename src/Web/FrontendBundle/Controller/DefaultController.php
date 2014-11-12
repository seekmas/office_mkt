<?php

namespace Web\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {

        return $this->redirect($this->generateUrl('home'));

        //return $this->render('WebFrontendBundle:Default:index.html.twig', array('name' => 'mot'));
    }

    public function homeAction()
    {

        return $this->render('WebFrontendBundle:Default:home/index.html.twig');
    }
}
