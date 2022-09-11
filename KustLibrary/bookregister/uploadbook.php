<?php
require '../connection.php';

$bookname = $_POST['bookname'];
$bookauthor = $_POST['bookauthor'];
$department = $_POST['department'];
$pagenumber = $_POST['pagenumber'];
$route = $_FILES['route']['name'];

$dbpath = pathinfo($route)['filename'].'/'.$route;
// Fall 2020 Class Schedule/Fall 2020 Class Schedule.pdf
// Wireless_based_Smart_Parking_System_using_ZigbeeWireless_based_Smart_Parking_System_using_Zigbee.pdf
// Wireless_based_Smart_Parking_System_using_Zigbee

$uploadOk = 1;
$FileTypeCheck = 0;
$FileType = strtolower(pathinfo($_FILES['route']['name'], PATHINFO_EXTENSION));


// Allow certain file formats
if ($FileType != "pdf") {
  $uploadOk = 0;
  $FileTypeCheck = 1;
}

chdir('../books');

if(file_exists(pathinfo($route)['filename'])){
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  if($FileTypeCheck == 1){
    echo "Sorry, only pdf files are allowed.";  // case 1
  } else {
    echo "file have already been uploaded";
  }
  
  // if everything is ok, try to upload file
} else {

  mkdir(pathinfo($route)['filename']);
  chdir('./' . pathinfo($route)['filename']);
  $target_file = getcwd() . '\\' . basename($route);

  if (move_uploaded_file($_FILES["route"]["tmp_name"], $target_file)) {

    $query = $connection->prepare("INSERT INTO `books`(`id`, `name`, `author` , `department`, `page_number`, `route`) VALUES (NULL,?,?,?,?,?);");
    $query->bind_param('sssss',$bookname,$bookauthor,$department,$pagenumber,$dbpath);

    if ($query->execute() === TRUE) {
      echo 'your file was stored in the database'; // case 3
    } else {
      echo "Error: " . $query . "<br>" . $connection->error; // case 4
      chdir('../');
      deleteDirectory(pathinfo($route)['filename']);
    }
  } else {
    echo 'the file could not be copied';  // case 2
    chdir('../');
    deleteDirectory(pathinfo($route)['filename']);
  }
}


function deleteDirectory($dirPath) {
  if (is_dir($dirPath)) {
      $objects = scandir($dirPath);
      foreach ($objects as $object) {
          if ($object != "." && $object !="..") {
              if (filetype($dirPath . DIRECTORY_SEPARATOR . $object) == "dir") {
                  deleteDirectory($dirPath . DIRECTORY_SEPARATOR . $object);
              } else {
                  unlink($dirPath . DIRECTORY_SEPARATOR . $object);
              }
          }
      }
  reset($objects);
  rmdir($dirPath);
  }
}
