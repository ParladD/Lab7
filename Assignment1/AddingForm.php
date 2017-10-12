
<?php
    require('ConnectToDatabase.php');
    $connect = connectToDatabase();

    $topRow = "SELECT max(emp_no) FROM employees";

    $ResultopRow = mysqli_fetch_array(mysqli_query($connect,$topRow));
    if (!$ResultopRow){
       echo die("Could not retrieve ID from DataBase".mysqli_error());
    }
    $connect = disConnectFromDatabase();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Adding Employee Set</title>
    <script src ="AddingEmployee.js" type="text/javascript"></script>

</head>
<body>
<form name="form" id="form" action="AddingEmpRecords.php" method="post" onsubmit="return validate()">
    <label>Employee Number</label>
    <input name="empNO" type="number" value="<?php echo $ResultopRow[0]+1 ?>" id="empNO" readonly><br><br>
    <label>BirthDate</label>
    <input name="bd" type="date" value="" id="bd" ><br><br>
    <label>First Name</label>
    <input name="fname" type="text" value="" id="fname"><br><br>
    <label>Last Name</label>
    <input name="lname" type="text" value="" id="lname"><br><br>
    <label>Gender</label>
    <input name="gender" type="text" value="" id="gender"><br><br>
    <label>Hire Date</label>
    <input name="hdate" type="date" value="" id="hdate"><br><br>
    <input name="submit" type="submit" value="Insert Query" >
</form>

</body>
</html>