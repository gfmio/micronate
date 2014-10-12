<?php

class Donation {

  private $id;
  private $user_id;
  private $campaign_id;
  private $amount;
  private $dateTime;

  public static function process($user, $campaign, $amount) {
    // save transaction in db and retrieve new id

    if ($user->getBalance() < $amount)
      return 0;

    DB::init();
    $q = DB::$pdo->prepare("INSERT INTO donation (user_id, campaign_id, amount)
                            VALUES (:user_id, :campaign_id, :amount)");

    $rowsAffected = $q->execute(array(
        ':user_id' => $user->getId(),
        ':campaign_id' => $campaign->getId(),
        ':amount' => $amount,
    ));

    if ($rowsAffected == 0)
      return 0;

    $lastid =  DB::$pdo->lastInsertId();

    $q2 = DB::$pdo->prepare("UPDATE user SET balance = balance - :amount");

    $q2->execute(array(
      'amount' => $amount,
    ));

    return $lastid;
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
  }

  public function getId() {
    return $this->id;
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

}

?>
