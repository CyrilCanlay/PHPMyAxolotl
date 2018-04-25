<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading"><h2><?php echo $COLUMN_NUMBER; ?> Colonnes et tuples de <?php echo $CURRENT_TABLE ?></h2></div>

    <!-- Table -->

    <table class="table table-bordered table-striped table-condensed" >
        <thead>
            <tr>
                <?php print_column(); ?>
            </tr>
        </thead>
        <tbody>
            <?php print_tuples(); ?>
        </tbody>
    </table>


</div>