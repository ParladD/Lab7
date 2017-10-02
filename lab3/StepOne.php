

<?php require("connectionToDatabase.php");?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Step one</title>
        <style>
            table{
                border-collapse: collapse;
            }
            th{
                border: 2px solid darkblue;
                background: lightyellow;
            }
            tr,td{
                border: 2px solid rebeccapurple;
                background: lemonchiffon;
                color:midnightblue;
            }
        </style>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $connect = connectToDatabase();
                    $result = mysqli_query($connect,"select * from film limit 0,10");

                    if (!$result){
                        die("Couldn't retrieve data from the Database ".mysqli_error());
                    }

                    while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td>
                            <?php echo $row['title'];?>
                        </td>
                        <td>
                            <?php echo $row['description'];?>
                        </td>

                    </tr>
                    <?php endwhile;

                    $connect = disConnectFromDatabase();?>
            </tbody>
        </table>

    </body>
</html>