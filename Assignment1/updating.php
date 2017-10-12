



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
        <th> Tool</th>
    </tr>
    </tr>
    </thead>
    <tbody>
    <?php
    $connect = connectToDatabase();
    $perPage=25;
    if(isset($_GET['id'])){
        $startPage = $_GET['id'];
    }else{
        $startPage = 0;
    }
    $myQuery = "SELECT * FROM employees LIMIT $startPage,$perPage;";
    $queryResult = mysqli_query($connect,$myQuery);
    $TotalRecords = mysqli_num_rows($queryResult);

    if (!$queryResult){

        echo die("Could not retrieve data from the Database".mysqli_error());
    }

    while ($row = mysqli_fetch_assoc($queryResult)): ?>
        <tr>
            <td>
                <?php echo $row['emp_no'];?>
            </td>
            <td>
                <?php echo $row['birth_date'];?>
            </td>
            <td>
                <?php echo $row['first_name'];?>
            </td>
            <td>
                <?php echo $row['last_name'];?>
            </td>
            <td>
                <?php echo $row['gender'];?>
            </td>
            <td>
                <?php echo $row['hire_date'];?>
            </td>
            <td>
                <form action="updateForm.php" method="post">
                    <input type="hidden" name="emp_id" value="<?php echo $row['emp_no'];?>">
                    <input type="hidden" name="birthdate" value="<?php echo $row['birth_date'];?>">
                    <input type="hidden" name="firstname" value="<?php echo $row['first_name'];?>">
                    <input type="hidden" name="lastname" value="<?php echo $row['last_name'];?>">
                    <input type="hidden" name="gender" value="<?php echo $row['gender'];?>">
                    <input type="hidden" name="hiredate" value="<?php echo $row['hire_date'];?>">
                    <input type="submit" name="submit" value="Update">
                </form>
            </td>

        </tr>
    <?php endwhile;
    if ($startPage ==0){
        echo "Previous &laquo;";
    }
    else{
        //echo    '<a href="PagingForempRecords.php?id='." ".($startPage -1).'">'.Previous &laquo; '</a>';
        echo '<a href="updating.php?id=' . ($startPage - $perPage).  '">Previous &raquo;</a>';
    }
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    if ($startPage == $TotalRecords-1){
        echo "Next &laquo;";
    }
    else{
        //echo    '<a href="PagingForempRecords.php?id='." ".($startPage -1).'">'.Previous &laquo; '</a>';
        echo '<a href="updating.php?id=' . ($startPage + $perPage).  '">Next &raquo;</a>';
    }


    $connect = disConnectFromDatabase();?>

    </tbody>
</table>
</body>
</html>