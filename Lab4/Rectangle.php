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
    private $Length;

    public function __construct($sName,$Rwidth, $RLength)
    {
        parent::__construct($sName);
        $this ->width = $Rwidth;
        $this ->Length = $RLength;
    }
    public function calculateArea()
    {
        // TODO: Implement calculateArea() method.
        $w = $this->getWidth();
        $l = $this->getLength();
        $totArea = $w * $l;
        return  $totArea;
    }
    /*
    public function growSize(){
        $this->setArea($this->calculateArea());
        $growSize = $this->getGrowSize();
        $newTot = $this->getArea()+(($growSize/100)*$this->getArea());
        $newTot = round($newTot,2);
        return  $newTot;

    }


    public function shrinkSize(){
        $this->setArea($this->calculateArea());
        $shrinkSize = $this->getShrinkSize();
        $newTot = $this->getArea()-(($shrinkSize/100)*$this->getArea());
        return "New Area: $newTot";
    }

*/
    public function getWidth()
    {
        return $this->width;
    }


    public function getLength()
    {
        return $this->Length;
    }



}