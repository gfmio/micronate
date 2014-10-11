<?php

class Donation {

  private $id;
  private $user;
  private $campaign;
  private $amount;
  private $dateTime;
  private $stripeCharge;

  public static function process($user, $campaign, $amount) {
    // Stripe transaction -- debit user's card -- keep reference to transaction
    // save transaction in db and retrieve new id
    // return $newId
  }

  public function __construct($id) {

  }

  public function getUser() {

  }

  public function getCampaign() {

  }

  public function getAmountGiven() {

  }

  public function getDateTime() {

  }

  public function getStripeCharge() {

  }

}

?>
