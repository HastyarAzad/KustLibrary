<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("Location:../signin/signin.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KUST Register</title>
  <link rel="stylesheet" href="bookregister.css">
</head>

<body>
  <div class="header">
    <div class="logo" onclick="homepage()">
      <img src="../NewKomarLogo.png" alt="kust_logo">
    </div>

    <div class="login">
      <button class="login_button" onclick="logout()">Log Out</button>
    </div>
  </div>

  <div class="main">

    <p class="sign" style="text-align: center;">
      Wellcome back <?php echo $_SESSION['user']; ?>
      <br>
      <br>
      Fill up the informations below
    </p>
    <div id="alert">
      <p id="alert_head">This is an alert</p>
      <p id="alert_error">this is the error Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam exercitationem saepe vitae fuga rem debitis</p>
    </div>

    <form class="form1" action="uploadbook.php" method="POST" enctype="multipart/form-data">
      <input class="un" id="bookname" name="bookname" type="text" placeholder="Book name">
      <input class="un" id="bookauthor" name="bookauthor" type="text" placeholder="Author">
      <select name="department" id="department" class="un">
        <option value="computer">Computer</option>
        <option value="mls">MLS</option>
        <option value="pharmacy">Pharmacy</option>
        <option value="dentistry">Dentistry</option>
        <option value="petroleum">Petroleum</option>
        <option value="civil">Civil</option>
        <option value="english">English</option>
        <option value="religion">Religion</option>
        <option value="environment">Environment</option>
        <option value="business">Business</option>
      </select>
      <input class="un" id="pagenumber" name="pagenumber" type="number" placeholder="Page number">
      <label class="un" for="route">
        <input class="un" accept="application/pdf" id="route" name="route" type="file" placeholder="Route">
        <span id="file-selected">Chose File</span>
      </label>
      <input class="submit" id="submit" type="submit" value="Save">
    </form>

  </div>

  <script src="../jquery-3.5.1.js"></script>
  <script src="bookregister.js"></script>
</body>

</html>