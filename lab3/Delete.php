
<?php require("connectionToDatabase.php");?>

<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="UTF-8">
      <title>Deleting the Records</title>

        <style>
            table{
                border-collapse: collapse;
            }
            th{
                border: 2px solid darkblue;
                background: lightyellow;
            }
            tr, td{
                border: 2px solid darkblue;
                background: lavenderblush;
            }
        </style>

    </head>
    <body>
        <table>
            <thead>
            <tr>
                <th>Actor ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    if (!empty($_POST['dRecord'])){
                        $deleteR = $_POST['dRecord'];

                        $sqlQuery = "DELETE FROM actor WHERE actor_id = ";
                        $sqlQuery .= $deleteR;
                        $connect = connectToDatabase();
                        $result = mysqli_query($connect,$sqlQuery);

                        if(!$result){
                            echo die("Couldn't delete the date from the database".mysqli_error());
                        }
                        else{
                            $success = mysqli_affected_rows($connect);
                            echo "<h1> Successfully deleted ".$success." record(s)</h1>";
                            $listQuery = "SELECT * FROM actor ORDER by actor_id DESC  limit 0,10";
                            $listNames = mysqli_query($connect, $listQuery);
                            while ($row = mysqli_fetch_assoc($listNames)) {

                                echo " <tr>";
                                echo "<td>" . $row['actor_id']. "</td>";
                                echo "<td>" . $row['first_name']. "</td>";
                                echo "<td>" . $row['last_name']. "</td>";
                                echo "<td>" . $row['last_update']. "</td>";
                                echo " </tr>";
                            }

                        }

                    }
                     $connect = disConnectFromDatabase();
                 ?>
            </tbody>
        </table>
        <a href="inserting_Updating_Deleting.html"> Go back to insert Statement</a>
    </body>
</html>