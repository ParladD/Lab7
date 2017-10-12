




<?php
require("ConnectToDatabase.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employees Record</title>
    <style>
        table{
            border-collapse: separate;
            border: 1px dotted red;
        }
        th{
            border: 2px dotted red;
            background: yellow;
        } tr, td{
              border: 1px dotted red;
          }
    </style>

</head>
<body>

<table>
    <thead>
    <tr>
        <th>Emp. Number </th>
        <th> Birth Date</th>
        <th> First Name</th>
        <th> Last Name</th>
        <th> Gender</th>
        <th> Hire Date</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $connect = connectToDatabase();

    $emp = $_POST['empNO'];
    $bd = $_POST['bd'];
    $fn = $_POST['fname'];
    $ln = $_POST['lname'];
    $g =  $_POST['gender'];
    $hd = $_POST['hdate'];


    $perPage = 25;
    if(isset($_GET['id'])){
        $startPage = $_GET['id'];
    }else{
        $startPage = 0;
    }


    $insertQuery ="INSERT INTO employees (emp_no,birth_date,first_name,last_name,gender,hire_date) VALUES(";
    $insertQuery.="'";
    $insertQuery .=$emp;
    $insertQuery.="','";
    $insertQuery.=$bd;
    $insertQuery.="','";
    $insertQuery.=$fn;
    $insertQuery.="','";
    $insertQuery.=$ln;
    $insertQuery.="','";
    $insertQuery.=$g;
    $insertQuery.="','";
    $insertQuery.=$hd;
    $insertQuery.="');";

    $queryResult = mysqli_query($connect,$insertQuery);

    if (!$queryResult){

        echo die("Could not Insert Data".mysqli_error());
    }
    $success = mysqli_affected_rows($connect);
    $myQuery = "SELECT * FROM employees ORDER BY emp_no DESC LIMIT $startPage,$perPage; ";
    $Result = mysqli_query($connect,$myQuery);
    $TotalRecords = mysqli_num_rows($Result);

    if (!$Result){
        echo die("Could not retrieve Data".mysqli_error());
    }
    else {
        echo "<h1> Successfully Inserted " . $success . " record(s)</h1>";
        while ($row = mysqli_fetch_assoc($Result)) {

            echo " <tr>";
            echo "<td>" . $row['emp_no'] . "</td>";
            echo "<td>" . $row['birth_date'] . "</td>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "<td>" . $row['hire_date'] . "</td>";
            echo " </tr>";
        }
    }

    if ($startPage ==0){
        echo " &laquo;Previous";
    }
    else{
        //echo    '<a href="PagingForempRecords.php?id='." ".($startPage -1).'">'.Previous &laquo; '</a>';
        echo '<a href="AddingEmpRecords.php?id=' . ($startPage - $perPage).  '">Previous &raquo;</a>';
    }
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    if ($startPage == $TotalRecords-1){
        echo "Next &laquo;";
    }
    else{
        //echo    '<a href="PagingForempRecords.php?id='." ".($startPage -1).'">'.Previous &laquo; '</a>';
        echo '<a href="AddingEmpRecords.php?id=' . ($startPage + $perPage).  '">Next &raquo;</a>';
    }

    $connect = disConnectFromDatabase();?>

    </tbody>
</table>
<a href="AddingForm.php"/>Go Back to insert</a>
</body>
</html>