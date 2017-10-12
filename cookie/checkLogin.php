<?php

session_start();
ob_start();

    $db = mysqli_connect("localhost", "root","inet2005","employees");
    if(!$db){

        echo die("Couldnot connect to the database".mysqli_connect_error());

    }

    if (isset($_POST['loginUser']) && isset($_POST['loginPwd'])){

        $loginUser = $_POST['loginUser'];
        $loginPwd = $_POST['loginPwd'];

        $loginUser = stripslashes($loginUser);
        $loginPwd = stripslashes( $loginPwd);

        $loginUser = mysqli_real_escape_string($db,  $loginUser);
        $loginPwd = mysqli_real_escape_string($db,  $loginPwd);
        $loginPwd = hash("sha512",$loginPwd,512);

        $sql = "SELECT * FROM members WHERE username = '$loginUser'";
        $sql.= "and password = '$loginPwd'";

        $result = mysqli_query($db, $sql);
        $count = mysqli_num_rows($result);
        mysqli_close($db);

        if ($count == 1){

            $_SESSION['LoginUser'] = $loginUser;
            //redirect
            header('location:page1.php');
        }else{

            echo  "<b> INVALID LOGIN</b><br>";
            echo "<a href=\"mainLogin.html\">Try Again </a>";
        }



    }