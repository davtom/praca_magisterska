<?php

session_start();
error_reporting(E_ALL ^ E_NOTICE);

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

    <a href="select_car.php"><img class="back_arrow" src="../img/downarrow.png"></a>

    <?php

        $userid = $_SESSION["userid"];

        if(isset($_POST['carid'])){

          $carid = $_POST["carid"];

        }

        if(isset($_SESSION['selectedcar'])){

            $carid = $_SESSION["selectedcar"];

        }

        $_SESSION["selectedcar"] = $carid;

        require_once 'config.php';

        $sql = "SELECT * FROM cars where user_id like $userid and id like $carid";

        $results = mysqli_query($link,$sql);

        if(isset($_POST['carid']) or isset($_SESSION["selectedcar"])){

                    unset($_SESSION['no_car']);
                    $row = $results->fetch_assoc();


                    $id = $row["id"];
                    $make = $row["make"];
                    $model = $row["model"];
                    $capacity = $row["capacity"];
                    $year = $row["year"];
                    $mileage = $row["mileage"];
                    $power = $row["power"];
                    $_SESSION["selectedcar_mileage"] = $mileage;

        }
        else{



            header("location: select_car.php");


        }
    ?>

    <div id="car_param"><b>Marka:</b> <?php echo $make ?>&nbsp;&nbsp;&nbsp;<b>Model:</b> <?php echo $model ?>&nbsp;&nbsp;&nbsp;</div>

    <img class='img_car' src="../img/car.png"><div id="car_mileage"><b>Rok:</b> <?php echo $year ?>r.<br/><b>Moc:</b> <?php echo $power ?>kW<br/><b>Przebieg:</b> <?php echo $mileage ?>KM <a href='change_mileage.php'><img class='mileage_change' src='../img/nok.png'></a> </div>

    <a href='add_services.php'><img class='add_services' src='../img/nok.png'></a>

    <div id="car_services">
    <table class="service_table"><tr><td><b>Data</b></td><td><b>Wykonana czynność</b></td></tr></table>
    <div id="services_list">

    <table class="service_table">

        <?php

            $sql2 = "SELECT * FROM services WHERE car_id like $carid";

            if($results2 = mysqli_query($link,$sql2)){
                if(mysqli_num_rows($results2) != 0){
                    while($row = mysqli_fetch_assoc($results2)){

                        $datewhen = $row["datewhen"];
                        $what = $row["what"];

                        echo "<tr class='border_top'><td>$datewhen</td><td class='border_left'>$what</td></tr>";

                    }
                }

            }
            mysqli_close($link);

        ?>
    </table>

    </div>
    </div>
    <a href='delete_car.php'><img class='delete_car' src='../img/trash.png'></a>
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
