<?php
    function dispalyResult($fName, $lName){

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


?>