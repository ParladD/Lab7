<?php
require ('ConnectToDatabase.php')
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Employees Table</title>
        <style>
            table, th, tr, td
            {
                border: solid 1px maroon;
                text-align: center;
            }
        </style>
        <script src="validation.js" type="text/javascript"></script>
    </head>
<body>
<p><b>Search First & Last Name From Database</b></p>
<form method="post" action="file.php">
    <p><label>Search: <input type="text" name="nSearch" value="<?php echo $_POST['nSearch']; ?>"></label></p>
    <p><input type="submit" value="Submit Query"></p>
</form>
<table>
    <thead>
    <th>Employee #</th>
    <th>Date of Birth</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Gender</th>
    <th>Date of Hire</th>
    </thead>
    <tbody>
    <?php
    $conn = connectToDatabase();
    if(isset($_GET['id'])){
        $rowStarts = $_GET['id'];
    }else{
        $rowStarts = 0;
    }
    $maxRow = 25;
    $TotalRec = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM 'employees'"));
    $sql = "SELECT * FROM employees LIMIT $rowStarts, $maxRow";
    $str = (string)$_POST['nSearch'];
    $searchSQL = "SELECT * FROM employees WHERE first_name LIKE '%$str%' OR last_name LIKE '%$str%' LIMIT $rowStarts,$maxRow";
    if ($str = "")
    {
        $result = mysqli_query($conn,$sql);
    }
    else
    {
        $result = mysqli_query($conn,$searchSQL);
    }
    $affected = mysqli_affected_rows($conn);
    if(!$result)
    {
        die("Could not retrieve records from database: " . mysqli_error($conn));
    }
    while($row = mysqli_fetch_assoc($result)):
        ?>
        <tr>
            <td><?php echo $row['emp_no'] ?></td>
            <td><?php echo $row['birth_date'] ?></td>
            <td><?php echo $row['first_name'] ?></td>
            <td><?php echo $row['last_name'] ?></td>
            <td><?php echo $row['gender'] ?></td>
            <td><?php echo $row['hire_date'] ?></td>
            <!--            <td><img src="delete.png" width="25" height="25" /> </td>-->
            <td>
                <form action="delete.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['emp_no']; ?>" />
                    <input type="submit" name="submit" value="Delete"/>
                </form>
            </td>
            <!--            <td><img src="edit.png" width="25" height="25" /></td>-->
            <td>
                <form action="editForm.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['emp_no']; ?>" />
                    <input type="submit" name="submit" value="Edit"/>
                </form>
            </td>
        </tr>

        <?php
    endwhile;
    mysqli_close($conn);
    ?>
    </tbody>
</table>
<?php
if($rowStarts == 0)
{
//            echo "Previous &laquo;";
    echo "<button> &lt; </button>";
}
else
{
    echo "<a href='file.php?id=" . ($rowStarts - 25) ."'><button>&lt;</button></a>";
}
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
if($rowStarts == $TotalRec-1)
{
    echo "<button>&gt;</button>";
}
else
{
    echo "<a href='file.php?id=" . ($rowStarts + 25) ."'><button>&gt;</button></a>";
}