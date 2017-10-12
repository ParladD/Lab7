

<?php
require("ConnectToDatabase.php");

    $empID = $_POST['emp_id'];
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
    <a href="Delete.php"/>Go back</a>
    </body>
</html>
