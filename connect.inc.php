<?php
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
                session_start();
                if(isset($_SESSION['id']))
  ?>
