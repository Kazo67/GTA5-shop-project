<?php
session_start();
include_once("db-connect.php");
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
    <link rel="stylesheet" type="text/css" href="log-in.css">

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
            Logowanie
        </div>

        <!-- POCZĄTEK FORMULARZA -->
        <form method="POST" action="log-in-mechanism.php">
            <div id="form-div">

                <div id="left-side-form-div">

                    <div style="padding-top:25px;">
                        <label for="login">Login:</label><br>
                        <label for="password">Hasło:</label><br>
                    </div>

                </div>


                <div id="right-side-form-div">

                    <div style="padding-top:25px;">

                        <input type="text" name="login" placeholder="Podaj login:" value="<?php
                        if(isset($_SESSION['invalid_logs']))
                        {
                            echo $_SESSION['log'];
                            unset($_SESSION['log']);
                        }
                        ?>"><br>

                        <input type="text" name="password" placeholder="Podaj hasło:"><br>
                        <?php
                            if(isset($_SESSION['invalid_logs']))
                            {
                                echo'
                                        <div class="login-error">
                                            '.$_SESSION['invalid_logs'].'
                                        </div>
                                    ';
                            }
                            unset($_SESSION['invalid_logs']);
                        ?>


                        <input type="submit" id="submit-button" value="Zaloguj">

                    </div>

                </div>

            </div>

        </form>
        <!-- KONIEC FORMULARZA -->



    </div>  
    



</div> 

</body>
</html>