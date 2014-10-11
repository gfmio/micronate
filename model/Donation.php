<?php

class Donation {

  private $id;
  private $user_id;
  private $campaign_id;
  private $amount;
  private $dateTime;
  private $stripeCharge;

  public static function process($user, $campaign, $amount) {
    // Stripe transaction -- debit user's card -- keep reference to transaction
    // save transaction in db and retrieve new id
    // return $newId
  }

  public function __construct($id) {
    DB::init();
    $q = DB::$pdo->prepare("SELECT * FROM donation WHERE id = :id LIMIT 1");
    $q->execute(array(
        ':id' => $id,
    ));

    $res = $q->fetch(PDO::FETCH_ASSOC);

    $this->id = $res['id'];
    $this->user_id = $res['user_id'];
    $this->campaign_id = $res['campaign_id'];
    $this->amount = $res['amount'];
    $this->dateTime = $res['date_time'];
    $this->stripeCharge = $res['stripe_charge_token'];
  }

  public function getUser() {
    return new User($this->user_id);
  }

  public function getCampaign() {
    return new Campaign($this->campaign_od);
  }

  public function getAmountGiven() {
    return $amount;
  }

  public function getDateTime() {
    return $dateTime;
  }

  public function getStripeCharge() {
    return $stripeCharge;
  }

}

?>
