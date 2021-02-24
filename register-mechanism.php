<?php

session_start();
include_once("db-connect.php");

$register_validation_complete = true;

$_SESSION['hex'] =      $_POST['hex'];
$_SESSION['login'] =    $_POST['login'];
$_SESSION['name'] =     $_POST['name'];
$_SESSION['surname'] =  $_POST['surname'];

/* SPRAWDZENIE CZY ZOSTAŁ WYSŁANY PUSTY FORMULARZ */
if(!isset($_POST['hex']) || !isset($_POST['login']) || !isset($_POST['password1']) || !isset($_POST['password2']) || !isset($_POST['name']) || !isset($_POST['surname']))
{
    header("Location: register.php");
    exit();
}

/* Anti SQL Injection */

$hex =          $_POST['hex'];
$login =        $_POST['login'];
$password1 =    $_POST['password1'];
$password2 =    $_POST['password2'];
$name =         $_POST['name'];
$surname =      $_POST['surname'];

$hex =          htmlentities($hex, ENT_QUOTES, "UTF-8");
$login =        htmlentities($login, ENT_QUOTES, "UTF-8");
$password1 =    htmlentities($password1, ENT_QUOTES, "UTF-8");
$password2 =    htmlentities($password2, ENT_QUOTES, "UTF-8");
$name =         htmlentities($name, ENT_QUOTES, "UTF-8");
$surname =      htmlentities($surname, ENT_QUOTES, "UTF-8");

$hex =           $conn->real_escape_string($hex);
$login =         $conn->real_escape_string($login);
$password1 =     $conn->real_escape_string($password1);
$password2 =     $conn->real_escape_string($password2);
$name =          $conn->real_escape_string($name);
$surname =       $conn->real_escape_string($surname);


function string_valid_condition($string)
{
    $string_valid_condition = true;
    if(ctype_space($string))
    {
        $string_valid_condition = false;
    }
    if(!preg_match('/[^a-z_\-0-9]/i', $string))
    {
        $string_valid_condition = false;
    }

    return $string_valid_condition;
}


/* REGISTER VALIDATION */

/* ------- HEX ------- */
//SPRAWDZENIE CZY HEX GRACZA ZNAJDUJE SIE W BAZIE DANYCH SERWERA
$sql_if_hex_exists = 'SELECT identifier FROM users WHERE identifier = "'.$hex.'"';
$result_hex = $conn->query($sql_if_hex_exists);

if($result_hex->num_rows==0)
{
    $register_validation_complete = false;
    $_SESSION['invalid_hex'] = "Podany hex nie istnieje w bazie danych serwera.";
}

//SPRAWDZENIE CZY GRACZ Z PODANYM HEX'em ZNAJDUJE SIE JUZ W BAZIE DANYCH SERWERA
$sql_if_user_with_this_hex_exists = 'SELECT hex FROM sklep_narko WHERE hex = "'.$hex.'"';
$result_user_with_hex = $conn->query($sql_if_user_with_this_hex_exists);

if($result_user_with_hex->num_rows>0)
{
    $register_validation_complete = false;
    $_SESSION['invalid_hex'] = "Użytkownik z podanym hex'em został już zarejestrowany wcześniej.";
}


/* ------- LOGIN ------- */
/* SPRAWDZENIE CZY PODANY LOGIN ISTNIEJE JUZ W BAZIE DANYCH STRONY */
$sql_if_login_already_exists = 'SELECT login FROM sklep_narko WHERE login = "'.$login.'"';
$result_login = $conn->query($sql_if_login_already_exists);

if($result_login->num_rows>0)
{
    $register_validation_complete = false;
    $_SESSION['invalid_login'] = "Podany login został już zajęty przez innego użytkownika.";
}
if(strlen($login)>20)
{
    $register_validation_complete = false;
    $_SESSION['invalid_login'] = "Podany login był za długi.";
}
if(strlen($login)<3)
{
    $register_validation_complete = false;
    $_SESSION['invalid_login'] = "Podany login był za krótki.";
}
if(string_valid_condition($login))
{
    $register_validation_complete = false;
    $_SESSION['invalid_login'] = "Login zawierał niedozwolone znaki.";
}

/* PASSWORD */
if(strlen($password1)>30)
{
    $register_validation_complete = false;
    $_SESSION['invalid_password'] = "Hasło było za długie.";
}
if(strlen($password1)<4)
{
    $register_validation_complete = false;
    $_SESSION['invalid_password'] = "Hasło było za krótkie.";
}
if(ctype_space($password1))
{
    $register_validation_complete = false;
    $_SESSION['invalid_password'] = "Hasło zawierało niedozwolone znaki.";
}
if($password1!=$password2)
{
    $register_validation_complete = false;
    $_SESSION['invalid_password'] = "Hasła nie zgadzały się w obu polach.";
}

/* NAME */
if(strlen($name)>30)
{
    $register_validation_complete = false;
    $_SESSION['invalid_name'] = "Podane imię było za długie.";
}
if(strlen($name)<2)
{
    $register_validation_complete = false;
    $_SESSION['invalid_name'] = "Podane imię było za krótkię.";
}
if(string_valid_condition($name))
{
    $register_validation_complete = false;
    $_SESSION['invalid_name'] = "Podane imię zawierało niedozwolone.";
}

/* SURNAME */
if(strlen($surname)>30)
{
    $register_validation_complete = false;
    $_SESSION['invalid_surname'] = "Podane nazwisko było za długie.";
}
if(strlen($surname)<2)
{
    $register_validation_complete = false;
    $_SESSION['invalid_surname'] = "Podane nazwisko było za krótkię.";
}
if(string_valid_condition($surname))
{
    $register_validation_complete = false;
    $_SESSION['invalid_surname'] = "Podane nazwisko zawierało niedozwolone.";
}


/* VALIDATION COMPLETED */

if(!$register_validation_complete)
{
    header("Location: register.php");
    exit();
}

$password_hashed = password_hash($password1, PASSWORD_DEFAULT);

$sql_insert = "INSERT INTO sklep_narko
(hex, login, haslo, imie, nazwisko)
VALUES
('$hex','$login','$password_hashed','$name','$surname')";


if($conn->query($sql_insert)===TRUE)
{
    $_SESSION['user']=$login;
    $_SESSION['registration_complete']=true;

    header("Location: index.php");
}
else
{
    header("Location: error.php");
}
$conn->close();