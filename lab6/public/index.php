<?php

require_once '../controller/controller.php';

$actorController = new controller();

if(isset($_GET['idUpdate']))
{

    $actorController->updateAction($_GET['idUpdate']);

}
elseif (isset($_GET['idDelete'])){

    $actorController->commitDeleteAction($_GET['idDelete']);
}
elseif (isset($_POST['UpdateBtn'])){

    $actorController->commitUpdateAction($_POST['editCustId'],$_POST['firstName'],$_POST['lastName']);
}

elseif (isset($_POST['submit'])){

    $actorController->displaySearchActors($_POST['searchBox']);
}
elseif (isset($_POST['insert'])){

    $actorController->InsertAction();
}
elseif (isset($_POST['insertActor'])){

    $actorController->commitInsertAction($_POST['firstName'],$_POST['lastName']);
}


else{
    $actorController ->displayActors();
}


?>