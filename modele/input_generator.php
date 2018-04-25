<?php

function print_tables() {
    global $TABLES_RESULT;
    foreach ($TABLES_RESULT as $table_name) {
        if ($table_name != null) {
            echo "<input class='btn btn-primary' type='submit' name='table' value=$table_name> </input>";
        }
    }
}

function print_column() {
    global $COLUMN_RESULT;
    foreach ($COLUMN_RESULT as $column_name) {
        if ($column_name != null) {
            echo "
            <th>
            <label class='btn btn-info btn-sm'>
                <input type='radio' autocomplete='off' name='column_selected' value=$column_name> $column_name
            </label>
            </th>
            ";
        }
    }
    echo '<br/>';
}

function print_tuples() {
    global $TUPLES_RESULT;
    global $COLUMN_NUMBER;
    $next_line = 0;
    echo '<tr>';
    foreach ($TUPLES_RESULT as $tuples_name) {

        if ($tuples_name != null) {
            echo "
            <td>
            <label class='btn btn-secondary btn-sm'>
                $tuples_name
            </label>
            </td>
            ";
            $next_line = $next_line + 1;
        }
        if ($next_line >= $COLUMN_NUMBER) {

            echo '</tr>';
            echo '<tr>';
            $next_line = 0;
        }
    }
}

function print_inputs() {
    global $COLUMN_RESULT;
    echo '<br/>';
    foreach ($COLUMN_RESULT as $column_input) {
        if ($column_input != null) {
            echo "
                    <input type='text' class='form-control form-group' name=$column_input placeholder=$column_input>
            ";
        }
    }
}

function print_selectors() {
    global $COLUMN_RESULT;


//    echo "<div class='col-lg-3'>";
//    foreach ($COLUMN_RESULT as $column_input) {
//        if ($column_input != null) {
//            echo "<select class='form-control'>";
//            echo "<option></option>";
//            echo "<option>$column_input</option>";
//            echo "<select class='form-control'>";
//        }
//    }
//    echo "</div>";

    echo "<div class='col-lg-6'>";
    foreach ($COLUMN_RESULT as $column_input) {
        if ($column_input != null) {
            echo "
                    <input type='text' class='form-control form-group' name=$column_input placeholder=$column_input>
            ";
        }
    }
    echo "</div>";

//    echo "<div class='col-lg-3'>";
//    foreach ($COLUMN_RESULT as $column_input) {
//        if ($column_input != null) {
//            echo "<select class='form-control'>";
//            echo "<option></option>";
//            echo "<option>$column_input</option>";
//            echo "<select class='form-control'>";
//        }
//    }
//    echo "</div>";

    echo "<div class='col-lg-6'>";
    foreach ($COLUMN_RESULT as $column_input) {
        if ($column_input != null) {
            echo "
                    <input type='text' class='form-control form-group' name=cond_$column_input placeholder=$column_input>
            ";
        }
    }
    echo "</div>";
}
