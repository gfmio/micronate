<?php

class MicroTransaction {

  private $id;
  private $amount;
  private $date_time;
  private $application_id;
  private $user_id;

  public static function create($application_id, $application_key, $user_token) {
    // I dont know
    // ...
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
