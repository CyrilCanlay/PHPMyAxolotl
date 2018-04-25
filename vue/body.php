<body>
    <div class="jumbotron">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <h1>PHPMyAxolotl</h1>
                </div>
                <div class="col-lg-4">
                    <img class="img-responsive img-rounded" src="img/Axolotl.gif" alt="This will display an animated GIF" height="50%" />
                </div>
                <div class="col-lg-4">
                    <form method="post" action="index.php">  
                        <div class="form-group">
                            <label for="sql_name">Nom d'utilisateur (écrire 127266_interface pour tester)</label>
                            <input type="text" class="form-control" name="sql_name" id="sql_name" placeholder="Nom d'utilisateur">
                        </div>
                        <div class="form-group">
                            <label for="sql_pass">Mot de passe (écrire 127266_interface pour tester)</label>
                            <input type="password" class="form-control" name="sql_pass" id="sql_pass" placeholder="Mot de passe">
                        </div>
                        <button type="submit" class="btn btn-success">Se connecter / Changer de session</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class = "container-fluid">