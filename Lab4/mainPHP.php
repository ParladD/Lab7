<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once("Rectangle.php");
include_once("Circle.php");
include_once("Triangle.php");

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title></title>
    <style>
        #size{
            margin-left: 6cm;
        }
        #sizes{
            margin-left: 1cm;
        }
    </style>
</head>

<body>

    <?php

    $circle = $_POST['radius'];//circle radius

    $width= $_POST['width'];//rectangle width

    $length = $_POST['length']; //rectangle length

    $base =  $_POST['base']; //triangle base

    $height =  $_POST['height'];//triangle height

    $gsSize = $_POST['growshrink'];//grown size


    $newCircle = new Circle("Circle",$gsSize,$circle);
    $newRectangle = new Rectangle("Rectangle",$gsSize,$width,$length);
    $newTriangle = new Triangle("Triangle",$gsSize,$base,$height);
    //$circle = $myCircle->getRadius();

    if (isset($_POST['Shrink'])){
        //done circle
        echo"Name: ".$newCircle->getName()."</br>";
        echo"New Area: ".$newCircle->shrinkShape()."</br></br>";
        $circle= $newCircle->getRadius();

        //Rectangle
        echo"Name: ".$newRectangle->getName()."</br>";
        echo "not resizeable</br></br>";

        //triangle
        echo"Name: ".$newTriangle->getName()."</br>";
        echo"New Area: ".$newTriangle->shrinkShape()."</br></br>";
        $height = $newTriangle->getHeight();

    }


    if (isset($_POST['Grow'])){
        echo"Name: ".$newCircle->getName()."</br>";
        echo"New Area: ".$newCircle->growShape()."</br></br>";
        $circle= $newCircle->getRadius();

        //Rectangle
        echo"Name: ".$newRectangle->getName()."</br>";
        echo "not resizeable</br></br>";

        //triangle
        echo"Name: ".$newTriangle->getName()."</br>";
        echo"New Area: ".$newTriangle->growShape()."</br></br>";
        $height = $newTriangle->getHeight();
    }

    if (isset($_POST['calc'])){

        echo"Name: ".$newCircle->getName()."</br>";
        echo"Area: ".$newCircle->calculateArea()."</br></br>";

        //Rectangle
        echo"Name: ".$newRectangle->getName()."</br>";
        echo "Area: ".$newRectangle->calculateArea()."</br></br>";

        //triangle
        echo"Name: ".$newTriangle->getName()."</br>";
        echo"New Area: ".$newTriangle->calculateArea()."</br></br>";
        $height = $newTriangle->getHeight();
    }

    ?>

    <form action="" name="form" method="post">
        <p>
        <fieldset>
            <legend> Circle</legend>
            <label>
                Radius
            </label><input type="Number" value="<?php echo $circle?>" name="radius">
        </fieldset><br>
        </p>
        <p>
        <fieldset>
            <legend> Rectangle</legend>
            <label>
                Width
            </label><input type="Number" value="<?php echo $width?>" name="width">
            <label>
                Length
            </label>
            <input type="Number" value="<?php echo $length?>" name="length">
        </fieldset><br>

        </p>
        <p>
        <fieldset>
            <legend> Triangle</legend>
            <label>
                Base
            </label><input type="Number" value="<?php echo $base ?>" name="base">
            <label>
                Height
            </label>
            <input type="Number" value="<?php echo  $height?>" name="height">
        </fieldset><br>
        </p>
        <p>
            <input type="submit" value="Calculate" name="calc">
            <input type="Number" value="" name="growshrink" placeholder="50 %" id="size">
            <input type="submit" value="Grow" name="Grow">
            <input type="submit" value="Shrink" name="Shrink">


        </p>
    </form>

     <?php



     ?>



</body>
</html>
