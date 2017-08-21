<?php
            try {
                $bdd = new PDO('mysql:host=localhost;dbname=Patrimoire&Media;charset=utf8', 'root', 'root');
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
        // Vérification des identifiants
        $req = $bdd->prepare('SELECT * FROM collection');
        $req->execute();
        // On affiche chaque entrée une à une
        ?>
<!-- Page title -->
<section id="page-title" data-parallax-image="images/menu/2.png">
    <div class="container">
        <div class="page-title">
                    <h1>Créer un livre</h1>
        </div>
    </div>
</section>
<!-- end: Page title -->


<section>
    <div class="container">
        <div class="hr-title hr-long center"><abbr>Formulaire de création d'un livre</abbr> </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <form method="post" action="receptioncreatebook.php" enctype="multipart/form-data" name="receptioncreatebook">
                    <?php
                    if (isset($_GET['action'])) {
                        if ($_GET['action'] == "uploadok") {
                            ?>
                            <div role="alert" class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
                                <strong><i class="fa fa-exclamation-circle"></i> Félicitation !</strong> Le changement est bien pris en compte </div>
                            <?php
                        } elseif ($_GET['action'] == "uploadnotok") {
                            ?>
                            <div role="alert" class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
                                <strong><i class="fa fa-exclamation-circle"></i> Attention !</strong> Une erreur est survenu</div>
                            <?php
                        } elseif ($_GET['action'] == "filetoolarge") {
                            ?>
                            <div role="alert" class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
                                <strong><i class="fa fa-exclamation-circle"></i> Attention !</strong> Le changement n'est pas pris en compte, la taille de l'image est trop grande </div>
                            <?php
                        } elseif ($_GET['action'] == 'fileformat') {
                            ?>
                            <div role="alert" class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
                                <strong><i class="fa fa-exclamation-circle"></i> Attention !</strong> Le changement n'est pas pris en compte,veuillez vérifier le format </div>
                            <?php
                        } elseif ($_GET['action'] == 'fileisnotimage') {
                            ?>
                            <div role="alert" class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
                                <strong><i class="fa fa-exclamation-circle"></i> Attention !</strong> Le changement n'est pas pris en compte,veuillez vérifier le format </div>
                            <?php
                        }
                    }
                    ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="upper" for="company">Identifiant ISBN-10 du livre :</label>
                                <input type="text" class="form-control required" name="isbn10" placeholder="Identifiant ISBN-10" id="isbn10" aria-required="true">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="upper" for="company">Nom du livre (200 caractères max) :</label>
                                <input type="text" class="form-control required" name="namelivre" placeholder="Nom du livre" id="namelivre" aria-required="true">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                            <label class="upper" for="company">Collection du livre :</label>
                                <select name="collections">
                                    <?php 
                                    while ($donnees = $req->fetch()) {
                                    ?>
                                      <?php echo '<option value="'.$donnees['Id'].'"">' ?><?php echo $donnees['Nomcollection'] ?></option>
                                      <?php
                                    }
                                    $req->closeCursor();
                                      ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="upper" for="company">Description du livre (2000 caractères max) :</label>
                                <input type="text" class="form-control required" name="description" placeholder="Description" id="description" aria-required="true">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="upper" for="company">Date de parution :</label>
                                <input type="text" class="form-control required" name="dateparution" placeholder="Date de parution" id="dateparution" aria-required="true">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="upper" for="company">Auteur(s) :</label>
                                <input type="text" class="form-control required" name="auteurs" placeholder="Auteur(s)" id="auteurs" aria-required="true">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="upper" for="company">Photographe(s) :</label>
                                <input type="text" class="form-control required" name="photographes" placeholder="Photographe(s)" id="photographes" aria-required="true">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="upper" for="company">Iconographe(s) :</label>
                                <input type="text" class="form-control required" name="iconographes" placeholder="Iconographe(s)" id="iconographes" aria-required="true">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="upper" for="company">Format :</label>
                                <input type="text" class="form-control required" name="formatlivre" placeholder="Format" id="formatlivre" aria-required="true">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="upper" for="company">Nombre de pages :</label>
                                <input type="text" class="form-control required" name="nbpage" placeholder="Nombre de pages" id="nbpage" aria-required="true">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="upper" for="company">Reliure :</label>
                                <input type="text" class="form-control required" name="reliure" placeholder="Reliure" id="reliure" aria-required="true">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="upper" for="company">Diffuseur librairies :</label>
                                <input type="text" class="form-control required" name="diffuseurlibrairies" placeholder="Diffuseur librairies" id="diffuseurlibrairies" aria-required="true">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="upper" for="company">Prix du livre (10 caractères max) :</label>
                                <input type="text" class="form-control required" name="prix" maxlength="10" placeholder="Prix du livre" id="prix" aria-required="true">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="upper" for="icone">Image du livre (format JPG, JPEG, PNG et GIF) :</label>
                                <input type="file" class="form-control required" name="icone" id="icone" aria-required="true"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="upper" for="icone">Extrait du livre (format JPG, JPEG, PNG et GIF) :</label>
                                <input type="file" class="form-control required" name="icone2" id="icone2" aria-required="true"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group text-center">
                                <button class="btn btn-default" type="submit"><i class="fa fa-paper-plane"></i>&nbsp;Envoyer</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>