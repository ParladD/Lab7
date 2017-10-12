<?php

function checkIfLoggedIN(){

    session_start();

    if(empty($_SESSION['LoginUser'])){

        header("location:mainLogin.html");
    }

}