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

    <link rel="icon" type="image/png" href="images/favicon.png"/>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;700&family=Work+Sans:wght@300;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="nav.css">

</head>
<body>

<div id="container">

    <!-- NAV -->
    <?php
        include_once("nav.php");
    ?>

    <!-- CONTENT -->

    <div id="content">
        
        <?php

        $sql = 'SELECT * FROM Status_narko';
        $result = $conn->query($sql);
        
        while($row = $result->fetch_assoc())
        {
            echo $row['Label'].'----'.$row['status_ziola'].'----'.$row['status_nasion'].'<br>';
        }

        ?>


    </div>
    



</div> 

</body>
</html>