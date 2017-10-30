<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Actor</title>
    <style type="text/css">
        table
        {
            border: 1px solid purple;
        }
        th, td
        {
            border: 1px solid red;
        }
        #Insert{
            margin-left: 5.3cm;
        }
    </style>
</head>
<body>

<?php
if(!empty($lastUpdateResults)):
    ?>
    <h2><?php echo $lastUpdateResults; ?></h2>
    <?php
endif;
?>


<h1>Actor: Records</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <p>
        <input type="text" name="searchBox" value="<?php echo $_POST['searchBox'] ?>" placeholder="Search . . .">
        <input type="submit" name="submit" value="Search">
        <input type="submit" name="insert" value="Insert Data" id="Insert">
    </p>
</form>
<table>
    <thead>
    <tr>
        <th>Actor ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Last Update</th>
        <th colspan="2">Tools</th>

    </tr>
    </thead>
    <tbody>
    <?php
    foreach($arrayOfActor as $actor):
        ?>
        <tr>
            <td><?php echo $actor->getActorID(); ?></td>
            <td><?php echo $actor->getFirstName(); ?></td>
            <td><?php echo $actor->getLastName(); ?></td>
            <td><?php echo $actor->getLastUpdate(); ?></td>
            <td>
                <a href="<?php echo $_SERVER['PHP_SELF']; ?>?idUpdate=<?php echo $actor->getActorID(); ?>">
                    <img src="image/edit.png" height="45px" width="45px"/>
                </a>
            </td>
            <td>
                <a href="<?php echo $_SERVER['PHP_SELF']; ?>?idDelete=<?php echo $actor->getActorID(); ?>" onclick="return confirm('Do you Really want to Delete?')">
                    <img src="image/delete.png" height="40px" width="45px"/>
                </a>
            </td>


        </tr>
        <?php
    endforeach;
    ?>
    </tbody>
    <tfoot></tfoot>
</table>
</body>
</html>
