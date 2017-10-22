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


    public function __construct($sName,$gs,$radius)
    {
        parent::__construct($sName,$gs);

        $this->radius = $radius;
    }

    public function calculateArea()
    {
        $Area = M_PI * (pow($this->radius,2));
        return round($Area,3);
    }

    public function growShape(){
        $this->setArea($this->calculateArea());
        $newArea = $this->getArea()+(($this->gs/100)*$this->getArea());

        //calculation for new radius //
        $newRadius = sqrt($newArea/M_PI);
        $this->setRadius(round($newRadius,3));

        return round($newArea,3);
    }

    public function shrinkShape(){
        $this->setArea($this->calculateArea());
        $newArea= $this->getArea()-(($this->gs/100)*$this->getArea());

        //calculation for new radius //
        $newRadius = sqrt($newArea/M_PI);
        $this->setRadius(round($newRadius,3));

        return round($newArea,3);
    }



    public function getRadius()
    {
        return $this->radius;
    }

    public function setRadius($radius)
    {
      $this->radius = $radius;
    }




}