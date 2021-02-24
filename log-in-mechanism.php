<?php

session_start(); 
if(isset($_SESSION['user']))
{
    header("Location: index.php");
    exit();
}

include_once("db-connect.php");

$_SESSION['log'] = $_POST['login'];

if(!isset($_POST['login']) || !isset($_POST['password']))
{
    header("Location: log-in.php");
    exit();
}


$login =    $_POST['login'];
$password = $_POST['password'];

//Anti SQL Injection
$login = htmlentities($login, ENT_QUOTES, "UTF-8");
$password = htmlentities($password, ENT_QUOTES, "UTF-8");

$login = $conn->real_escape_string($login);
$password = $conn->real_escape_string($password);




$sql = 'SELECT haslo FROM sklep_narko WHERE login = "'.$login.'"';
$result = $conn->query($sql);

if($result->num_rows>0)
{
    while($row = $result->fetch_assoc())
    {
        if(password_verify($password,$row['haslo']))
        {
            $_SESSION['user']=$login;
        }
    }
}

$conn->close();
if(isset($_SESSION['user']))
{
    header("Location: index.php");
    exit();
}
else
{
    $_SESSION['invalid_logs']="Podano błędny login lub hasło.";
    header("Location: log-in.php");
}
