


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
        <th>Title</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
    <?php
        $find = $_POST['search'];
            if (isset($_POST['sQuery']) && $find!= null) {

                $sqlQuery = "SELECT * FROM film WHERE description LIKE '%" . $find . "%' LIMIT 0,10";
                $connect = connectToDatabase();
                $result = mysqli_query($connect, $sqlQuery);

                if (!$result) {
                    die("Couldn't retrieve data from the Database " . mysqli_error());
                }
                while ($row = mysqli_fetch_assoc($result)) {

                    echo " <tr>";
                    echo "<td>" . $row['title'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo " </tr>";
                }
                $connect = disConnectFromDatabase();
            }
                else{
                    echo "search by the description of the flim you are looking for<br/>";
            }


    ?>

    </tbody>
 <a href="FormStepTwo.html">Go back to serach</a>
</table>

</body>
</html>