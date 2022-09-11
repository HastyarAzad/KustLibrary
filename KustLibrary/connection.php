<?php
  $db_username = "hastyar";
  $db_password = "Hastyar123";
  $host = "localhost";
  $database_name = "KustLibrary";
 
  $connection = mysqli_connect($host,$db_username,$db_password,$database_name) or die("error 1".mysqli_connect_error());

?>