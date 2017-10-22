<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once("Shape.php");
require_once("iResize.php");
class Triangle extends Shapes
{
    private $base;
    private $height;

    public function __construct($sName,$gs, $Base, $Height)
    {
        parent::__construct($sName,$gs);
        $this->base = $Base;
        $this->height = $Height;
    }

    public function calculateArea()
    {

        $base = $this->getBase();
        $height = $this->getHeight();

        $Area = ($base * $height)/2;
        return $Area;
    }

    public function growShape(){
        $this->setArea($this->calculateArea());
        $newArea = $this->getArea()+(($this->gs/100)*$this->getArea());

        //calculation for new HEIGHT//
        $newHeight = ($newArea*2)/$this->base;
        $this->setHeight(round($newHeight,3));

        return round($newArea,3);
    }

    public function shrinkShape(){
        $this->setArea($this->calculateArea());
        $newArea= $this->getArea()-(($this->gs/100)*$this->getArea());

        //calculation for new HEIGHT //
        $newHeight = ($newArea*2)/$this->base;
        $this->setHeight(round($newHeight,3));

        return round($newArea,3);
    }



    public function getBase()
    {
        return $this->base;
    }
    public function setBase($base)
    {
        $this->base = $base;
    }

    public function getHeight()
    {
        return $this->height;
    }
    public function setHeight($height)
    {
        $this->height = $height;
    }
}