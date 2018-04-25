<?php

var_dump_beautiful($_SESSION['table']);

if ($_POST['table']) {
    $_SESSION['table'] = $_POST['table'];
}
$CURRENT_TABLE = $_SESSION['table'];
$order_by_sort = $_POST['order_by_sort'];
$column_selected = $_POST['column_selected'];
$sql_request_type = $_POST['sql_request_type'];

//Recuperation et traitement des colones
$COLUMN_RESULT = requete_sql_dans_tableau("select COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='$CURRENT_TABLE'");
for ($index = 0; $index < count($COLUMN_RESULT); $index++) {
    if ($COLUMN_RESULT[$index] == null) {
        unset($COLUMN_RESULT[$index]);
    }
}

// Valeurs d'insertions

$insert_values = array();
global $COLUMN_RESULT;

if ($COLUMN_RESULT != null) {
    foreach ($COLUMN_RESULT as $column_name) {
        if ($column_name != null)
            array_push($insert_values, $_POST[$column_name]);
    }
}

//Valeur de conditions

$insert_values_cond = array();

$COLUMN_RESULT_COND = $COLUMN_RESULT;

if ($COLUMN_RESULT != null) {
    foreach ($COLUMN_RESULT_COND as $column_name) {
        array_push($insert_values_cond, $_POST['cond_' . $column_name]);
    }
}

//Recuperation et traitement des tables
$TABLES_RESULT = requete_sql_dans_tableau('show tables;');
if ($CURRENT_TABLE == null) {
    $CURRENT_TABLE = $TABLES_RESULT[0];
}

//Recuperation et traitement des colones
$COLUMN_RESULT = requete_sql_dans_tableau("select COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='$CURRENT_TABLE'");
for ($index = 0; $index < count($COLUMN_RESULT); $index++) {
    if ($COLUMN_RESULT[$index] == null) {
        unset($COLUMN_RESULT[$index]);
    }
}

$testtest = requete_sql_dans_tableau("SELECT Count(*) FROM INFORMATION_SCHEMA.Columns where TABLE_NAME = '$CURRENT_TABLE'");
$COLUMN_NUMBER = $testtest[0];

//Recuperation et traitement des tuples
if ($order_by_sort != null && $column_selected != null) {
    $TUPLES_RESULT = requete_sql_dans_tableau("select * from $CURRENT_TABLE ORDER BY $column_selected $order_by_sort ");
} else {
    $TUPLES_RESULT = requete_sql_dans_tableau("select * from $CURRENT_TABLE ");
}

//Conservations de valeurs
$_POST = $_SESSION['POSTDATA'];
