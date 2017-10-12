


<?php
    require("connectionToDatabase.php");
    $empNO = $_POST['emp_id'];
    $bd =$_POST['birthdate'];
    $fName= $_POST['firstname'];
    $lName = $_POST['lastname'];
    $gender = $_POST['gender'];
    $hdate = $_POST['hiredate'];


if (isset($_POST['submit'])){

    if (!empty($_POST['fname'])) {

        $connect = connectToDatabase();
        $empNO = $_POST['empNO'];
        $bd = $_POST['bd'];
        $fName = $_POST['fname'];
        $lName = $_POST['lname'];
        $gender = $_POST['gender'];
        $hdate = $_POST['hdate'];

        $myQuery = "UPDATE employees SET birth_date='";
        $myQuery .= $bd;
        $myQuery .= "', first_name ='";
        $myQuery .= $fName;
        $myQuery .= "', last_name='";
        $myQuery .= $lName;
        $myQuery .= "', gender='";
        $myQuery .= $gender;
        $myQuery .= "', hire_date='";
        $myQuery .= $hdate;
        $myQuery .= "' WHERE emp_no='";
        $myQuery .= $empNO;
        $myQuery .= "';";

        $queryResult = mysqli_query($connect, $myQuery);

        if (!$queryResult) {

            echo die("Could not update data on the Database" . mysqli_error());
        } else {
            $success = mysqli_affected_rows($connect);
            echo "<h1> Successfully updated " . $success . " record(s)</h1>";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employees Record</title>
    <script src="JavaValidation.js" type="text/javascript"></script>
</head>
<body>

<form name="form" id="form" action="UpdateData.php"  method="post" onsubmit="">
    <label>Employee Number</label>
    <input name="empNO" type="number" value="<?php echo $empNO; ?>" id="empNO" readonly><br><br>
    <label>BirthDate</label>
    <input name="bd" type="text" value="<?php echo $bd; ?>" id="bd" onblur="DateValidating('bd','bdSpan')" >
    <span id="bdSpan"></span><br><br>
    <label>First Name</label>
    <input name="fname" type="text" value="<?php echo $fName; ?>" id="fname" onblur="names('fname','spanF')">
    <span id ="spanF"></span><br><br>
    <label>Last Name</label>
    <input name="lname" type="text" value="<?php echo $lName; ?>" id="lname" onblur="names('lname','spanL')">
    <span id ="spanL"></span><br><br>
    <label>Gender</label>
    <input name="gender" type="text" value="<?php echo $gender ?>" id="gender" onblur="Gender()">
    <span id ="spanG"></span><br><br>
    <label>Hire Date</label>
    <input name="hdate" type="text" value="<?php echo $hdate; ?>" id="hdate" onblur="DateValidating('hdate','spanH')">
    <span id="spanH"></span><br><br>
    <input name="submit" type="submit" value="Update" >

</form><br></br>
<a href="DefaultResultPage.php"/>Go back </a>

</body>
</html>

