<?php
namespace Web\FrontendBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;

class RestController extends FOSRestController
{
    public function getUser()
    {
        $data = $this->getDoctrine()->getRepository('WebBackendBundle:User')->findAll();

        $view = $this->view($data, 200);

        return $this->handleView($view);
    }
}
