<!Doctype html>
<html>
    <head>
        <?php
            include('./connect.inc.php');
        ?>
    </head>
    <header>
        <h2>
            <?php
                $sql="SELECT nam from main where '$azon'=id";
                $nez=mysqli_query($kapcs,$sql);
                $sor=mysqli_fetch_assoc($nez);
                print_r($sor['nam']);
            ?>
        </h2>
    </header>
    <nav id="sec"></nav>
    <body>
        <div class="left">
            <h2>Képfeltöltés</h2>
            <form method="POST" name="feltolt" action="user.php" enctype="multipart/form-data">
                <input type="file" name="kep">
                <br>
                <input type="submit" name="fok" for="feltolt" Value="Feltöltés">
            </form>
        </div>

        <?php
        if(isset($azon)){
            if(isset($_POST["fok"])){
                $hiba=array();
                $jo=true;
                $tip=pathinfo($_FILES['kep']['name'],PATHINFO_EXTENSION);
                if(!($tip=="jpeg" || $tip=="jpg" || $tip=="png" || $tip=="gif" )){
                    $jo=false;
                    array_push($hiba,"Csak jpeg,jpg,png,gif formátumok");
                }
                if($_FILES['kep']['size']>500000){
                    $jo=false;
                    array_push($hiba,"Nem lehet nagyobb mint 500 KB");
                }
                if($jo){
                    move_uploaded_file($_FILES['kep']['tmp_name'],"pics/galery/".$_FILES['kep']['name']);
                    $kep=$_FILES["kep"]["name"];
                    $sql="INSERT INTO  `pictures`(`id`, `whos`, `pics`, `date`) VALUES (NULL,'$azon',\'./pics/galery/$kep\', CURDATE());";
                    mysqli_query($kapcs,$sql);
                }
                else{echo"<script>alert('$hiba')</script>";}
            }
        }else {header("location:index.php");}
        ?>

        <div class="right">
            <h2>Üzenet küldés</h2>
            <form method="POST" name="uzi" action="user.php">
                <select name="val">
                    <option value="1">Admin</option>
                    <option value="1">Henrik</option>
                </select>
            </form>
        </div>
    </body>
</html>