<?php



//this class defines a customer object
class Actor
{
    private $actorID; //int
    private $firstName; //string
    private $lastName; //int
    private $lastUpdate; //date
    public function __construct($actorID, $firstName, $lastName, $lastUpdate)
    {
        $this ->actorID = $actorID;
        $this ->firstName = $firstName;
        $this ->lastName = $lastName;
        $this ->lastUpdate = $lastUpdate;
    }


    public function getActorID()
    {
        return ($this->actorID);
    }

    public function getFirstName()
    {
        return ($this->firstName);
    }

    public function getLastName()
    {
        return ($this->lastName);
    }
    public function getLastUpdate()
    {
        return ($this->lastUpdate);
    }

    public function setFirstName($fname){
        $this->firstName = $fname;
    }
    public function setLastName($lname){
        $this->lastName = $lname;
    }
    public function setActorID($actorID){
    $this->actorID = $actorID;
}
    public function setLastUpdate($lupdate){
        $this->lastUpdate = $lupdate;
    }
}

?>
