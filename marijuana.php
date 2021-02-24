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
    <link rel="stylesheet" type="text/css" href="marijuana.css">

</head>
<body>

<div id="container">

    <!-- NAV -->
    <?php
        include_once("nav.php");
    ?>

    <!-- CONTENT -->

    <div id="content">


        <div class="product">
            <img src="images/marijuana/marijuana1.png" style="width:150px; height: 150px;">
            <div>
                           
            </div>
        </div>



    </div>  
    

</div> 

</body>
</html>