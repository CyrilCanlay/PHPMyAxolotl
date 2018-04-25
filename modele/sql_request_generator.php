<?php

if ($sql_request_type == 'insert') {
    SQL_insert();
    inteligent_refresh();
}
if ($sql_request_type == 'delete') {
    SQL_delete();
    inteligent_refresh();
}
if ($sql_request_type == 'update') {
    SQL_update();
    inteligent_refresh();
}

function SQL_insert() {
    global $bdd;
    global $CURRENT_TABLE;
    global $COLUMN_RESULT;
    global $insert_values;
    $COLUMN_RESULT_FORMATED = array_to_sql_list($COLUMN_RESULT);
    $COLUMN_RESULT_DOTTED = array_to_sql_values_dotdot($COLUMN_RESULT);

    $values_request = array();


    for ($index = 0; $index < count($insert_values); $index++) {
        $values_request[$COLUMN_RESULT[$index * 2]] = $insert_values[$index];
    }

//    debug_table($values_request);
    echo '<br/>';

    $req = $bdd->prepare("INSERT INTO $CURRENT_TABLE($COLUMN_RESULT_FORMATED) VALUES($COLUMN_RESULT_DOTTED)");
    $req->execute($values_request);
}

function SQL_delete() {
    global $bdd;
    global $CURRENT_TABLE;
    global $COLUMN_RESULT_COND;
    global $insert_values_cond;

    $values_request_cond = array();

    for ($index = 0; $index < count($insert_values_cond); $index++) {
        $values_request_cond['cond_' . $COLUMN_RESULT_COND[$index * 2]] = $insert_values_cond[$index];
    }

    $values_request_cond = clean_array($values_request_cond);

    $double_dot_request_cond = array_to_sql_all_cond($COLUMN_RESULT_COND);

    $req = $bdd->prepare("DELETE FROM $CURRENT_TABLE WHERE $double_dot_request_cond");
    $req->execute($values_request_cond);
}

function SQL_update() {
    global $bdd;
    global $CURRENT_TABLE;

    global $COLUMN_RESULT;
    global $insert_values;

    global $COLUMN_RESULT_COND;
    global $insert_values_cond;


    //Preparation des valeurs
    $values_request = array();
    for ($index = 0; $index < count($insert_values); $index++) {
        $values_request[$COLUMN_RESULT[$index * 2]] = $insert_values[$index];
    }

    //Preparation des valeurs de cond
    $values_request_cond = array();
    for ($index = 0; $index < count($insert_values_cond); $index++) {
        $values_request_cond['cond_' . $COLUMN_RESULT_COND[$index * 2]] = $insert_values_cond[$index];
    }

    $double_dot_request = array_to_sql_all_prep($COLUMN_RESULT_COND);
    $double_dot_request_cond = array_to_sql_all_cond($COLUMN_RESULT_COND);

    $values_request_norm_cond = array_merge($values_request, $values_request_cond);
    $values_request_norm_cond = clean_array($values_request_norm_cond);

    $req = $bdd->prepare("UPDATE $CURRENT_TABLE SET $double_dot_request WHERE $double_dot_request_cond");
    $req->execute($values_request_norm_cond);
}
