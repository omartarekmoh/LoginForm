<?php
require_once("../DB/db.php");

class User
{
  protected $username;
  protected $email;
  protected $password;
  protected $conpassword;

  function __construct($username, $email, $password, $conpassword)
  {
    $this->username = $username;
    $this->email = $email;
    $this->password = $password;
    $this->conpassword = $conpassword;
  }

  function add_user()
  {
    run_query("INSERT INTO `user_data` (`id`, `userName`, `Email`, `password`) VALUES (NULL, '" . $this->username . "', '" . $this->email . "', '" . $this->password . "');");
  }
}
