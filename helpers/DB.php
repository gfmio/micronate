<?php

class DB {
	public static $pdo = null;

    public static function init() {
      if (self::$pdo == null) {
      	self::$pdo = new PDO('mysql:host=localhost;dbname=micronate_db', 'micronate_user', '^?8k43&394i?L.FXGwDhAbiRsEmH.JBhqD@[xG#N3H7q8xqN/7');
      }
    }
}

?>
