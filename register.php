<?php
session_start();
include_once("db-connect.php");
if(isset($_SESSION['user']))
{
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <title>Car Dealer</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/jpg" href="../images/car-favicon.jpg"/>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;700&family=Work+Sans:wght@300;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="nav.css">
    <link rel="stylesheet" type="text/css" href="register.css">

</head>
<body>

<div id="container">

    <!-- NAV -->
    <?php
        include_once("nav.php");
    ?>

    <!-- CONTENT -->

    <div id="content">


        <div id="header-name-div">
            Rejestracja
        </div>

        <!-- Początek formularza -->
        <div id="form-div">
            <form method="POST" action="register-mechanism.php">

                <div id="left-side-form-div">

                    <div style="padding-top:25px;">
                        <label for="hex">Hex gracza:</label><br>
                    </div>

                        <label class="padding-between" for="login">Login:</label><br>

                        <label for="password1">Hasło:</label><br>

                        <label for="password2">Powtórz hasło:</label><br>

                        <label for="name">Imię:</label><br>

                        <label for="surname">Nazwisko:</label><br>


                </div>

                <div id="right-side-form-div">

                    <div style="padding-top:25px;">
                        <input type="text" name="hex" placeholder="Podaj hex gracza:" value="<?php
                        if(!isset($_SESSION['invalid_hex'])&&isset($_SESSION['hex']))
                        {
                            echo $_SESSION['hex'];
                            unset($_SESSION['hex']);
                        }
                        ?>"><br>
                    </div>
                    <?php
                        if(isset($_SESSION['invalid_hex']))
                        {
                            echo'
                                    <div class="register-error">
                                        '.$_SESSION['invalid_hex'].'
                                    </div>
                                ';
                        }
                        unset($_SESSION['invalid_hex']);
                    ?>

                    <input type="text" name="login" placeholder="Podaj login:" value="<?php
                        if(!isset($_SESSION['invalid_login'])&&isset($_SESSION['login']))
                        {
                            echo $_SESSION['login'];
                            unset($_SESSION['login']);
                        }
                        ?>"><br>
                    <?php
                        if(isset($_SESSION['invalid_login']))
                        {
                            echo'
                                    <div class="register-error">
                                        '.$_SESSION['invalid_login'].'
                                    </div>
                                ';
                        }
                        unset($_SESSION['invalid_login']);
                    ?>

                    <input type="text" name="password1" placeholder="Podaj hasło:"><br>
                    <?php
                        if(isset($_SESSION['invalid_password']))
                        {
                            echo'
                                    <div class="register-error">
                                        '.$_SESSION['invalid_password'].'
                                    </div>
                                ';
                        }
                        unset($_SESSION['invalid_password']);
                    ?>

                    <input type="text" name="password2" placeholder="Powtórz hasło:"><br>

                    <input type="text" name="name" placeholder="Podaj imię:" value="<?php
                        if(!isset($_SESSION['invalid_name'])&&isset($_SESSION['name']))
                        {
                            echo $_SESSION['name'];
                            unset($_SESSION['name']);
                        }
                        ?>"><br>
                    <?php
                        if(isset($_SESSION['invalid_name']))
                        {
                            echo'
                                    <div class="register-error">
                                        '.$_SESSION['invalid_name'].'
                                    </div>
                                ';
                        }
                        unset($_SESSION['invalid_name']);
                    ?>

                    <input type="text" name="surname" placeholder="Podaj nazwisko:" value="<?php
                        if(!isset($_SESSION['invalid_surname'])&&isset($_SESSION['surname']))
                        {
                            echo $_SESSION['surname'];
                            unset($_SESSION['surname']);
                        }
                        ?>"><br>
                    <?php
                        if(isset($_SESSION['invalid_surname']))
                        {
                            echo'
                                    <div class="register-error">
                                        '.$_SESSION['invalid_surname'].'
                                    </div>
                                ';
                        }
                        unset($_SESSION['invalid_surname']);
                    ?>

                    <input id="submit-button" type="submit" value="Zarejestruj się">

                </div>

            </form>
        </div>
            <!-- Koniec formularza -->




    </div>  
    
</div> 

</body>
</html>