<?php

namespace Web\BackendBundle\Controller;

class RailsController extends Controller
{
    public function indexAction()
    {
        return $this->render('WebBackendBundle:Rails:index.html.twig');
    }
}