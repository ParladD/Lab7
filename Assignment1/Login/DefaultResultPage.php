

<?php
require("connectionToDatabase.php");
require('isLogin.php');
checkIfLoggedIN();
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Employees Record</title>
        <style>
            table{
                margin-top: 40cm
                border-collapse: separate;
                border: 1px dotted red;
            }
            th{
                border: 2px dotted red;
                background: yellow;
            } tr, td{
                  border: 1px dotted red;
              }
            #move{
                margin-left: 2.5cm;
            }
           th #date{
                width: 3cm;
            }
        </style>
        <script src="DeleteValidate.js" type="text/javascript"></script>

    </head>
    <body>
    <p>
        <form action="<?php $_SERVER['PHP_SELF']?>" method="post" id = "move" >
            <input type="search" name="search" value="" placeholder="Search...">
            <input type="submit" name="searchS" value="submit">
            <input type="submit" name="Desc" value="View Descending">
            <input type="submit" name="Asc" value="View Ascending">
            <input type="submit" name="submit" value="LogOut" formaction="Logout.php">
        </form>
    </p>

    <table>
        <thead>
            <tr>
                <th>Emp. Number </th>
                <th colspan="1"> Birth Date</th>
                <th> First Name</th>
                <th> Last Name</th>
                <th> Gender</th>
                <th colspan="1"> Hire Date</th>
                <th colspan="2"> Tools</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $connect = connectToDatabase();
            $perPage=25;
            $search = (string) $_POST['search'];
            if(isset($_GET['id'])){
                $startPage = $_GET['id'];
            }else{
                $startPage = 0;
            }

            if (isset($_POST['Asc'])){
                $myQuery = "SELECT * FROM employees LIMIT $startPage,$perPage;";
            }
            else if (isset($_POST['Desc'])){
                $myQuery = "SELECT * FROM employees  ORDER BY emp_no DESC LIMIT $startPage,$perPage;";
            }
            else if(isset($_POST['searchS'])){
                $myQuery = "SELECT * FROM employees WHERE first_name LIKE '%$search%' OR last_name LIKE '%$search%' LIMIT $startPage,$perPage;";
            }
            else{
                $myQuery = "SELECT * FROM employees LIMIT $startPage,$perPage;";
            }
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
                        <form action="DeleteData.php" method="post" onsubmit="CheckDelete()">
                            <input type="hidden" name="empno" value="<?php echo $row['emp_no'];?>">
                            <input type="submit" name="submit" value="Delete">
                        </form>
                    </td>
                    <td>
                        <form action="UpdateData.php" method="post">
                            <input type="hidden" name="emp_id" value="<?php echo $row['emp_no'];?>">
                            <input type="hidden" name="birthdate" value="<?php echo $row['birth_date'];?>">
                            <input type="hidden" name="firstname" value="<?php echo $row['first_name'];?>">
                            <input type="hidden" name="lastname" value="<?php echo $row['last_name'];?>">
                            <input type="hidden" name="gender" value="<?php echo $row['gender'];?>">
                            <input type="hidden" name="hiredate" value="<?php echo $row['hire_date'];?>">
                            <input type="submit" name="submitUpdate" value="Update">
                        </form>
                    </td>

                </tr>

            <?php endwhile;
            if ($startPage ==0){
                echo "Previous &laquo;";
            }
            else{
                //echo    '<a href="PagingForempRecords.php?id='." ".($startPage -1).'">'.Previous &laquo; '</a>';
                echo '<a href="DefaultResultPage.php?id=' . ($startPage - $perPage).  '">Previous &laquo;</a>';
            }
            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            if ($startPage == $TotalRecords-1){
                echo "Next &laquo;";
            }
            else{
                //echo    '<a href="PagingForempRecords.php?id='." ".($startPage -1).'">'.Previous &laquo; '</a>';
                echo '<a href="DefaultResultPage.php?id=' . ($startPage + $perPage).  '">Next &raquo;</a>';
            }


            $connect = disConnectFromDatabase();?>
        </tbody>

    </table>
    </body>
</html>