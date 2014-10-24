<?php

namespace Web\BackendBundle\Twig;

class CharExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('chr', array($this, 'chr')),
        );
    }

    public function chr($number)
    {
        return chr($number);
    }

    public function getName()
    {
        return 'char_extension';
    }
}