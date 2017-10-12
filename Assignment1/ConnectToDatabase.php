<?php
$connect;
function connectToDatabase(){

    global $connect;
    $connect= mysqli_connect("localhost","root","inet2005","employees");

    if(!$connect){
        echo die("Could not connect to Database ".mysqli_connect_error());
    }

    return $connect;

}

function disConnectFromDatabase(){

    global $connect;
    mysqli_close($connect);

}

?>
