<?php

namespace Web\BackendBundle\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        $this->flash('success' , 'This is a test message');

        return $this->render('WebBackendBundle:Home:index.html.twig');
    }

}

