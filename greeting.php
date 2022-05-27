<?php

require_once 'config.php'; // настройки db
require_once 'db_function.php'; // функция для работы с db

abstract class GreetingAbstract
{
  protected $name;
  protected $surname;

  public function new($name, $surname)
  {
    $this->name = $name;
    $this->surname = $surname;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getSurname()
  {
    return $this->surname;
  }

  abstract public function save();

  abstract public function read();

}

class Greeting extends GreetingAbstract
{

  public function getName(): string
  {
    return "Здорово $this->name!";
  }

  public function save()
  {
    // соединение с db
    $conn = connect();
    // пишем в db
    execQuery($conn,"INSERT INTO `users` (`name`, `surname`) VALUES ('{$this->name}', '{$this->surname}')");
  }

  public function read()
  {
    // соединение с db
    $conn = connect();
    // получаем из db последнего добавленного
    $sql = "SELECT * FROM users ORDER BY id DESC LIMIT 1";
    return select($conn, $sql);
  }

}
?>