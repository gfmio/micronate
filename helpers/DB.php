<?php

class DB {

    public static $pdo = null;

    public static function init() {
      self::$pdo = new PDO('mysql:host=;dbname=micronate_db', 'micronate_user', '');
    }
}

?>
