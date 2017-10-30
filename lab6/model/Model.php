<?php

require_once '../model/film.php';
require_once '../model/Actor.php';
//require_once '../model/Address.php';


//choose which of the two available methods we have to
//communicate with the mysql db by commenting out the
//other method...you will use your chosen data access
//method in the constructor below

//require_once '../model/data/MySQLiCustomerDataModel.php';
require_once '../model/data/PDOMysqlModel.php';



class Model
{

    private $dataAccess;

    public function __construct()
    {
        //here we can choose between two option of how we wish to connect
        //to our database - via PDO or via MYSQLi
        //toggle between your choice by commenting out one of the options

        //$this->m_DataAccess = new MySQLiCustomerDataModel();
        $this->dataAccess = new PDOMysqlModel();

    }

    public function __destruct()
    {
        // not doing anything at the moment
    }

    public function showActorResult()
    {
        //this will be executed based on which method we have enabled
        //PDO with MySQL -or- MYSQLI with MySQL in the constructor
        $this->dataAccess->connectToDatabase();

        //because in this function we get all the customers,
        //we create an empty array which will eventually hold all
        $arrayOfDataObjects = array();
        //attempt a select query within the model to get all the customers
        $this->dataAccess->showActors();
        //loop to get each customer row that is now available from the query

        while($data= $this->dataAccess->fetchActorResult())
        {
            //for each row of customer of data that we get back,
            //we will
            $Actor= new Actor(
                $this->dataAccess->fetchActorID($data),
                $this->dataAccess->fetchFirstName($data),
                $this->dataAccess->fetchLastName($data),
                $this->dataAccess->fetchLastUpdate($data)

            );
            $arrayOfDataObjects[] = $Actor;
        }

        $this->dataAccess->closeDatabase();

        //in the controller
        return $arrayOfDataObjects;
    }

    public function showSearchResult($search)
    {
        //this will be executed based on which method we have enabled
        //PDO with MySQL -or- MYSQLI with MySQL in the constructor
        $this->dataAccess->connectToDatabase();

        //because in this function we get all the customers,
        //we create an empty array which will eventually hold all
        $arrayOfDataObjects = array();
        //attempt a select query within the model to get all the customers
        $this->dataAccess->showSearchActors($search);
        //loop to get each customer row that is now available from the query

        while($data= $this->dataAccess->fetchActorResult())
        {
            //for each row of customer of data that we get back,
            //we will
            $Actor= new Actor(
                $this->dataAccess->fetchActorID($data),
                $this->dataAccess->fetchFirstName($data),
                $this->dataAccess->fetchLastName($data),
                $this->dataAccess->fetchLastUpdate($data)

            );
            $arrayOfDataObjects[] = $Actor;
        }

        $this->dataAccess->closeDatabase();

        //in the controller
        return $arrayOfDataObjects;
    }

    public function getActorUpdateOrDeleteID($actorID)
    {
        //this will be executed based on which method we have enabled
        //PDO with MySQL -or- MYSQLI with MySQL in the constructor
        $this->dataAccess->connectToDatabase();

        //attempt a select query within the model to get all the customers
        $this->dataAccess->getActorID($actorID);
        //loop to get each customer row that is now available from the query

       $data= $this->dataAccess->fetchActorResult();

            //for each row of customer of data that we get back,
            //we will
            $Actor = new Actor(
                $this->dataAccess->fetchActorID($data),
                $this->dataAccess->fetchFirstName($data),
                $this->dataAccess->fetchLastName($data),
                $this->dataAccess->fetchLastUpdate($data)

            );


        $this->dataAccess->closeDatabase();

        //in the controller
        return $Actor;
    }


    //receives the newly updated customer object from the controller
    //the data is then extracted and sent to the db's updateCustomer
    //in order to save the updates in the database
    public function updateActorRecord($actorToUpdate)
    {
        $this->dataAccess->connectToDatabase();

        //pass along the newly updated customer object to the
        //data layer's updateCustomer function so that it can
        //go ahead and perform an UPDATE statement with the new data
        //if the update was successful, the $recordsAffected should be set to 1
        $recordsAffected = $this->dataAccess->updateActor($actorToUpdate->getActorID(),
            $actorToUpdate->getFirstName(),
            $actorToUpdate->getLastName());
        $this->dataAccess->closeDatabase();
        //return message describing the result of update
        return "$recordsAffected record(s) updated successfully!";
    }

    public function DeleteActorRecord($actorToDelete){
        $this->dataAccess->connectToDatabase();

        $recordsAffected = $this->dataAccess->DeleteActor($actorToDelete->getActorID());

        $this->dataAccess->closeDatabase();
        //return message describing the result of update
        return "$recordsAffected record(s) updated successfully!";

    }

    public function InsertActorData($fname, $lastName){

        $this->dataAccess->connectToDatabase();

        $recordsAffected = $this->dataAccess->InsertActor($fname,$lastName);

        $this->dataAccess->closeDatabase();
        //return message describing the result of update
        return "$recordsAffected record(s) updated successfully!";
    }

   public function getLastID(){
       $this->dataAccess->connectToDatabase();
       $this->dataAccess->lastID();

       $data= $this->dataAccess->fetchActorResult();

       $Actor = new Actor(
           $this->dataAccess->fetchActorID($data),
           $this->dataAccess->fetchFirstName($data),
           $this->dataAccess->fetchLastName($data),
           $this->dataAccess->fetchLastUpdate($data)

       );

       $this->dataAccess->closeDatabase();

       return $Actor;
   }
}

?>
