                <head>
                <meta charset="utf-8">
                  <meta http-equiv="X-UA-Compatible" content="IE=edge">
                  <link rel="shortcut icon" type="image/x-icon" href="./pics/letöltés.png" />
                  <title>Helpi</title>
                  <meta name="viewport" content="width=device-width, initial-scale=1">
                  <link rel="stylesheet" type="text/css" media="screen" href="style.css">
                </head>
<?php
    session_start();
       $szerver = "localhost";
       $szfel = "root";
       $szjel = "Asdasd12";
       $tabla = "mg";
       
       $kapcs = new mysqli($szerver, $szfel, $szjel, $tabla);
       
       if ($kapcs->connect_errno) {
           die("Connection failed!");
       }
       $result = mysqli_query($kapcs,"SELECT * FROM main");
       //print_r(mysqli_fetch_assoc($result));
       if(isset($_SESSION['id'])){
               $_SESSION['log']=true;
               $azon=$_SESSION[id];
       }
       else{$_SESSION['log']=false;} 
  ?>

<nav>
    <form action="index.php" method="POST" name="log">
      <a href="galery.php">Galéria</a>
      <a href="index.php">Home</a>
      <a href="https://www.facebook.com/Helpi.Eleven">Eleven</a>
      <a href="https://www.facebook.com/tizperc">10 Perc</a>
      <a href="https://www.facebook.com/Helpi.KekElefant">Kék Elefánt</a>
      <?php
        if($_SESSION['log']==false){echo"<a style='float:right' href='logreg.php'>Bejelentkezés</a>";}
          else{
            echo"<a href='user.php'>Küldés</a>";
            echo"<a style='float:right' href='kij.php'>Kijelentkezés</a>";
          }
      ?>
    </form>   
  </nav>