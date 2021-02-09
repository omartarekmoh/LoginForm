<?php
require_once("../DB/db.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $arr = get_data("SELECT password FROM `user_data` WHERE Email = \"" . $_POST["user"] . "\" OR userName = \"" . $_POST["user"] . "\"");
  session_start();
  if (!empty($_POST['user'] && !empty($_POST['pass']))) {
    if (empty($arr)) {
      $_SESSION["login"] = FALSE;
      $_SESSION["user"] = $_POST['user'];
      $_SESSION["cause"] = "Wrong Username or E-mail please check it and try again or";
      header("Location: http://localhost/LoginForm/Main/signin.php");
    } elseif ($arr['password'] == $_POST['pass']) {
      $_SESSION["login"] = TRUE;
      $_SESSION["user"] = $_POST['user'];
      header("Location: http://localhost/LoginForm/Main/signin.php");
    } else {
      $_SESSION["login"] = FALSE;
      $_SESSION["cause"] = "Wrong Password please check it and try again or";
      $_SESSION["user"] = $_POST['user'];
      header("Location: http://localhost/LoginForm/Main/signin.php");
    }
  } else {
    $_SESSION["login"] = FALSE;
    $_SESSION["cause"] = "Please fill the form or";
    header("Location: http://localhost/LoginForm/Main/signin.php");
  }
}
