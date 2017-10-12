

<?php
require("connectionToDatabase.php");

    $empID = $_POST['empno'];
    $empNO = (int)$empID;

    $connect = connectToDatabase();
    $myQuery = "DELETE FROM employees WHERE emp_no =";
    $myQuery .= $empNO;

    $queryResult = mysqli_query($connect, $myQuery);

    if (!$queryResult) {

        echo die("Could not delete data on the Database" . mysqli_error());
    } else {
        $success = mysqli_affected_rows($connect);
        echo "<h1> Successfully Deleted " . $success . " record(s)</h1>";
    }
    $connect = disConnectFromDatabase();

    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Delete Record</title>
    </head>
    <body>
    <a href="DefaultResultPage.php"/>Go back</a>
    </body>
</html>
