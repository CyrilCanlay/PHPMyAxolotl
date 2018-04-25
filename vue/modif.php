<h2>
    Modifications des données
</h2>



<div class='row'>
    <div class='col-lg-6'>
        <h3>
            Changements (ajouter & modifier)
        </h3>
    </div>
    <div class='col-lg-6'>
        <h3>
            Conditions (supprimer & modifier)
        </h3>
    </div>
</div>
<div class='row'>
    <?php
    print_selectors()
    ?>
</div>

<button type="submit" class="btn btn-success" value="insert" name="sql_request_type">Ajouter Valeur</button>
<button type="submit" class="btn btn-success" value="delete" name="sql_request_type">Supprimer Valeur</button>
<button type="submit" class="btn btn-success" value="update" name="sql_request_type">Mettre à jour Valeur(s)</button>
