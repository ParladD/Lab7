<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>post form</title>
</head>
<body>
    <h1>Results:</h1>
    <?php
        $fname;
        $lastname;
        $feet;
        $inchToFeet;
        $inches;
        $meter;

    if (!empty($_POST['Submit'])) {
        $fname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $feet = $_POST['hFeet'];
        $inches = $_POST['hInches'];

        $inchToFeet = $feet + ($inches / 12.0);
        $meter = round($inchToFeet * 0.3028,2);

        echo "<p> Your first name is: ".$fname."</p></br>";

        echo "<p> Your last name is: ".$lastname."</p></br>";


        echo "<p> Your height in metres is: ".$meter."</p></br>";


    }
    else
    {
        echo "<p>Nothing to do.</p>";
    }
    ?>

    <p><a href="Posthtml.html">Go back</a></p>
</body>
</html>