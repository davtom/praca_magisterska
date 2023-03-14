<?php

session_start();
error_reporting(E_ALL & ~E_NOTICE); 

if(isset($_SESSION['loggedin'])){

    
    
}
else{
 
 header("location: login.php");
    
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <link rel="stylesheet" href="../CSS/load.css">
        <link rel="stylesheet" href="../CSS/main.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <style type="text/css">
    </style>
</head>
<body class="body_load">    
    <div class="style_block_top"></div>
    <div class="style_block_bot"></div>
    
    <a href="main.php"><img class="back_arrow" src="../img/downarrow.png"></a>
    <?php
    
        $userid = $_SESSION["userid"];
        unset($_SESSION['selectedcar']);
        require_once 'config.php';

        $sql = "SELECT * FROM cars where user_id=$userid";

        $results = mysqli_query($link,$sql);

        if(mysqli_num_rows($results) == 0){

            echo "<span class='no_car_info'>Nie masz jeszcze dodanego żadnego samochodu, możesz go dodać klikajać przycisk poniżej</span>";
            echo "<a href='add_car.php'><img class='add_a_car' src='../img/nok.png'></a>";
            $_SESSION["no_car"] = TRUE;
            
        }
        else{
            
            echo "<span class='no_car_info'>Twoje pojazdy (".mysqli_num_rows($results)."):</span>";
            echo "<a href='add_car.php'><img class='add_a_car_but_smoll' src='../img/nok.png'></a>";
            echo "<table class='car_table'>";
            unset($_SESSION['no_car']);
            
                while($row = mysqli_fetch_assoc($results)){
                    
                    $carid = $row["id"];
                    $make = $row["make"];
                    $model = $row["model"];
                    $capacity = $row["capacity"];
                    $year = $row["year"];
                    $mileage = $row["mileage"];
                    $power = $row["power"];
                    
                    echo "<tr><td><img class='car_img' src='../img/car.png'></td><td>$make</td><td>$model</td><td>$year</td><td><form method='post' action='display_car.php'><input type='hidden' name='carid' value='$carid'><input class='select_car_btn' name='select_car' type='submit' value='>'></form></td></tr>";
                    

                }
            
            echo "</table>";
            
        }
    $link->close();
    ?>
    <div id="landscape"><p>Obróć urządzenie</p></div>
</body>    
    
    <script>
window.addEventListener("resize", function() {
if( window.outerWidth > window.outerHeight )
          {
              window.scrollTo(1,1);
              $('#landscape').show();
              lockScroll();
          }
          else{
               $('#landscape').hide();
               unLockScroll();
          }
}, false);
    
    function lockScroll()
{
     $(document).bind("touchmove",function(event){
                        event.preventDefault();
     });
}
function unLockScroll()
{
    $(document).unbind("touchmove");
}
    
    
    </script>
    
</html>