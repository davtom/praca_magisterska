<?php

session_start();
    
require_once "config.php";

$error_msg = "";

if(isset($_POST["submit"])){
    
    $old_pass = $_POST["old_password"];
    $new_pass = $_POST["new_password"];
    $rnew_pass = $_POST["rnew_password"];
    $user = $_SESSION["username"];
    
    if(!empty($old_pass) && !empty($new_pass) && !empty($rnew_pass)){
        
        if($new_pass != $rnew_pass){
            
            pg_query($link,"INSERT INTO logs (who,what) VALUES ('$user','Nieudana próba zmiany hasła - nie identyczne nowe hasła')");
            $error_msg = "Nowe hasła nie są identyczne";
            
        }
        else{
            
            $query = "SELECT password FROM accounts WHERE data='$user'";
            
            if($result = $link->query($query)){
                
                $row = $result->fetch_assoc();
                $dbold_pass = $row["password"];
                
                if($dbold_pass != md5($old_pass)){
                    
                    $error_msg = "Stare hasło jest nie prawidłowe";
                    mysqli_query($link,"INSERT INTO logs SET who='$user', what='Nieudana próba zmiany hasła - podano złe stare hasło'");
                    
                }
                else{
                    
                    $new_pass = md5($new_pass);
                    
                    if($dbold_pass != $new_pass){
                        $query = "UPDATE accounts SET password='$new_pass' WHERE data='$user'";

                        if($result = $link->query($query)){

                            echo "<div id='alert_pos'>Hasło zostało zmienione</div>";
                            mysqli_query($link,"INSERT INTO logs SET who='$user', what='Zmieniono hasło'");
                            if($_SESSION["usergroup"] == "inzynier"){
                                header( "Refresh: 2; url='dpp.php'");
                            }
                            if($_SESSION["usergroup"] == "lider"){
                                header( "Refresh: 2; url='smt.php'");
                            }

                        }
                        else{
                            
                            $error_msg = "Coś nie pykło";
                            
                        }
                        
                    }
                    else{
                        
                        $error_msg = "Serio? To po coś tu właził jak ustawiasz to samo...";
                        
                    }
                    
                }
                
                
            }
            
            else{
                
                $error_msg = "Nieznany błąd, skontaktuj się z administratorem";
                
            }
            
        }
        
    }
    else{
        
            mysqli_query($link,"INSERT INTO logs SET who='$user', what='Nieudana próba zmiany hasła - nie uzupełniono danych'");
            $error_msg = "Uzupełnij dane";
        
    }
    
}


mysqli_close($link);
?>

<!DOCTYPE html>
<html class="body_load">
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SMT management</title>
        <meta name="description" content="Zarządzanie SMT">
        <link rel="stylesheet" href="../CSS/load.css">
        <link rel="stylesheet" href="../CSS/block_btns.css">
        <link rel="stylesheet" href="../CSS/form.css">
        <script type="text/javascript" src="../js/pages.js"></script>
        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
        <style> 
        
            .error{
                
                color: red;
                
            }
            
    </style>
    </head>    
    <body>
        <center><br/><br/><br/><br/>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <table>
                <caption>Zmiana hasła</caption>
                <tr><td><label>Stare hasło:</label></td><td><input type="password" name="old_password" /></td></tr>
                <tr><td><label>Nowe hasło:</label></td><td><input type="password" name="new_password" /></td></tr>
                <tr><td><label>Powtórz nowe hasło:</label></td><td><input type="password" name="rnew_password" /></td></tr>
                <tr><td></td><td class='error'><?php echo $error_msg; ?></td></tr>
                <tr><td></td><td><input type="submit" name="submit" value="Zmień hasło"/></td></tr>
            </table>
        </form>
        </center>
    </body>
</html>