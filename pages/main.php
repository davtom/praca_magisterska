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
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body class="body_load">
    <div class="style_block_top"></div>
    <div class="style_block_bot"></div>
    
    <div class="account_display">
                <p class="name_account_display">Witaj, <br/><?php echo $_SESSION["user"]." !"; ?></p>
                <img class="logo" src="../img/logo.png">
    
    </div>
    
    <div id="display">
    
        <a href="select_car.php"><div class="btn_block">Moje samochody</div></a>
        <a href="logout.php"><div class="btn_block">Wyloguj</div></a>
    
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