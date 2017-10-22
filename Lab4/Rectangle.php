<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once("Shape.php");
require_once("iResize.php");
class Rectangle extends Shapes
{
    private $width;
    private $length;

    public function __construct($sName,$gs,$width, $length)
    {
        parent::__construct($sName,$gs);
        $this ->width = $width;
        $this ->length = $length;
    }
    public function calculateArea()
    {
        // TODO: Implement calculateArea() method.
        $width = $this->width;
        $length = $this->length;
        $Area = $width * $length;
        return  $Area;
    }

}