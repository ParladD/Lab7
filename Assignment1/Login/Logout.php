<?php
    session_start();
    session_destroy();
    if (isset($_POST['submit'])){
        header('location:mainLogin.html');
    }
