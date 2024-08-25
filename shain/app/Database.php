<?php
define('DSN','mysql:host=localhost;dbname=company;charset=utf8mb4');
define('USER','root');
define('PASS','root');


class Database
{
private $pdo;

private function connect()
  {
    if(!isset($this->pdo)){
      $this->pdo = new PDO(
        DSN,
        USER,
        PASS,
        [
          pdo::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
          pdo::ATTR_EMULATE_PREPARES => false
        ]
      );
    }
  }
} 
