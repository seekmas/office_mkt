<?php
namespace Web\BackendBundle\Twig;

class StatusExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('contract_status', array($this, 'contract_status')),
            new \Twig_SimpleFilter('contract_status_color', array($this, 'contract_status_color')),

        );
    }

    public function contract_status($code)
    {
        $status = [
            1 => 'In Process' ,
            2 => 'Terminate' ,
            3 => 'Finish'
        ];

        if(array_key_exists($code , $status) != true)
        {
            return '';
        }

        return $status[$code];
    }

    public function contract_status_color($code)
    {
        $status = [
            1 => 'label label-success' ,
            2 => 'label label-danger' ,
            3 => 'label label-info'
        ];

        if(array_key_exists($code , $status) != true)
        {
            return '';
        }

        return $status[$code];
    }


    public function getName()
    {
        return 'status_extension';
    }
}