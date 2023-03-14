<?php

$actual_year = date("Y");

session_start();
error_reporting(E_ALL & ~E_NOTICE);

if(isset($_SESSION['loggedin'])){
  
  $model_err = $make_err = $capacity_err = $year_err = $power_err = $mileage_err = "";
  $model = $make = $capacity = $year = $power = $mileage = "";

 if(isset($_POST['add_car'])){


     if(empty(trim($_POST["model"]))){
            $model_err = "Uzupełnij model";
     } else{
            $model = trim($_POST["model"]);
     }

     if(empty(trim($_POST["make"]))){
            $make_err = "Uzupełnij markę";
     } else{
            $make = trim($_POST["make"]);
     }

     if(empty(trim($_POST["capacity"]))){
            $capacity_err = "Uzupełnij pojemność";
     } else{
            $capacity = trim($_POST["capacity"]);
     }

     if(empty(trim($_POST["year"]))){
            $year_err = "Uzupełnij rocznik";
     } else{
            $year = trim($_POST["year"]);
     }

     if(empty(trim($_POST["power"]))){
            $power_err = "Uzupełnij moc";
     } else{
            $power = trim($_POST["power"]);
     }

     if(empty(trim($_POST["mileage"]))){
            $mileage_err = "Uzupełnij przebieg";
     } else{
            $mileage = trim($_POST["mileage"]);
     }


    if($_SERVER["REQUEST_METHOD"] == "POST"){

        require_once "config.php";
        $userid = $_SESSION["userid"];

        if(empty($make_err) && empty($model_err) && empty($year_err) && empty($capacity_err) && empty($mileage_err) && empty($power_err)){


            $sql = "INSERT INTO cars (user_id,make,model,year,mileage,power,capacity) VALUES ('$userid','$make','$model','$year','$mileage','$power','$capacity')";

            if($results = mysqli_query($link,$sql)){

                header("location: select_car.php");

            }else{

                $make_err = "Błąd bazy danych";

            }


        }



    }
    mysqli_close($link);


 }
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
        <link rel="stylesheet" href="../CSS/loginregister.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <style type="text/css">
    </style>
</head>
<body class="body_load">
    <div class="style_block_top"></div>
    <div class="style_block_bot"></div>

    <a href="select_car.php"><img class="back_arrow" src="../img/downarrow.png"></a>

    <div class="wrapper">

        <table>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <tr>
                <tr><td><label>Marka:</label><span class="help-block"><?php echo $make_err; ?></span></td></tr>
                <tr><td><input type="text" minlength='1' name="make" value="<?php echo $make; ?>"></td></tr>
            <tr>
                <tr><td><label>Model:</label><span class="help-block"><?php echo $model_err; ?></span></td></tr>
                <tr><td><input type="text" minlength='1' name="model" value="<?php echo $model ?>"></td>
            </tr>
            <tr>
                <tr><td><label>Rok produkcji:</label><span class="help-block"><?php echo $year_err; ?></span></td></tr>
                <tr><td><input type="number" min="1886" max="<?php echo $actual_year; ?>" name="year" value="<?php echo $year; ?>"></td></tr>
            <tr>
            <tr>
                <tr><td><label>Pojemnosc (cm<sup>3</sup>):</label><span class="help-block"><?php echo $capacity_err; ?></span></td></tr>
                <tr><td><input type="number" min="0" name="capacity" value="<?php echo $capacity; ?>"></td></tr>
            <tr>
            <tr>
                <tr><td><label>Moc (KW):</label><span class="help-block"><?php echo $power_err; ?></span></td></tr>
                <tr><td><input type="number" min='0' name="power" value="<?php echo $power; ?>"></td></tr>
            <tr>
            <tr>
                <tr><td><label>Przebieg (KM):</label><span class="help-block"><?php echo $mileage_err; ?></span></td></tr>
                <tr><td><input type="number" min='0' max='9999999' name="mileage" value="<?php echo $mileage; ?>"></td></tr>
            <tr>
            <tr>
                <td><input type="submit" name='add_car' value="Dodaj pojazd"></td>
            </tr>
        </form>
            <tr></tr>
            <tr></tr>
        </table>
    </div>

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
