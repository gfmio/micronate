<?php

class MicroTransaction {

  private $id;
  private $amount;
  private $date_time;
  private $application_id;
  private $user_id;

  public static function create($application, $user, $amount) {
    // verify monthly limit for this app & user, then register micro transact and add to balance

    if ($application->getTotalAmountForUser() + amount > $application->getMonthlyLimitForUser($user)) {
      return 0; // would exceed amount
    }

    DB::init();
    // register micro transaction
    $q = DB::$pdo->prepare("INSERT INTO micro_transaction (application_id, user_id, amount)
                            VALUES (:app_id, :user_id, :amount) ");

    $rowsAffected = $q->execute(array(
        ':app_id' => $application->getId(),
        ':user_id' => $user->getId(),
        ':amount' => $amount,
    ));

    if ($rowsAffected == 0)
      return 0; // some error occurred

    // update user balance
    $q2 = DB::$pdo->prepare("UPDATE user SET balance = balance + :amount WHERE id = :user_id");
    $rowsAffected = $q2->execute(array(
        ':amount' => $amount,
        ':user_id' => $user->getId(),
    ));

    if ($rowsAffected == 0) {
      //some other error occurred

      // previous insert should be deleted for the transaction to be atomic
      // but we dont care now

      return 0;
    }

    return 1;
  }

  public function __construct($id) {

    DB::init();
    $q = DB::$pdo->prepare("SELECT * FROM micro_transaction WHERE id = :id LIMIT 1");
    $q->execute(array(
        ':id' => $id,
    ));

    $res = $q->fetch(PDO::FETCH_ASSOC);

    $this->id = $res['id'];
    $this->amount = $res['amount'];
    $this->date_time = $res['date_time'];
    $this->application_id = $res['application_id'];
    $this->user_id = $res['user_id'];

  }

  public function getAmount() {
    return $this->amount;
  }

  public function getDateTime() {
    return $this->date_time;
  }

  public function getApplication() {
    return new Application($this->application_id);
  }

  public function getUser() {
    return new User($this->user_id);
  }

}


?>
