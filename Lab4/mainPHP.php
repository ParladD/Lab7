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
    <form action="" name="form" method="post">
        <p>
            <fieldset>
                <legend> Circle</legend>
                <label>
                   Radius
                </label><input type="Number" value="<?php echo $_POST['Cradius']?>" name="Cradius">
            </fieldset><br>
        </p>
        <p>
            <fieldset>
               <legend> Rectangle</legend>
            <label>
                Width
            </label><input type="Number" value="<?php echo $_POST['rWidth']?>" name="rWidth">
            <label>
                Length
            </label>
            <input type="Number" value="<?php echo $_POST['rLength']?>" name="rLength">
            </fieldset><br>

        </p>
        <p>
        <fieldset>
            <legend> Triangle</legend>
            <label>
               Base
            </label><input type="Number" value="<?php echo  $_POST['tBase'];?>" name="tBase">
            <label>
               Height
            </label>
            <input type="Number" value="<?php echo  $_POST['tHeight'];?>" name="tHeight">
        </fieldset><br>
        </p>
        <p>
        <input type="submit" value="Calculate" name="calc">
        <input type="Number" value="" name="grow" placeholder="50 %" id="size">
        <input type="submit" value="Grow" name="growb">
        <input type="Number" value="" name="shrink" id="sizes" >
        <input type="submit" value="Shrink" name="shrinkb">


        </p>
    </form>





    <?php

    $cR = $_POST['Cradius'];//circle radius

    $rW = $_POST['rWidth'];//rectangle width

    $rL = $_POST['rLength']; //rectangle length

    $tB =  $_POST['tBase']; //triangle base

    $tH =  $_POST['tHeight'];//triangle height

    $gSize = $_POST['grow'];//grown size
    $sSize = $_POST['shrink'];//shrunk size

    $myCircle = new Circle("Circle",$cR);
    $myReg = new Rectangle("Rectangle",$rW,$rL);
    $myTri = new Triangle("Triangle",$tB,$tH);


    $myReg->setGrowSize($gSize);
    $myReg->setShrinkSize($sSize);
    $myCircle->setGrowSize($gSize);
    $myCircle->setShrinkSize($sSize);
    $myTri->setGrowSize($gSize);
    $myTri->setShrinkSize($sSize);
    $myTri->setBase($tB);
    if(isset($_POST['calc'])){
             echo "<h3> Shape: ".$myCircle->getName()." </h3>";
             echo "<p> Area: ".$myCircle->calculateArea()." </p>";
             echo "<h3> Shape: ".$myReg->getName()." </h3>";
             echo "<p> Area: ".$myReg->calculateArea()." </p>";
             echo "<h3> Shape: ".$myTri->getName()." </h3>";
             echo "<p> Area: ".$myTri->calculateArea()." </p>";

   }//end if


    if(isset($_POST['growb'])){
        // cricle
        echo "<h3> Shape: ".$myCircle->getName()." </h3>";
        echo "<p>New Area: ".$myCircle->growSize()." Grown by $gSize '%'</p>";

        echo "<p> New Radius: $newRad </p>";
        //done circle
        //Rectngle
        echo "<h3> Shape: ".$myReg->getName()." </h3>";
        echo"<p><b>Rectangle is not resizeable</b></p>";
        //done rectangle

        //triangle
        echo "<h3> Shape: ".$myTri->getName()." </h3>";
        echo "<p>New Area: ".$myTri->growSize()." Grown by $gSize '%'</p>";
        $newHeight = ($myTri->growSize()*2)/$myTri->getBase();
        echo"<p> New Height: $newHeight";
        echo"<p> Base:". $myTri->getBase()."</p>";

        //done Triangle
    }
    if(isset($_POST['shrinkb'])){
        //circle
        echo "<h3> Shape: ".$myCircle->getName()." </h3>";
        echo "<p>New Area: ".$myCircle->shrinkSize()." Shrunk by $sSize '%'</p>";
        $newRad = sqrt($myCircle->shrinkSize()/M_PI);
        $newRad = round($newRad,5);
        echo "<p> New Radius: $newRad </p>";

        //end circle
        //Rectngle
        echo "<h3> Shape: ".$myReg->getName()." </h3>";
        echo"<p><b>Rectangle is not resizeable</b></p>";
        //done rectangle

        //triangle
        echo "<h3> Shape: ".$myTri->getName()." </h3>";
        echo "<p>New Area: ".$myTri->shrinkSize()." Shrunk by $sSize '%'</p>";
        $newHeight = ($myTri->shrinkSize()*2)/$myTri->getBase();
        echo"<p> New Height: $newHeight";
        echo"<p> Base:". $myTri->getBase()."</p>";

        //done Triangle
    }



    ?>
</body>
</html>
