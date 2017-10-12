
<?php
    setcookie("myCookie", "peanut butter",time()+3600,"/","localhost",0);

?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Cookie Example</title>
</head>
<body>


    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <p>First Name: <input type="text" name="firstName" /></p>
        <p>Last Name: <input type="text" name="lastName" /></p>
        <p><input type="submit" name="Submit" value="Send Form" /></p>
    </form>

    <?php
        if(isset($_COOKIE['myCookie'])){

            echo "<p> Hello, again. Your favourite cookie is: ". $_COOKIE['myCookie']. "</p>";
        }else{
            echo "<p> Is this your frist visit? </p>";
        }

        if (isset($_POST['lastName'])){
            echo "<br/> you typed '".$_POST['lastName']."'";
        }
    ?>




</body>
</html>