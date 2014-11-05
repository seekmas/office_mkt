<?php


namespace Web\BackendBundle\Utils;

class ColorGenerator
{
    private $color = [
        '#666666' ,
        '#666699' ,
        '#669966' ,
        '#6699CC' ,
        '#6699FF' ,
        '#996666' ,
        '#996699' ,
        '#9966CC' ,
        '#9966FF' ,
        '#999966' ,
        '#999999' ,
        '#9999CC' ,
        '#9999FF' ,
        '#99CC99' ,
        '#99CCCC' ,
        '#99CCFF' ,
        '#CC6666' ,
        '#CC6699' ,
        '#CC66CC' ,
        '#CCCC66' ,
        '#CCCCCC' ,
        '#CCCCFF' ,
        '#FF6666' ,
        '#FF6699' ,
        '#FF9966' ,
        '#FF9999' ,
        '#FFCC66' ,
        '#FFCC99' ,
        '#FFCCCC' ,
        '#FFFFCC' ,
    ];

    public function getColor()
    {

        echo $offset = mt_rand(0,count($this->color)-1);

        return $this->color[$offset];
    }

    public function green()
    {
        return '#1ABC9C';
    }

    public function purple()
    {
        return '#9B59B6';
    }

    public function blue()
    {
        return '#3498DB';
    }

    public function red()
    {
        return '#E74C3C';
    }

    public function yellow()
    {
        return '#F39C12';
    }

    public function black()
    {
        return '#394263';
    }

    public function pink()
    {
        return '#FFCCCC';
    }

    public function gray()
    {
        return '#CCCCCC';
    }

    public function brown()
    {
        return '#999966';
    }

    public function heightGreen()
    {
        return '#669966';
    }

    public function lowGreen()
    {
        return '#66CC99';
    }

    public function lightBlue()
    {
        return '#6699FF';
    }
}