<?php

function inteligent_refresh() {
    header("Refresh:0");
}

function debug_table($array) {
    echo '<table>';

    foreach ($array as $key => $value) {
        echo "<tr>";
        echo "<td>";
        echo $key . ' : ';
        echo "</td>";
        echo "<td>";
        echo $value;
        echo "</td>";
        echo "</tr>";
    }

    echo '</table>';
}

function requete_sql_dans_tableau($requete_sql) {
    global $bdd;
    $reponse = $bdd->query($requete_sql);
    while ($donnees = $reponse->fetch()) {
        for ($index = 0; $index < count($donnees); $index++) {
            $tableau_final[] = $donnees[$index];
        }
    }
    $reponse->closeCursor();
    return $tableau_final;
}

function array_to_sql_list($phparray) {
    $phparray;
    $sql_list;
    for ($index = 0; $index <= count($phparray) + 1; $index++) {
        $sql_list = $sql_list . $phparray[$index];
        if ($phparray[$index + 1] != null) {
            $sql_list = $sql_list . ', ';
        }
    }
    return $sql_list;
}

function array_to_sql_values_list($phparray) {
    $phparray;
    $sql_list;
    for ($index = 0; $index <= count($phparray) + 1; $index++) {
        $sql_list = $sql_list . $phparray[$index];
        if ($phparray[$index + 1] != null) {
            $sql_list = $sql_list . ', ';
        }
    }
    return $sql_list;
}

function array_to_sql_values_dotdot($phparray) {
    $sql_list = '';
    for ($index = 0; $index <= count($phparray) + 1; $index++) {
        if ($phparray[$index] != null) {
            $sql_list .= ':' . $phparray[$index] . ', ';
        }
    }
    $sql_list = substr_replace($sql_list, "", -2);
    return $sql_list;
}

function clean_array($myArray) {
    $myArray = array_filter($myArray);
    return(array_slice($myArray, 0));
}

function array_to_sql_all_prep($column_names) {
    global $insert_values;
    $column_names = clean_array($column_names);

    for ($index = 0; $index <= count($column_names); $index++) {
        if ($insert_values[$index] != null) {
            $sql_list .= $column_names[$index] . '=' . ':' . $column_names[$index] . ' AND ';
        }
    }
    $sql_list = substr_replace($sql_list, "", -4);
    return $sql_list;
}

function array_to_sql_all_cond($column_names) {
    global $insert_values_cond;
    $column_names = clean_array($column_names);

    for ($index = 0; $index <= count($column_names); $index++) {
        if ($insert_values_cond[$index] != null) {
            $sql_list .= $column_names[$index] . '=' . ':cond_' . $column_names[$index] . ' AND ';
        }
    }
    $sql_list = substr_replace($sql_list, "", -4);
    return $sql_list;
}

function print_var_name($var) {
    foreach ($GLOBALS as $var_name => $value) {
        if ($value === $var) {
            return $var_name;
        }
    }

    return false;
}

function var_dump_beautiful($debug_value) {
    if ($debug_mod) {
        echo('<br/>');
        echo(print_var_name($debug_value) . ' => ');
        var_dump($debug_value);
        echo('<br/>');
    }
}

//debug_table($_POST);
