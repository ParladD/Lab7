<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
interface iDbInterface
{
    public function connectToDatabase();

    public function closeDatabase();

   // public function showData();
    public function showActors();
    public function showSearchActors($search);

   // public function fetchResult();
    public function fetchActorResult();

    // field access functions
    //PUBLIC FUNTIONG FOR UPDATE
    public function getActorID($actorID);
    public function updateActor($actorID,$first_name,$last_name);
    public function InsertActor($fname, $lastname);
    public function lastID();
   // public function fetchFilmTitle($row);
   // public function fetchFilmDescription($row);
    public function fetchActorID($row);
    public function fetchFirstName($row);
    public function fetchLastName($row);
    public function fetchLastUpdate($row);


}
?>
