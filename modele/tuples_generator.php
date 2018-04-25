<?php

//Recuperation et traitement des tuples
if ($order_by_sort != null && $column_selected != null) {
    print_r('1');
    $TUPLES_RESULT = requete_sql_dans_tableau("select * from $CURRENT_TABLE ORDER BY $column_selected $order_by_sort ");
} else {
    print_r('2');
    $TUPLES_RESULT = requete_sql_dans_tableau("select * from $CURRENT_TABLE ");
}