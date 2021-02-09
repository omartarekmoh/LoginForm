<?php
require_once("../DB/db.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $arr = get_data("SELECT password FROM `user_data` WHERE Email = \"" . $_POST["user"] . "\" OR userName = \"" . $_POST["user"] . "\"");
  session_start();
  if ($arr['password'] == $_POST['pass']) {
    $_SESSION["login"] = TRUE;
    $_SESSION["user"] = $_POST['user'];
    header("Location: http://localhost/LoginForm/Main/signin.php");
  } else {
    $_SESSION["login"] = FALSE;
    $_SESSION["user"] = $_POST['user'];
    header("Location: http://localhost/LoginForm/Main/signin.php");
  }
  echo "omar";
}
