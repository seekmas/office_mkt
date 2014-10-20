<?php

namespace Web\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;
use Symfony\Component\HttpFoundation\Request;

class Controller extends BaseController
{
    public function redirect($path , $params = [])
    {
        return parent::redirect(parent::generateUrl($path , $params));
    }

    public function flash($type,$message)
    {
        $request = $this->get('request');

        $flash = $request->getSession()->getFlashBag();

        $flash->add($type , $message);
    }

    public function getForm($entity,$type,Request $request)
    {
        $form = $this->createForm($type ,$entity);
        $form->handleRequest($request);
        return $form;
    }

    public function getManager()
    {
        return $this->getDoctrine()->getManager();
    }
}