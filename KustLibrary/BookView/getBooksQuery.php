<?php

include '../connection.php';
$id =  $_POST['id'];
if($id == 'all'){
  $querry = "SELECT * FROM `books` WHERE 1";
}else{
  $querry = "SELECT * FROM `books` WHERE `department` = '".$id."';";
}


$data = $connection->query($querry);

while($row = mysqli_fetch_array($data)){
  echo '<div id="computer_engineering" class="books btn">';
        echo '<div class="book_img">';
          echo '<img src="book_cover.jpg" alt="Book Cover">';
        echo '</div>';

        echo '<div class="book_info">';
          echo '<h2>'.$row['name'].'</h2>';
          echo '<br>';
          echo '<p>Author name: '.$row['author'].'</p>';
          echo '<br>';
          echo '<p>page number: '.$row['page_number'].'</p>';
          echo '<br>';
          echo '<div class="view_button">';
            echo '<button id="'.$row['id'].'" onclick="openPDF(this.id)">View</button>';
          echo '</div>';
        echo '</div>';
      echo '</div>';

}

?>