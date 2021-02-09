<?php


  function open_connection()
  {
    $conn = new mysqli('localhost', 'root', '', 'user');
    return $conn;
  }

  function close_connection()
  {
    $con = open_connection();
    $con->close();
  }

  function run_query($query)
  {
    $conn = open_connection();
    $result = mysqli_query($conn, $query) or die("Invalid query: " . mysqli_error($conn));
    close_connection();
    return $result;
  }

  function get_data($query)
  {
    $result = run_query($query);
    $data = mysqli_fetch_array($result);
    return $data;
  }

  function get_rows($query)
  {
    $result = run_query($query);
    $num = mysqli_num_rows($result);
    return $num;    
  }

  
