<?php

session_start();
error_reporting(E_ALL & ~E_NOTICE);

if(isset($_POST['new_acc'])){

    header("url: register.php",false);

}else{

if(!isset($_SESSION['loggedin'])){

require_once "config.php";

$username = $password = "";
$username_err = $password_err = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){


    if(empty(trim($_POST["username"]))){
        $username_err = "Uzupełnij login";
    } else{
        $username = trim($_POST["username"]);
    }


    if(empty(trim($_POST["password"]))){
        $password_err = "Uzupełnij hasło";
    } else{
        $password = trim($_POST["password"]);
    }


    if(empty($username_err) && empty($password_err)){

        $sql = "SELECT * FROM users WHERE username='$username'";

        if($results = mysqli_query($link,$sql)){

          if(mysqli_num_rows($results) == 1){

            $row = mysqli_fetch_assoc($results);

            $param_username = $row["username"];

                    if($param_username === $username){

                        if(md5($password) === $row["password"]){

                            $_SESSION["loggedin"] = true;
                            $_SESSION["userid"] = $row['id'];
                            $_SESSION["user"] = $row['name']." ".$row['surname'];
                            header("location: main.php");


                        } else{

                            $password_err = "Podałeś niewłaściwe hasło.";
                        }
                    }else {

                        $username_err = "Błędny Login / Login nie istnieje";
                    }
                }else{

                  $username_err = "Błędny Login / Login nie istnieje";

                }
              }

            }
        }


    mysqli_close($link);
}
else{

    header("url: main.php");

}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <link rel="stylesheet" href="../CSS/load.css">
        <link rel="stylesheet" href="../CSS/loginregister.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <style type="text/css">
    </style>
</head>
<body class="body_load">
    <div class="wrapper">


        <table>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <tr><td><h2>Logowanie</h2></td></tr>
                <tr><td><label>Login:</label><span class="help-block"><?php echo $username_err; ?></span></td></tr>
                <tr><td><input type="text" name="username" value="<?php echo $username; ?>"></td></tr>
            <tr>
                <tr><td><label>Hasło:</label><span class="help-block"><?php echo $password_err; ?></span></td></tr>
                <tr><td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td><input type="submit" name='login' value="Zaloguj"></td>
            </tr>

        </form>
            <tr>
                <td><a href="register.php"><input type="submit" value="Zarejestruj się"></a></td>
            </tr>
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
