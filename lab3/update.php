

<?php require("connectionToDatabase.php");?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Updating the Records</title>

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
                $FName;
                $LName;
                $actorID;
            $connect = connectToDatabase();
                if (!empty($_POST['uRecord'])){
                    $updateR = $_POST['uRecord'];
                    $sqlfName = "SELECT actor_id,first_name, last_name From actor WHERE actor_id =";
                    $sqlfName .= $updateR;
                    $resultName= mysqli_query($connect,$sqlfName);

                    if(!$resultName){
                        echo die("Couldn't update the date from the database".mysqli_error());
                    }
                    else{

                        $name = mysqli_fetch_assoc($resultName);
                        $FName = $name['first_name'];
                        $LName = $name['last_name'];
                        $actorID = $name['actor_id'];
                        }
                }

            $connect = disConnectFromDatabase();
            ?>
        </tbody>
    </table>
    <form action="updateRecords.php" method="post">
        <p>
            <label>Actor ID</label>
            <input name="actorID" type="text" value ="<?php echo $actorID;?>">
        </p>
        <p>
            <label>First Name</label>
            <input name="ufName" type="text" value ="<?php echo $FName;?>">
        </p>
        <p>
            <label>Last Name</label>
            <input name="ulName" type="text" value ="<?php echo $LName;?>">
        </p>
        <p>
            <input name="update" type="submit" value="Update">
        </p>
    </form>
    </body>
</html>

