
<div id="nav">

    <div id="higher-div-nav">

        <div id="div-car-image">

            <div id="car-image">

                <a id="my-cars-title" href="my-cars.php">
                    <img style="width: 70px; height: 70px;" src="images/shopping-cart.png">
                </a>

            </div>

            <div id="title-under-car-image">
            
                <a id="my-cars-title" href="my-cars.php">Koszyk</a>
            
            </div>
            
        </div>

        <div id="div-shop-name">
            <div id="alert">Wszystko na tej stronie jest fikcją stworzną tylko i wyłącznie na potrzeby gry GTA 5!</div>
            <span id="main-title">
                <a href="index.php" style="text-decoration:none; background-color: none; color:green;">
                    Drug Dealer
                </a>
            </span>
        </div>

        <div id="div-isset-user">
            
            <?php

            //Jeżeli użytkownik jest zalogowany jako user
            if(isset($_SESSION['user']))
            {
                echo'
                        <div id="logged-as-div">
                            <span style="font-size: 21px;">Zalogowany jako:<span> <b>'.$_SESSION['user'].'</b>
                        </div>

                        <div id="log-out-button-div">
                            <a id="log-out-button" href="logout.php">Wyloguj</a>
                        </div>
                    ';
            }
            
            //Jeżeli NIE jesteśmy zalogowani ani jakos user ani jako admin
            if(!isset($_SESSION['user']) && !isset($_SESSION['admin']))
            {
                echo'
                        <div id="register-button-div">
                            <a href="register.php" class="button">
                                Zarejestruj się!
                            </a>
                        </div>

                        <div id="log-in-button-div">
                            <a href="log-in.php" class="button">
                                Zaloguj się!
                            </a>
                        </div>
                    ';
            }


            ?>

        </div>

    </div>

    <?php

    //Jeżeli NIE jesteśmy zalogowani ani jakos user ani jako admin
    if(!isset($_SESSION['user']) && !isset($_SESSION['admin']))
    {
        echo'
                <div id="lower-div-nav-buttons">

                    <div class="button-nav-div">
                        <a class="button-nav" href="marijuana.php">Marihuana</a>
                    </div>

                    <div class="button-nav-div">
                        <a class="button-nav" href="#">Kokaina</a>
                    </div>

                    <div class="button-nav-div">
                        <a class="button-nav" href="#">Metamfetamina</a>
                    </div>

                    <div class="button-nav-div">
                        <span id="not-logged-in">Niezalogowany</span>
                    </div>

                </div>
            ';
    }
    

    ?>

</div>