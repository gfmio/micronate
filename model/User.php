<?php

class User {

  private $id;
  private $first_name;
  private $last_name;
  private $email;
  private $username;
  private $location;
  private $balance;
  private $stripeCard;

  public function __construct($id) {
    // get stuff from db
  }

  public function getFirstName() {
    return $first_name;
  }

  public function getLastName() {
    return $last_name;
  }

  public function getEmail() {
    return $email;
  }

  public function getUsername() {
    return $username;
  }

  public function getLocation() {
    return $location;
  }

  public function getBalance() {
    return $balance;
  }

  public function getStripeCard() {
    return $stripeCard;
  }

  public function getCampaigns() {
    // retrieve and return array of campaigns
  }

  public function setLocation($newLocation) {
    $location = $newLocation;
  }

  public function setCard($newCard) {
    $stripeCard = $newCard;
  }

  public function save() {
    // update db
  }
}

?>
