<?php

session_start();
//error_reporting(E_ALL & ~E_NOTICE); 


if(isset($_SESSION['loggedin'])){

require_once "config.php";
    
    if(isset($_SESSION['selectedcar'])){
        
        $carid = $_SESSION["selectedcar"];
        
        if(isset($_POST["yes"])){
            
            $sql1 = "DELETE FROM cars where id=$carid";
            $sql2 = "DELETE FROM services where car_id=$carid";
            
            $result1 = $link->query($sql1);
            $result2 = $link->query($sql2);
            
            header("location: select_car.php");
            
        }
        if(isset($_POST["no"])){
            
            header("location: display_car.php");
            
        }        
    }
    else{
        
        header("location: select_car.php");
        
    }
    
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
            <tr><td><h2>Na pewno?</h2></td></tr>
            <tr>
                <td><input style="height: 20vw;" type="submit" name='yes' value="Tak"></td>
            <tr>
                <td><input style="height: 20vw;" type="submit" name='no' value="Nie"></td>
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