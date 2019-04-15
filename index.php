<!DOCTYPE html>
<html>
  <head>
  <link rel="shortcut icon" type="image/x-icon" href="letöltés.png" />
  <title>Helpi</title>
  <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
  <meta charset="utf-8">

  </head>
  <body>
  <?php
    include('./connect.inc.php');
  ?>

  <header>
    <h2>Ifjúsági Fejlesztő Műhely</h2>
</header>

  <nav>
    <form action="index.php" method="POST" name="log">
      <a href="galery.php">Galéria</a>
      <a href="https://www.facebook.com/Helpi.Eleven">Eleven</a>
      <a href="https://www.facebook.com/tizperc">10 Perc</a>
      <a href="https://www.facebook.com/Helpi.KekElefant">Kék Elefánt</a>
      <a style="float:right" href="logreg.php">Bejelentkezés</a>
    </form>
    
</nav>

  <div class="row">
    <div class="leftcolumn">
      <div class="card">


      
      </div>
    </div>

    <div class="rightcolumn">

      <div class="card">
        <center>  
          <a href="http://www.hirosagora.hu/helpi"><img src="./pics/index.jpeg"></a>      
        </center>          
      </div>

      <div class="card">
        <h3></h3>
        <iframe src="https://www.youtube.com/aWaebZfvfM8" width="100%" allowfullscreen>
        </iframe>
      </div>

      <div class="card"id="t">
        <center>
        <h3>Nyitva tartás:</h3>
        <p>Hétköznap 09.00-15.30</p>
        <p>Szombat 08.00-12.00</p>
      <div>

      <div class="card" >
        
      </div>
    
    </div>
  </div>

  <footer >
    <h1>Support</h1>
    <h3>Ha bármi gond van ird le</h3>
    <form action="index.php" method="POST">
      <input type="email" name="cím" placeholder="E-mail cím">
      <br>
      <input type="text" name="irás" id="sup" size="50"  placeholder="Ötletek,Meglátások,Problémák ">
      <br>
      <input type="submit" name="send" value="Küldés">
    </form>
        </footer>

  </body>
</html>