<?php



//this class defines a customer object
class film
{
    private $filmTitle; //int
    private $filmDescription; //string

    public function __construct($fTitle, $fDescription)
    {
     $this ->filmTitle = $fTitle;
     $this ->filmDescription = $fDescription;
    }


    public function getTitle()
    {
        return ($this->filmTitle);
    }

    public function getDescription()
    {
        return ($this->filmDescription);
    }


}

?>
