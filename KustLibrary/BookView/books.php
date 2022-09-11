<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KUST Library</title>
  <link rel="stylesheet" href="books.css">
</head>

<body>

  <header id="head">
    <div class="logo">
      <img src="../NewKomarLogo.png" alt="kust_logo" id="kust_logo" onclick="homepage()">
    </div>
    <div style="display: flex; align-self: flex-end;">
      <nav>
        <ul class="nav__links">
          <li><a onclick="set_selected(this.id)" class="btn" id="all">All</a></li>
          <li><a onclick="set_selected(this.id)" class="btn" id="computer">Computer</a></li>
          <li><a onclick="set_selected(this.id)" class="btn" id="business">Business</a></li>
          <li><a onclick="set_selected(this.id)" class="btn" id="mls">MLS</a></li>
          <li><a onclick="set_selected(this.id)" class="btn" id="pharmacy">Pharmacy</a></li>
          <li><a onclick="set_selected(this.id)" class="btn" id="dentistry">Dentistry</a></li>
          <li><a onclick="set_selected(this.id)" class="btn" id="civil">Civil</a></li>
          <li><a onclick="set_selected(this.id)" class="btn" id="environment">Environment</a></li>
          <li><a onclick="set_selected(this.id)" class="btn" id="petroleum">Petroleum</a></li>
          <li><a onclick="set_selected(this.id)" class="btn" id="english">English</a></li>
          <li><a onclick="set_selected(this.id)" class="btn" id="religion">Religion</a></li>
        </ul>
      </nav>

      <div id="wrap">
        <form action="books.html" method="POST" autocomplete="off" class="ajax">
          <input id="search" name="search" type="text" placeholder="Search...">
          <input id="search_submit" value="" type="submit">
        </form>
      </div>

    </div>

    <a class="cta" href="../signin/signin.php">Sign in</a>
    <p class="menu cta">Menu</p>
  </header>
  <div id="mobile__menu" class="overlay">
    <a class="close">&times;</a>
    <br>
    <br>
    <div class="overlay__content">
      <a onclick="set_selected(this.id)" class="btn" id="_all">All</a>
      <a onclick="set_selected(this.id)" class="btn" id="_computer">Computer</a>
      <a onclick="set_selected(this.id)" class="btn" id="_business">Business</a>
      <a onclick="set_selected(this.id)" class="btn" id="_mls">MLS</a>
      <a onclick="set_selected(this.id)" class="btn" id="_pharmacy">Pharmacy</a>
      <a onclick="set_selected(this.id)" class="btn" id="_dentistry">Dentistry</a>
      <a onclick="set_selected(this.id)" class="btn" id="_civil">Civil</a>
      <a onclick="set_selected(this.id)" class="btn" id="_environment">Environment</a>
      <a onclick="set_selected(this.id)" class="btn" id="_petroleum">Petroleum</a>
      <a onclick="set_selected(this.id)" class="btn" id="_english">English</a>
      <a onclick="set_selected(this.id)" class="btn" id="_religion">Religion</a>
      <a href="../signin/signin.php">Sign in</a>

    </div>
  </div>

  <main id="main">
    <div class="category_container">
      
    </div>
  </main>
  
  <script src="../jquery-3.5.1.js"></script>
  <script src="books.js"></script>

</body>

</html>