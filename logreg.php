        <input class="input" style="float:right" type="submit" Value="Bejelentkezés"  name="lok" for="log">
        <input class="input" style="float:right" type="password" placeholder="Jelszó" name="lpass">
        <input class="input" style="float:right" type="text" placeholder="Név"        name="luser">
    

        <?php
            if(isset($_POST['lok'])){
              $nev=htmlspecialchars($_POST["luser"],ENT_QUOTES);
              $jelsz=md5(htmlspecialchars($_POST["lpass"],ENT_QUOTES));
              $nez=mysqli_query($kapcs,"SELECT id,pass,lvl FROM main WHERE nam LIKE '$nev'");
              $sor=mysqli_fetch_assoc($nez);
              if($sor['pass']==$jelsz){
                if($sor['pass']==1){header("location:user.php"); $_SESSION['id']=$sor['id'];}
                else if($sor['pass']==2){header("location:adm.php"); $_SESSION['id']=$sor['id'];}
                  else{header("location:index.php");}
              }
              else{echo "<script>alert('Hibás név vagy jelszó')</script>";}
            }
          ?>