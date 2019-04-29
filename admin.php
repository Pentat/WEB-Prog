<!DOCTYPE html>
<html>
    <head>
        <?php
                include('./connect.inc.php');
                $azon=$_SESSION[id];
        ?>
    </head>
    <body>
            
            <header>
                <h2>Admin</h2>
            </header>
            <nav id="sec"></nav>
        <center>
            <form action="admin.php" method="POST">
                <input type="search" name="ker" Placeholder="Keresés">
                <input type="submit" name="keres" value="Keresés">
            </form>
            <table>
                <?php 
                    error_reporting( error_reporting() & ~E_NOTICE );
                    
                    if(isset($azon)){
                        if(isset($_POST["keres"])){
                            $ker=$_POST["ker"];
                            $sql="select * from main where nam LIKE  '$ker%' order by nam ASC";}
                        else{$sql="select * from main order by nam ASC";}
                        $nez=mysqli_query($kapcs,$sql);
                        while($sor=mysqli_fetch_assoc($nez)){
                            printf("<tr><td><a>%s</a></td><td><input type='image' src='./pics/user.png' name='x' style='cursor:pointer;' value='%s' alt='Submit' width='24' height='24'></td></tr>",$sor["nam"],$sor["id"]);
                            if(isset($_POST["x"])){
                                $_SESSION["user"]=$_POST["x"];
                                header("location:admkez.php");
                            }
                        }
                    }
                    else {header("location:kij.php");}
                ?>
            </table>
        </center>
    </body>
</html>