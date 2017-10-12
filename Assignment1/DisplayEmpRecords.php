
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
                </tr>
            </thead>
            <tbody>
                <?php
                    $connect = connectToDatabase();

                    $myQuery = "SELECT * FROM employees;";

                    $queryResult = mysqli_query($connect,$myQuery);

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

                        </tr>
                <?php endwhile;

                $connect = disConnectFromDatabase();?>

            </tbody>
        </table>
    </body>
</html>