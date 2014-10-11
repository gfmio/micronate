<?php

class Application {

  private $id;
  private $name;
  private $secret_key;
  private $publishable_key;

  public static function createNew($developer, $appname) {
    // create a new entry in db and retrieve id
    //return $newId;
  }

  public function __construct($id) {

  }

  public function getName() {
    return $this->name;
  }

  public function getSecretKey() {
    return $this->secret_key;
  }

  public function getPublishableKey() {
    return $this->publishable_key;
  }

  public function getAppUsers() {

  }

  public function getMonthlyLimitForUser($user) {

  }

  public function getMicroTransactionsForUser($user) {

  }

  public function getAmountDonatedByUser($user) {

  }

}

?>
