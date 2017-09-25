


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title> Lab 1 Part A</title>
</head>
<body>


    <form action="#"  method="post" name="PartA">
        <p>Number:
            <input name="num" type="number">
        </p>
        <p>
            User Text:
            <input type="text" name="inputtext" value="">
        </p>
        <p>
            <input name="submit" type="submit">
        </p>
    </form>



        <?php

            function stringInt($value, $text)
            {

                if ($value > 0 && $value <7) {
                    $myvalue = "<h" . $value . ">" . $text . "</h" . $value . ">";
                    return $myvalue;
                } else {
                    $myvalue = "<h1>Error</h>";
                    return $myvalue;
                }

            }

        if(isset($_POST['submit'])) {

           echo stringInt($_POST['num'], $_POST['inputtext']);

            $textvalue = $_POST['inputtext'];
            for ($x = 0; $x <= 6; $x++) {
                echo stringInt($x, $textvalue);
            }
        }
        ?>





    <section>
        <h1>Step 2</h1>
        <?php
        $day = " ";

        function passByvalue($value){

            $value .= "Monday is the worst day";
            return $value;
        }

        echo "<p>". passByvalue($day)."</p>";

        function passByref($value){

            $value .= " story of my life";
            return $value;
        }
       passByref($day);

        echo "<p>".passByref($day)."</p>";


        //step 2 part 3

        $defaultMessage = " Do you know ? ";
        echo $defaultMessage."</br>";
        //passing by value
        echo passByvalue($defaultMessage)."</br>";
        //passing by ref
        echo passByref($defaultMessage)."</br>";


        ?>
        <h1>Step 3</h1>
        <?php
            $myGlobal = 67;

            function usingGlobal(){
                global $myGlobal;
                echo"<h1> You are ".$myGlobal." years old</h1>";
            }
            usingGlobal();

        ?>

    </section>
</body>
</html>