

<?php require("connectionToDatabase.php");?>





<!DOCTYPE html>
    <html lang="en">
        <head>
          <meta charset="UTF-8">
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

                        if (!empty($_POST['firstName']) && !empty($_POST['lastName'])) {
                            $fName= $_POST['firstName'];
                            $lName= $_POST['lastName'];

                            $sqlQuery = "INSERT INTO actor (first_name, last_name) VALUES(";
                            $sqlQuery.="'";
                            $sqlQuery.= $fName;
                            $sqlQuery.="','";
                            $sqlQuery.=$lName;
                            $sqlQuery.="');";
                            $connect = connectToDatabase();
                            $result = mysqli_query($connect, $sqlQuery);
                            $listQuery = "SELECT * FROM actor ORDER by actor_id DESC  limit 0,10";
                            $listNames = mysqli_query($connect, $listQuery);

                            if (!$result) {
                                die("Couldn't Insert data in the Database " . mysqli_error());
                            }
                            else{
                                echo "<h1> Data successfully inserted</h1>";

                            }
                            while ($row = mysqli_fetch_assoc($listNames)) {

                                echo " <tr>";
                                echo "<td>" . $row['actor_id']. "</td>";
                                echo "<td>" . $row['first_name']. "</td>";
                                echo "<td>" . $row['last_name']. "</td>";
                                echo "<td>" . $row['last_update']. "</td>";
                                echo " </tr>";
                            }

                        }
                        else{
                            echo "Please input First name and last name first<br/>";
                        }

                         $connect = disConnectFromDatabase();
                        ?>
                <a href="inserting_Updating_Deleting.html">Go back to insert Statement</a>
                </tbody>
            </table>
            <form action="Delete.php" method="post">
                <p>
                    <label>ID to Delete</label>
                    <input name="dRecord" type="number">
                </p>
                <p>
                    <input name="delete" type="submit" value="Delete">
                </p>
            </form>
            <form action="update.php" method="post">
                <p>
                    <label>ID to Update</label>
                    <input name="uRecord" type="number">
                </p>
                <p>
                    <input name="update" type="submit" value="Update">
                </p>
            </form>
        </body>

</html>