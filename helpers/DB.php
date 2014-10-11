<?php

class DB {

    public static $pdo = null;

    public static function init() {
      self::$pdo = new PDO('mysql:host=127.0.0.1;dbname=micronate_db', 'micronate_user', '^?8k43&394i?L.FXGwDhAbiRsEmH.JBhqD@[xG#N3H7q8xqN/7');
    }
}

?>
