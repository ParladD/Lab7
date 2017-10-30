<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../model/data/iDbInterface.php'; //interface file must be included



class PDOMysqlModel implements iDbInterface
{

    private $databaseConnection; //<-the db connection is stored here after successful connection
    private $queryResult; //<-results of queries are stored here
    private $query;

    // because the class implements the iCustomerDataModel interface,
    // the class MUST implement all of the functions defined in the
    // interface...they are listed below

    public function connectToDatabase()
    {
        try
        {
            //connects to mysql db via PDO
            //if connection is successful, the resulting connection
            //is stored in the $dbConnection member variable defined above
            $this->databaseConnection= new PDO("mysql:host=localhost;dbname=sakila","root","inet2005");
            $this->databaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $exception)
        {
            die('Could not connect to the Sakila Database via PDO: ' . $exception->getMessage());

        }
    }

    public function closeDatabase()
    {
        // set a PDO connection object to null to close it
        $this->databaseConnection= null;
    }

    //executes a select statement query to get all of the customers
    //from the db....including related address data (via joins)

    public function showActors(){
        $selectQuery= "SELECT * FROM actor LIMIT 0,10";



        try{
            $this->query = $this->databaseConnection->prepare($selectQuery);
            $this->query->execute();
        }
        catch(PDOException $exception)
        {
            die('Could not select records from Sakila Database via PDO: ' . $exception->getMessage());
        }


    }
    public function showSearchActors($search){
        $selectQuery= "SELECT * FROM actor 
        WHERE first_name LIKE '%$search%' OR last_name LIKE '%$search%'
        LIMIT 0,10";

        try{
            $this->query = $this->databaseConnection->prepare($selectQuery);
            $this->query->execute();
        }
        catch(PDOException $exception)
        {
            die('Could not select records from Sakila Database via PDO: ' . $exception->getMessage());
        }


    }

    public function getActorID($actorID){
        $selectQuery= "SELECT * FROM actor WHERE actor_id =";
        $selectQuery .= " :actorID;";

        try{
            $this->query= $this->databaseConnection->prepare($selectQuery);
            $this->query->bindParam(':actorID', $actorID, PDO::PARAM_INT);
            //execute the select statement and store in $stmt member variable
            $this->query->execute();

        }catch (PDOException $exception){
            die('Could not select records from Sakila Database via PDO: ' . $exception->getMessage());
        }

    }

    public function DeleteActor($actorID){
        //note the parameters/placeholders in the statement
        $selectQuery = "DELETE FROM actor WHERE actor_id =";
        $selectQuery .= ":actorID;";

        try
        {

            $this->query= $this->databaseConnection->prepare($selectQuery);
            $this->query->bindParam(':actorID', $actorID, PDO::PARAM_INT);
            //perform the delete statement and store in the $stmt member variable
            $this->query->execute();
            //return the number of rows that the delete statement

            return $this->query->rowCount();
        }
        catch(PDOException $exception)
        {
            die('Could not delete records from Sakila Database via PDO: ' . $exception->getMessage());
        }

    }

    public function updateActor($actorID,$first_name,$last_name)
    {
        //build an UPDATE sql statement with the data provided to the function
        //this should always include the customer id
        //note the parameters/placeholders in the statement
        $selectQuery = "UPDATE actor";
        $selectQuery .= " SET first_name = :firstName,last_name=:lastName";
        $selectQuery .= " WHERE actor_id = :actorID;";

        try
        {
            //prepare the sql statement by inserting into the
            //placeholders the values that we wish to use to perform
            //the update
            $this->query= $this->databaseConnection->prepare($selectQuery);
            $this->query->bindParam(':firstName', $first_name, PDO::PARAM_STR);
            $this->query->bindParam(':lastName', $last_name, PDO::PARAM_STR);
            $this->query->bindParam(':actorID', $actorID, PDO::PARAM_INT);
            //perform the update statement and store in the $stmt member variable
            $this->query->execute();
            //return the number of rows that the update statement
            //affected - if successful in this case, the value returned should
            //be 1 - it could possibly return 0 if no rows were affected
           return $this->query->rowCount();
        }
        catch(PDOException $exception)
        {
            die('Could not update records from Sakila Database via PDO: ' . $exception->getMessage());
        }
    }


    public function fetchActorResult()
    {
        //at this point....a query should have been executed and stored
        //in the $stmt variable. here we can fetch the results
        //row by row by calling the fetch method off of the statement
        try
        {
            //this returns one row of data if there is one
            $this->queryResult= $this->query->fetch(PDO::FETCH_ASSOC);
            return $this->queryResult;
        }
        catch(PDOException $exception)
        {
            die('Could not retrieve data from Sakila Database via PDO: ' . $exception->getMessage());
        }
    }

        public function lastID(){
            $selectQuery = "SELECT MAX(actor_id) FROM actor";

            try
            {
                $this->query= $this->databaseConnection->prepare($selectQuery);
                //perform the update statement and store in the $stmt member variable
                $this->query->execute();
            }
            catch(PDOException $exception)
            {
                die('Could not select max data to Sakila Database via PDO: ' . $exception->getMessage());
            }

        }


    public function InsertActor($fname, $lastname)
    {
        $selectQuery = "INSERT INTO actor(first_name, last_name)";
        $selectQuery .= "VALUES(:firstName,:lastName);";

        try
        {
            $this->query= $this->databaseConnection->prepare($selectQuery);
            $this->query->bindParam(':firstName', $fname, PDO::PARAM_STR);
            $this->query->bindParam(':lastName', $lastname, PDO::PARAM_STR);
            //perform the update statement and store in the $stmt member variable
            $this->query->execute();
            //return the number of rows that the update statement
            //affected - if successful in this case, the value returned should
            //be 1 - it could possibly return 0 if no rows were affected
            return $this->query->rowCount();
        }
        catch(PDOException $exception)
        {
            die('Could not insert data to Sakila Database via PDO: ' . $exception->getMessage());
        }

    }

   // public function fetchFilmDescription($row)
   // {
      //  return $row['description'];
   // }

    public function fetchActorID($row)
    {
        return $row['actor_id'];
    }

    public function fetchFirstName($row)
    {
        return $row['first_name'];
    }

    public function fetchLastName($row)
    {
        return $row['last_name'];
    }

    public function fetchLastUpdate($row)
    {
        return $row['last_update'];
    }

}

?>
