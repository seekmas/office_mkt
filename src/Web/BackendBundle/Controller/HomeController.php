<?php

namespace Web\BackendBundle\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('WebBackendBundle:Home:index/index.html.twig');
    }
}

