<?php

require_once "sign_up.php";
require_once "../DB/db.php";
$message = 'uknown problem please try again later.';

class Validate extends User
{
  function validate_user()
  {
    $uppercase = preg_match('@[A-Z]@', $this->password);
    $lowercase = preg_match('@[a-z]@', $this->password);
    $number    = preg_match('@[0-9]@', $this->password);
    $specialChars = preg_match('@[^\w]@', $this->password);
    $query = "SELECT `userName` FROM `user_data` WHERE `userName` = '" . $this->username . "'";
    $query2 = "SELECT `Email` FROM `user_data` WHERE `Email` = '" . $this->email . "'";

    if (!preg_match('/^[a-zA-Z0-9]{5,}$/', $this->username)) {
      $state = 1;
      return $state;
    } elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
      $state = 2;
      return $state;
    } elseif ($this->password != $this->conpassword) {
      $state = 4;
      return $state;
    } elseif (get_rows($query) >= 1) {
      $state = 5;
      return $state;
    } elseif (get_rows($query2) >= 1) {
      $state = 6;
      return $state;
    } elseif (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($this->password) < 8) {
      $state = 3;
      return $state;
    } else {
      $this->add_user();
      session_start();
      $_SESSION['user'] = $this->username;
      $_SESSION['login'] = true;
      header("Location: http://localhost/LoginForm/Main/signin.php");
    }
  }
}

$user = new Validate($_POST['user'], $_POST['email'], $_POST['pass'], $_POST['conpass']);
$state = $user->validate_user();
if ($state == 1) {
  $message = "Please type a valid user name with more than 5 characters.";
} elseif ($state == 2) {
  $message = "Please type a valid E-mail.";
} elseif ($state == 3) {
  $message = "Please type a valid password with upper case, lower case and number.";
} elseif ($state == 4) {
  $message = "You passwords doesn't match.";
} elseif ($state == 5) {
  $message = "The username you've entered is taken please try something else or <a href=\"signin.php\">Login</a>.";
} elseif ($state == 6) {
  $message = "The E-mail you've entered is taken please try something else or <a href=\"signin.php\">Login</a>.";
}


// where are we posting to?
$url = 'http://localhost/LoginForm/Main/signup.php';

// what post fields?
$fields = array(
  'user' => $_POST['user'],
  'email' => $_POST['email'],
  'message' => $message
);

// build the urlencoded data
$postvars = http_build_query($fields);

// open connection
$ch = curl_init();

// set the url, number of POST vars, POST data
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, count($fields));
curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);

// execute post
$result = curl_exec($ch);

// close connection
curl_close($ch);
