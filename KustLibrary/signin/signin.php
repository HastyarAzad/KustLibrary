<?php
  session_start();

  if(isset($_SESSION['user'])){
    header("Location: ../bookregister/bookregister.php");
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kust Sign in</title>
  <link rel="stylesheet" href="signin.css">
</head>

<body>

  <div class="header">
    <div class="logo">
      <div>
        <img src="../NewKomarLogo.png" alt="kust_logo" onclick="homepage()">
      </div>
    </div>
  </div>

  <div class="main">

    <p class="sign">Sign in</p>

    <form class="form1" method="POST" action="validate.php" autocomplete="off">
      <input class="un" name="username" type="text" placeholder="Username">
      <input class="pass" name="password" type="password" placeholder="Password">
      <input type="submit" class="submit">
    </form>
    <p id="p"></p>

  </div>

  <script src="../jquery-3.5.1.js"></script>
  <script src="signin.js"></script>

</body>

</html>