<?php

class Connection
{
  public static $instance;

  public function __construct()
  {
    //
  }

  public static function getInstance()
  {
    $dsn = 'mysql:host=localhost;dbname=livraria;charset=utf8';
    $username = 'root';
    $passwd = '';

    if (!isset(self::$instance)) {
      self::$instance = new PDO(
        $dsn,
        $username,
        $passwd,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
      );

      self::$instance->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::NULL_EMPTY_STRING
      );

      self::$instance->setAttribute(
        PDO::ATTR_ORACLE_NULLS,
        PDO::NULL_EMPTY_STRING
      );
    }
    return self::$instance;
  }
}
