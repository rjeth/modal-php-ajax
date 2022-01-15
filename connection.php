<?php
  define('DB_SERVER', 'localhost:3306');
  define('DB_USERNAME', 'root');
  define('DB_PASSWORD', 'P@ssw0rd');
  define('DB_NAME', 'mulitple_file');

  $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

  if ($conn === false) {
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }
?>