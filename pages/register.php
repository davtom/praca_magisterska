<?php

session_start();
error_reporting(E_ALL & ~E_NOTICE);


if(!isset($_SESSION['loggedin'])){

    require_once "config.php";

    $username = $password = "";
    $name = $surname = "";
    $username_err = $password_err = "";
    $name_err = $surname_err = "";
    $registered = "";

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

    if(empty(trim($_POST["name"]))){
        $name_err = "Uzupełnij imię";
    } else{
        $name = trim($_POST["name"]);
    }

    if(empty(trim($_POST["name"]))){
        $surname_err = "Uzupełnij nazwisko";
    } else{
        $surname = trim($_POST["surname"]);
    }


    if(empty($username_err) && empty($password_err) && empty($surname_err) && empty($name_err)){

        $password = md5($password);

        $sql_check = "SELECT * from users where username='$username'";
         $result=mysqli_query($link,$sql_check);
         if (mysqli_num_rows($result) == 0)
         {


                       $sql = "INSERT INTO users (username,password,name,surname) VALUES ('$username','$password','$name','$surname')";

                       if($result = mysqli_query($link,$sql)){

                           $registered = "Konto utworzone, możesz się teraz zalogować";
                           header("location: login.php");

                       }
                       else{

                           $username_err = "Błąd bazy, skontaktuj się z administratorem";

                       }


         }
        else{

             $username_err = "Użytkownik już istnieje";
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
        <link rel="stylesheet" href="../CSS/loginregister.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <style type="text/css">
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body class="body_load">
    <div class="wrapper">

        <table>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <tr><td><h2>Rejestracja</h2></td></tr>
            <tr>
                <tr><td><label>Login:</label><span class="help-block"><?php echo $username_err; echo $registered; ?></span></td></tr>
                <tr><td><input type="text" minlength='3' name="username" value="<?php echo $username; ?>"></td></tr>
            <tr>
                <tr><td><label>Hasło:</label><span class="help-block"><?php echo $password_err; ?></span></td></tr>
                <tr><td><input type="password" minlength='3' name="password"></td>
            </tr>
            <tr>
                <tr><td><label>Imię:</label><span class="help-block"><?php echo $name_err; ?></span></td></tr>
                <tr><td><input type="text" name="name" value="<?php echo $name; ?>"></td></tr>
            <tr>
            <tr>
                <tr><td><label>Nazwisko:</label><span class="help-block"><?php echo $surname_err; ?></span></td></tr>
                <tr><td><input type="text" name="surname" value="<?php echo $surname; ?>"></td></tr>
            <tr>
            <tr>
                <td><input type="submit" name='register' value="Zarejestruj się"></td>
            </tr>
        </form>
            <tr>
                <td><a href="login.php"><input type="submit" value="Logowanie"></a></td>
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
