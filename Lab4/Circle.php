<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once("Shape.php");
require_once("iResize.php");
class Circle extends Shapes
{
    private $radius;


    public function __construct($sName,$cRadius)
    {
        parent::__construct($sName);
        $this->radius = $cRadius;
    }

    public function calculateArea()
    {
        $totArea = M_PI * (pow($this->getRadius(),2));
        return round($totArea,5);
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



    public function getRadius()
    {
        return $this->radius;
    }

}