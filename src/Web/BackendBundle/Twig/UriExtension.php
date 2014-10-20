<?php

namespace Web\BackendBundle\Twig;

class UriExtension extends \Twig_Extension
{

    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('is_same_path', array($this, 'is_same_path')),
        );
    }

    public function is_same_path($path)
    {
        if(!$path)
            return false;

        $request = $this->request->getCurrentRequest();

        $path = $request->getSchemeAndHttpHost().$path;
        echo $path;
        echo $request->getUri();
        return $request->getUri() === $path;

    }

    public function getName()
    {
        return 'uri_extension';
    }
}