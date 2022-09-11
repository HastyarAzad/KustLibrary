<?php

  require '../connection.php';
  $username = $_POST['username'];
  $password = $_POST['password'];
  session_start();
  
  $Qrery = "SELECT * FROM `users` WHERE `username`= '".$username."' and `password` = '".$password."'";

  $result = mysqli_query($connection, $Qrery);


  
  if(!$result->num_rows == 0){

    $row = mysqli_fetch_array($result);

    if($row['username'] == $username){
      $_SESSION['user'] = $username;
      echo 'successful';
    }
    
  }else{
    echo 'error';
  }
  

?>