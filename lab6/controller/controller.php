<?php

require_once('../model/Model.php');

class controller
{
    public $Model;

    public function __construct()
    {
        $this->Model = new Model();
    }

    public function displayActors()
    {
        //retrieve an array of all the customers in the db
        //as customer objects
        $arrayOfActor= $this->Model->showActorResult();

        //include the view that will iterate over the array
        //and display the customers in a table
        include '../view/displayActor.php';
    }
    public function displaySearchActors($search)
    {
        //retrieve an array of all the customers in the db
        //as customer objects
        $arrayOfActor= $this->Model->showSearchResult($search);

        //include the view that will iterate over the array
        //and display the customers in a table
        include '../view/displayActor.php';
    }


    public function updateAction($actorID)
    {
        //get the current customer by id as it is in the db
        //return it as a customer object
        $currentUpdateID = $this->Model->getActorUpdateOrDeleteID($actorID);

        //load in the editCustomer view which contains the form
        //and pre-populate the form with the customer data
        //you just retrieved from the db
        include '../view/updateActor.php';
    }

    public function InsertAction(){

       $lastInsertId = $this-> Model->getLastID();
        include '../view/insertActor.php';

    }

    public function commitInsertAction($fName,$lName)
    {
        $lastUpdateResults = "";

        $lastUpdateResults = $this->Model->InsertActorData($fName,$lName);

        $arrayOfActor= $this->Model->showActorResult();

        //choose the displayCustomers view to display the
        //customers in the array
        include '../view/displayActor.php';
    }



    public function commitUpdateAction($actorID,$fName,$lName)
    {
        $lastUpdateResults = "";

        $currentActor = $this->Model->getActorUpdateOrDeleteID($actorID);

        //update the object with the new values from the form
        $currentActor->setFirstName($fName);
        $currentActor->setLastName($lName);

        $lastUpdateResults = $this->Model->updateActorRecord($currentActor);

        $arrayOfActor= $this->Model->showActorResult();

        //choose the displayCustomers view to display the
        //customers in the array
        include '../view/displayActor.php';
    }

    public function commitDeleteAction($actorID)
    {
        $lastUpdateResults = "";


        $currentActor = $this->Model->getActorUpdateOrDeleteID($actorID);

        $lastUpdateResults = $this->Model->DeleteActorRecord($currentActor);

        $arrayOfActor= $this->Model->showActorResult();

        //choose the displayCustomers view to display the
        //customers in the array
        include '../view/displayActor.php';
    }


}

?>
