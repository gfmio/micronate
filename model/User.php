<?php

define(SALT, 'GewwSgX0O_.-s V?_!`QYJ?P39[3wTLYW7mZkQ[{7/Q?!+1Bkri$KYM>e|)f,OmB');

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

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
      return 0;
    }

    DB::init();

    $q = DB::$pdo->prepare("INSERT INTO user (email, username, password, first_name, last_name, location)
                       VALUES (:email, :username, :password, :first_name, :last_name, :location)");

    $rowsAffected = $q->execute(array(
            ':email' => $email,
            ':username' => $username,
            ':password' => sha1($password . SALT),
            ':first_name' => $first_name,
            ':last_name' => $last_name,
            ':location' => $location,
    ));

    if ($rowsAffected == 0) {
      // throw exception?
      return 0;
    }

    return DB::$pdo->lastInsertId();
  }

  public static function verifyCredentials($email, $password) {
    // return $id from db or 0 if not valid

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
      return 0;
    }

    DB::init();
    $q = DB::$pdo->prepare("SELECT id FROM user WHERE email = :email AND password = :password LIMIT 1");
    $q->execute(array(
        ':email' => $email,
        ':password' => sha1($password . SALT),
    ));

    $res = $q->fetch(PDO::FETCH_ASSOC);

    if (empty($res))
      return 0;

    return $res['id'];
    
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
