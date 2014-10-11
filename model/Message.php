<?php

class Message {

  private $id;
  private $content;
  private $author_id;
  private $campaign_id;
  private $date_time;

  public static create($content, $author, $campaign) {

        DB::init();

        $q = DB::$pdo->prepare("INSERT INTO message (content, author_id, campaign_id)
                           VALUES (:content, :author_id, :campaign_id)");

        $rowsAffected = $q->execute(array(
                ':content' => $content,
                ':author_id' => $author,
                ':campaign_id' => $campaign->getId(),
        ));

        if ($rowsAffected == 0) {
          return 0;
        }

        return DB::$pdo->lastInsertId();
  }

  public function __construct($id) {

    DB::init();
    $q = DB::$pdo->prepare("SELECT * FROM message WHERE id = :id LIMIT 1");
    $q->execute(array(
        ':id' => $id,
    ));

    $res = $q->fetch(PDO::FETCH_ASSOC);

    $this->id = $res['id'];
    $this->content = $res['content'];
    $this->author_id = $res['author_id'];
    $this->campaign_id = $res['campaign_id'];
    $this->date_time = $res['date_time'];
  }

  public function getId() {
    return $this->id;
  }

  public function getContent() {
    return $this->content;
  }

  public function getAuthor() {
    return new User($this->author_id);
  }

  public function getCampaign() {
    return new Campaign($this->campaign_id);
  }

  public function getDateTime() {
    return $this->date_time;
  }

}

?>
