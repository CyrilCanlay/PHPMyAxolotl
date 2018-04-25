<?php

session_start();

if ($_POST['sql_name'] != null)
    $_SESSION['sql_name'] = $_POST['sql_name'];
if ($_POST['sql_pass'] != null)
    $_SESSION['sql_pass'] = $_POST['sql_pass'];
if ($_POST['table'] != null)
    $_SESSION['table'] = $_POST['table'];

//Parametres de connection
$HOST = 'mysql-cyril-canlay.alwaysdata.net';
$DBNAME = 'cyril-canlay_interface_admin';
$USER = $_SESSION['sql_name'];
$PASSWORD = $_SESSION['sql_pass'];

include 'vue/head.php';
include 'vue/body.php';

//Connection a la base de données
try {
    $bdd = new PDO('mysql:host=' . $HOST . ';dbname=' . $DBNAME . ';charset=utf8', '' . $USER . '', '' . $PASSWORD . '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
