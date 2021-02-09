<?php
// $url = 'http://localhost/LoginForm/Main/signin.php';

// // what post fields?
// $fields = array(
//   'username' => "none",
// );

// // build the urlencoded data
// $postvars = http_build_query($fields);

// // open connection
// $ch = curl_init();

// // set the url, number of POST vars, POST data
// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_POST, count($fields));
// curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);

// // execute post
// $result = curl_exec($ch);

// // close connection
// curl_close($ch);

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
