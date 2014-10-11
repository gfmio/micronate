<?php

class Application {

  private $id;
  private $name;
  private $secret_key;
  private $publishable_key;
  private $developer_id;

  public static function createNew($developer, $appname) {
    // create a new entry in db and retrieve its id

    DB::init();

    $q = DB::$pdo->prepare("INSERT INTO application (name, developer_id, secret_key, publishable_key)
                       VALUES (:name, :developer_id, :secret_key, :publishable_key)");

    $rowsAffected = $q->execute(array(
            ':name' => $name,
            ':developer_id' => $developer->getId(),
            ':secret_key' => sha1("asddf"),
            ':publishable_key' => sha1("asdrf"),
    ));

    if ($rowsAffected == 0) {
      return 0;
    }

    return DB::$pdo->lastInsertId();
  }

  public function __construct($id) {

    DB::init();
    $q = DB::$pdo->prepare("SELECT * FROM application WHERE id = :id LIMIT 1");
    $q->execute(array(
        ':id' => $id,
    ));

    $res = $q->fetch(PDO::FETCH_ASSOC);

    $this->id = $res['id'];
    $this->name = $res['name'];
    $this->secret_key = $res['secret_key'];
    $this->publishable_key = $res['publishable_key'];
    $this->developer_id = $res['developer_id'];

  }

  public function getId() {
    return $this->id;
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

  public function getDeveloper() {
    return new User($this->developer_id);
  }

  public function getAppUsers() {
    DB::init();
    $q = DB::$pdo->prepare('SELECT * FROM user_app_link WHERE application_id = :app_id');
    $q->execute(array(
        'app_id' = $this->getId();
     ));

    $res = $q->fetch(PDO::FETCH_ASSOC);



  }

  public function getMonthlyLimitForUser($user) {

  }

  public function getMicroTransactionsForUser($user) {

  }

  public function getAmountDonatedByUser($user) {

  }

}

?>
