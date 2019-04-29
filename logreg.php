<!DOCTYPE html>
<html>
<head>
 
  <script type="text/javascript">

        function reg(){
            document.getElementById('reg').style.display='block';
            document.getElementById('log').style.display='none';
        }
        
  </script>
</head>
<?php
    include('./connect.inc.php');
  ?>
<body onload="document.getElementById('log').style.display='block';document.getElementById('reg').style.display='none';">
  <header>
    <h2>Belépés</h2>
  </header>

  <nav>
    <a onclick="reg()" style='float:Right;'>Regisztráció</a>
    <a href="index.php">Kezdőlap</a>
  </nav>
  


  <div id="log">
    <center>
      <div>
        <span style='float:Right;' onclick="document.getElementById('log').style.display='none'">x</span>
        <h1>Bejelentkezés</h1>
      </div>
      <div>
        <form action="logreg.php" method="POST" name="log">
          <input type="text" placeholder="Név"        name="luser"><br>
          <input type="password" placeholder="Jelszó" name="lpass"><br>
          <input type="submit" Value="Bejelentkezés"  name="lok" for="log"><br>
        </form>
      </div>
  <?php
      if(isset($_POST['lok'])){
        $nev=htmlspecialchars($_POST["luser"],ENT_QUOTES);
        $jelsz=md5(htmlspecialchars($_POST["lpass"],ENT_QUOTES));
        $nez=mysqli_query($kapcs,"SELECT id,pass,lvl FROM main WHERE nam LIKE '$nev'");
        $sor=mysqli_fetch_assoc($nez);
        if($sor['pass']==$jelsz){
          if($sor['lvl']==1){header("location:user.php"); $_SESSION['id']=$sor['id'];}
          else if($sor['lvl']==2){header("location:admin.php"); $_SESSION['id']=$sor['id'];}
            else{header("location:kij.php");}
        }
        else{echo "<script>alert('Hibás név vagy jelszó')</script>";}
      }
    ?>
    </center>
  </div>


  <div id="reg">
    <center>
      <div>
        <span style='float:Right;' onclick="document.getElementById('reg').style.display='none'">x</span>
        <h1>Regisztráció</h1>
      </div>
      <div>
        <form action="logreg.php" method="POST" name="regi">
          <input type="text" placeholder="Név"                name="ruser"><br>
          <input type="password" placeholder="Jelszó"         name="rpass1"><br>
          <input type="password" placeholder="Jelszó"         name="rpass2"><br>
          <input type="mail" placeholder="Name@mail.com"      name="rmail"><br>
          <input type="number" placeholder="Kor"              name="rage"><br>
          <input type="submit" Value="Bejelentkezés"          name="rok" for="regi"><br>
        </form>
      </div>
  <?php
      if(isset($_POST['rok'])){
        $nev=htmlspecialchars($_POST["ruser"],ENT_QUOTES);
        $nez=mysqli_query($kapcs,"SELECT nam FROM main WHERE nam LIKE '$nev'");
        $sor=mysqli_fetch_assoc($nez);
        if($sor['nam']!=$nev){
          if(isset($_POST["ruser"],$_POST["rpass1"],$_POST["rpass2"],$_POST["rmail"],$_POST["rage"])){
            if($_POST["rpass1"]==$_POST["rpass2"]){
              $jelsz=md5(htmlspecialchars($_POST["lpass"],ENT_QUOTES));
              $mail=$_POST["rmail"];
              $nez=mysqli_query($kapcs,"INSERT INTO `main`(`id`, `nam`, `pass`, `mail`, `lvl`) VALUES (NULL,'$nev','$jelsz','$mail',1)");
              $sor=mysqli_fetch_assoc($nez);
              echo "<script>alert('Sikeres regisztráció!')</script>";
              header("location:logreg.php");
            }
            else{echo "<script>alert('Nem eggyező jelszó!')</script>";}
          }
          else{echo "<script>alert('Minden mezőt tölts ki!')</script>";}
        }
        else{echo "<script>alert('Foglalt név! Sikertelen regisztráció!')</script>";}
      }
    ?>
    </center>
  </div>
</body>
</html>