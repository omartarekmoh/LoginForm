<?php
session_start();
session_destroy();
header("Location: http://localhost/LoginForm/Main/signin.php");
