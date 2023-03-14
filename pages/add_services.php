<?php

session_start();
//error_reporting(E_ALL & ~E_NOTICE); 


if(isset($_SESSION['loggedin'])){

require_once "config.php";

    $date = $what = "";
    $date_err = $what_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    
    if(empty(trim($_POST["date"]))){
        $date_err = "Uzupełnij datę";
    } else{
        $date = trim($_POST["date"]);
    }
    
    if(empty($_POST["what"])){
        $what_err = "Uzupełnij czynność";
    } else{
        $what = $_POST["what"];
    } 
    
    if(empty($what_err) && empty($date_err)){
        
        $carid = $_SESSION["selectedcar"];
        $sql = "INSERT INTO services (car_id,datewhen,what) VALUES ('$carid','$date','$what')";
        
        if($results = $link->query($sql)){
            
            header("location: display_car.php");
            
        }
        else{
            
            $date_err = "Błąd bazy danych";
            
        }
        
    }
}
    mysqli_close($link);
}
else{
    
    header("url: login.php");
    
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
    
    <a href="display_car.php"><img class="back_arrow" src="../img/downarrow.png"></a>
    
    <div class="wrapper">
        
        
        <table>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <tr><td><h2>Dodaj Serwis</h2></td></tr>
            <tr>
                <tr><td><label>Data:</label><span class="help-block"><?php echo $date_err; ?></span></td></tr>
                <tr><td><input type="date" name="date" value="<?php echo $date; ?>"></td>
            </tr>
            <tr>
                <tr><td><label>Czynność:</label><span class="help-block"><?php echo $what_err; ?></span></td></tr>
            <tr><td><textarea name="what"><?php echo $what; ?></textarea></td>
            </tr>
            <tr>
                <td><input type="submit" value="Dodaj serwis"></td>
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