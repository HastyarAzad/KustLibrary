<?php

include '../connection.php';
$id =  $_POST['id'];

$querry = "SELECT * FROM `books` WHERE `id` = '".$id."';";
$data = $connection->query($querry);
while($row = mysqli_fetch_array($data)){
  echo $row['route'];
}

?>