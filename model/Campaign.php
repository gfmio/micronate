<?php

class Campaign {

  private $id;
  private $title;
  private $description;
  private $location;
  private $goal;
  private $startDatetime;
  private $endDatetime;
  private $creator_id;

  public static function createNew($creator, $title, $description,
                                   $location, $goal, $startDatetime,
                                   $endDatetime) {
    // create in db and return id

    DB::init();

    $q = DB::$pdo->prepare("INSERT INTO campaign (title, description, location, goal, start_datetime, end_datetime, creator_id)
                       VALUES (:title, :description, :location, :goal, :start_datetime, :end_datetime, :creator_id)");

    $rowsAffected = $q->execute(array(
            ':title' => $title,
            ':description' => $description,
            ':location' => $location,
            ':goal' => $goal,
            ':start_datetime' => $startDatetime,
            ':end_datetime' => $endDatetime,
            ':creator_id' => $creator->getId(),
    ));

    if ($rowsAffected == 0) {
      return 0;
    }

    return DB::$pdo->lastInsertId();
  }

  public function __construct($id) {

    DB::init();
    $q = DB::$pdo->prepare("SELECT * FROM campaign WHERE id = :id LIMIT 1");
    $q->execute(array(
        ':id' => $id,
    ));

    $res = $q->fetch(PDO::FETCH_ASSOC);

    $this->id = $res['id'];
    $this->title = $res['title'];
    $this->description = $res['description'];
    $this->location = $res['location'];
    $this->goal = $res['goal'];
    $this->start_datetime = $res['start_datetime'];
    $this->end_datetime = $res['end_datetime'];
    $this->creator_id = $res['creator_id'];

  }

  public function getId() {
    return $this->id;
  }

  public function getTitle() {
    return $this->title;
  }

  public function getDescription() {
    return $this->description;
  }

  public function getLocation() {
    return $this->location;
  }

  public function getLatitude() {
    return '-0.04';
  }

  public function getLongitude() {
    return '48.0';
  }

  public function getGoal() {
    return $this->goal;
  }

  public function getStartDatetime() {
    return $this->startDatetime;
  }

  public function getEndDatetime() {
    return $this->endDatetime;
  }

  // returns duration of campaign in days
  public function getDuration() {
    // use getEnd - getStart
  }

  public function getDaysLeft() {

  }

  public function getCreator() {
    return new User($this->creator_id);
  }

  public function getDonations() {
    // return donations list
    DB::init();
    $q = DB::$pdo->prepare("SELECT * FROM donation WHERE campaign_id = :campaign_id");
    $q->execute(array(
      ':campaign_id' => $this->id,
    ));

    $donations = array();
    $res = $q->fetchAll(PDO::FETCH_ASSOC);
    foreach($res as $donation) {
      $donations[] = new Donation($donation['id']);
    }
    return $donations;
  }

  public function getTotalDonations() {
    // return donations list
    DB::init();
    $q = DB::$pdo->prepare("SELECT SUM(amount) as total FROM donation WHERE campaign_id = :campaign_id");
    $q->execute(array(
      ':campaign_id' => $this->id,
    ));

    $res = $q->fetch(PDO::FETCH_ASSOC);
    return $res['total'];

  }

  public function getMessages() {
    DB::init();
    $q = DB::$pdo->prepare("SELECT * FROM message WHERE campaign_id = :campaign_id ORDER BY date_time DESC");
    $q->execute(array(
      ':campaign_id' => $this->id,
    ));

    $messages = array();
    $res = $q->fetchAll(PDO::FETCH_ASSOC);
    foreach($res as $message) {
      $messages[] = new Donation($message['id']);
    }
    return $messages;
  }

  public static function getAll() {
    DB::init();
    $q = DB::$pdo->prepare("SELECT * FROM campaign ORDER BY start_datetime DESC");
    $q->execute();
    $res = $q->fetchAll(PDO::FETCH_ASSOC);
    $arr = array();
    foreach($res as $r) {
      $arr[] = new Campaign($r['id']);
    }
    return $arr;

  }
}

?>
