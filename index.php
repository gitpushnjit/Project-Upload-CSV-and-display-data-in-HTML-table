<?php
ini_set('display errors', 'On');

error_reporting(E_ALL);


class Manage
{
public static function autoload($class)
  {
    include $class . '.php;
  }
}  

?>
