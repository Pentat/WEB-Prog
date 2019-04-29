<!DOCTYPE html>
<html>
  <head>
    <?php
    include('./connect.inc.php');
    
    ?>
  </head>
  <body>
    <header>
      <h2>
        <?php
          if(isset($azon)){
            $sql="SELECT nam from main where '$azon'=id";
            $nez=mysqli_query($kapcs,$sql);
            $sor=mysqli_fetch_assoc($nez);
            print_r($sor['nam']);
          }else{echo"Galéria";}
        ?>
      </h2>
    </header>
    <?php
      $sql="SELECT pics FROM `pictures` WHERE 1";
      $nez=mysqli_query($kapcs,$sql);
      while($sor=mysqli_fetch_assoc($nez)){
        printf("<img src='%s'>",$sor['pics']);
      }
    ?>
  </body>
</html>