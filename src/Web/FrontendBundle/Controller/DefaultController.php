<?php

namespace Web\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WebFrontendBundle:Default:index.html.twig', array('name' => 'mot'));
    }
}
