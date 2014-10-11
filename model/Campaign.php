<?php

public Campaign {

  private $id;
  private $title;
  private $description;
  private $location;
  private $goal;
  private $startDatetime;
  private $endDatetime;
  private $creator;

  public static function createNew($creator, $title, $description,
                                   $location, $goal, $startDatetime,
                                   $endDatetime) {
    // create in db and return id
    //return $newId;
  }

  public function __construct($id) {

  }

  public function getTitle() {
    return $title;
  }

  public function getDescription() {
    return $description;
  }

  public function getLocation() {
    return $location;
  }

  public function getGoal() {
    return $goal;
  }

  public function getStartDatetime() {
    return $startDatetime;
  }

  public function getEndDatetime() {
    return $endDatetime;
  }

  // returns duration of campaign in days
  public function getDuration() {
    // use getEnd - getStart
  }

  public function getCreator() {
    return $creator;
  }

  public function getDonations() {
    // return donations list
  }
}

?>
