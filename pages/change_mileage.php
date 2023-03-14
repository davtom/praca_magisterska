<?php

session_start();
//error_reporting(E_ALL & ~E_NOTICE); 


if(isset($_SESSION['loggedin'])){

require_once "config.php";

    $mileage = "";
    $mileage_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    
    if(empty(trim($_POST["mileage"]))){
        $mileage_err = "Uzupełnij przebieg";
    } else{
        $mileage = trim($_POST["mileage"]);
    }    
    
    if(empty($mileage_err)){
        
        $carid = $_SESSION["selectedcar"];
    
        $sql = "UPDATE cars SET mileage='$mileage' WHERE id='$carid'";
        
        if($results = mysqli_query($link,$sql)){
            
            $_SESSION["selectedcar_mileage"] = $mileage;
            header("location: display_car.php");
            $mileage_err = "?";
            
        }
        else{
            
            $mileage_err = "Błąd bazy";
            header("location: display_car.php");
            
        }
    }
}
    mysqli_close($link);
}
else{
    
    header("url: main.php");
    
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
        <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <style type="text/css">
    </style>
</head>
<body class="body_load">
    
    <a href="select_car.php"><img class="back_arrow" src="../img/downarrow.png"></a>
    
    <div class="wrapper">
        
        
        <table>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <tr><td><h2>Zmiana przebiegu</h2></td></tr>
                <tr><td><label>Przebieg:</label><span class="help-block"><?php echo $mileage_err; ?></span></td></tr>
                <tr><td><input type="number" min='<?php echo $_SESSION['selectedcar_mileage'] ?>' name="mileage" value="<?php echo $_SESSION['selectedcar_mileage'] ?>"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Aktualizuj przebieg"></td>
            </tr>
            
        </form>
            <tr></tr>
            <tr></tr>
        </table>
    </div>
    
    <div class="style_block_top"></div>
    <div class="style_block_bot"></div>
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