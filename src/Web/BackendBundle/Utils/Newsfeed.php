<?php

namespace Web\BackendBundle\Util;

class Newsfeed
{
    private $container;
    public function __construct($container)
    {
        $this->container = $container;
    }

    public function report($event)
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $date = new \Datetime();

        //echo $user->getUsername() . '在' . ;
    }
}