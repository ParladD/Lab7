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

    public function __construct($sName, $tBase, $tHeight)
    {
        parent::__construct($sName);
        $this->base = $tBase;
        $this->height = $tHeight;
    }

    public function calculateArea()
    {

        $b = $this->getBase();
        $h = $this->getHeight();

        $totArea = ($b * $h)/2;
        return $totArea;
    }

    public function growSize(){
        $this->setArea($this->calculateArea());
        $growSize = $this->getGrowSize();
        $newTot = $this->getArea()+(($growSize/100)*$this->getArea());
        $newTot = round($newTot,5);
        return  $newTot;
    }

    public function shrinkSize(){
        $this->setArea($this->calculateArea());
        $shrinkSize = $this->getShrinkSize();
        $newTot = $this->getArea()-(($shrinkSize/100)*$this->getArea());
        return  $newTot;
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
}