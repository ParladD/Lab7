<?php
/**
 * Created by PhpStorm.
 * User: inet2005
 * Date: 10/15/17
 * Time: 10:17 PM
 */

abstract class Shapes
{
    protected $name;
    protected $area;
    protected $gs;


    // Abstract methods
    abstract public function calculateArea();

    public function __construct($sName,$gs)
    {
        $this->name= $sName;
        $this->gs = $gs;


    }

    //WIDTH GETTERS AND SETTERS
    public function getName()
    {
        return $this->name;
    }


    public function setName($sName)
    {
        $this->name = $sName;
    }



    public function setArea($area)
    {
        $this->area = $area;
    }

    public function getArea()
    {
        return $this->area;
    }


    public function getGrowSize()
    {
        return $this->growSize;
    }



    public function setGrowSize($size)
    {
        return $this->growSize = $size;
    }

    public function getShrinkSize()
    {
        return $this->shringSize;
    }

    public function setShrinkSize($sSize)
    {
        $this->shringSize = $sSize;
    }
}




