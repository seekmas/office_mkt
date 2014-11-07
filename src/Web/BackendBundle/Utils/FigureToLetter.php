<?php

namespace Web\BackendBundle\Utils;

class FigureToLetter
{
    private $numbers = [0,1,2,3,4,5,6,7,8,9];
    private $letters =
        [
            '零' ,
            '壹' ,
            '贰' ,
            '叁' ,
            '肆' ,
            '伍' ,
            '陆' ,
            '柒' ,
            '捌' ,
            '玖' ,
        ];
    private $scale= [
            '拾' ,
            '佰' ,
            '仟' ,
            '万' ,
            '亿' ,
    ];

    public function convert($number)
    {
        if( is_integer($number))
        {
            $this->_integer($number);
        }elseif( is_float($number))
        {
            preg_match('/([0-9]+)\.([0-9]{2})/' , $number , $match);
        }
    }

    public function _integer($number)
    {
        $number .= '';
        for($i = 0 ; $i < strlen($number) ; $i++)
        {
            echo $number[$i].'<br/>';
        }
    }
}