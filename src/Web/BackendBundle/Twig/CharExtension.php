<?php

namespace Web\BackendBundle\Twig;

class CharExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('chr', array($this, 'chr')),
            new \Twig_SimpleFilter('file_extension', array($this, 'file_extension')),

        );
    }

    public function getFunctions()
    {
        return
            [
                'now' => new \Twig_Function_Method($this, 'now')
            ];
    }

    public function chr($number)
    {
        return chr($number);
    }

    public function file_extension($mime)
    {
        $maps = [
            'application/vnd.openxmlformats-officedocument.presentationml.presentation' => 'PPT' ,
            'application/vnd.ms-powerpoint' => 'PPT' ,
            'text/plain' => 'Text' ,
            'image/jpeg' => 'Image' ,
            'image/jpg'  => 'Image' ,
            'image/gif'  => 'Image' ,
            'image/png'  => 'Image' ,
            'application/msword' => 'Word'
        ];

        if(array_key_exists($mime,$maps))
        {
            return $maps[$mime];

        }else
        {
            return $mime;
        }
    }

    public function now()
    {
        return time();
    }

    public function getName()
    {
        return 'char_extension';
    }
}