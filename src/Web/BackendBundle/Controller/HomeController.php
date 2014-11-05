<?php

namespace Web\BackendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Web\BackendBundle\Form\TestType;

class HomeController extends Controller
{
    public function indexAction(Request $request)
    {

        return $this->render('WebBackendBundle:Home:index/index.html.twig');
    }
}

