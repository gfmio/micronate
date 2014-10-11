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

  public static function createNew($email, $username, $password,
                                   $first_name, $last_name, $location) {
    // return $newId
  }

  public static function verifyCredentials($email, $password) {
    // return $id from db or 0 if not valid
  }

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

  public function donate($amount, $campaign) {
    // create and submit a donation
  }

  public function getAuthorizedApps() {
    // retrieve apps that the user is using
  }

  public function getAppsDeveloped() {
    // retrieve apps that the user is developer of
  }

}

?>
