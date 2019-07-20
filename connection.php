<?php
class DB
{
    private static $instance = NULl;
    public static function getInstance() {
     
      if (!isset(self::$instance)) {
        try {
          $sqliteFile = "demo.db";
          self::$instance = new PDO('sqlite:' . $sqliteFile);
          self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          self::$instance->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $ex) {
          die($ex->getMessage());
        }
      }
      return self::$instance;
    }
}