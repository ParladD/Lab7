<?php
    require('connectionToDatabase.php');
    session_start();
    ob_start();

    $connect = connectToDatabase();
    if (isset($_POST['loginUser']) && isset($_POST['loginPwd'])){

        $loginUser = $_POST['loginUser'];
        $loginPwd = $_POST['loginPwd'];

        $loginUser = stripslashes($loginUser);
        $loginPwd = stripslashes( $loginPwd);

        $loginUser = mysqli_real_escape_string($connect,  $loginUser);
        $loginPwd =  mysqli_real_escape_string(connectToDatabase(),  $loginPwd);
        $loginPwd =  hash("sha512",$loginPwd);

        $sql = "SELECT * FROM members WHERE username = '$loginUser'";
        $sql.= "and password = '$loginPwd'";

        $result = mysqli_query($connect, $sql);
        $count = mysqli_num_rows($result);
        $connect = disConnectFromDatabase();

        if ($count == 1){

            $_SESSION['LoginUser'] = $loginUser;
            //redirect
            header('location:DefaultResultPage.php');
        }else{

            echo  "<b> INVALID LOGIN</b><br>";
            echo "<a href=\"mainLogin.html\">Try Again </a>";
        }

    }//end if