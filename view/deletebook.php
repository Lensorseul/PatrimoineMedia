<?php
            try {
                $bdd = new PDO('mysql:host=localhost;dbname=patrimoire&media;charset=utf8', 'root', 'root');
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
        // Vérification des identifiants
        $req = $bdd->prepare('SELECT * FROM books where News="non"');
        $req->execute();
        // On affiche chaque entrée une à une
        ?>
<!-- Page title -->
<section id="page-title" data-parallax-image="images/menu/2.png">
    <div class="container">
        <div class="breadcrumb">
                    <h3><i class="fa fa-arrow-circle-left"></i><a href="#" onclick="history.go(-1);" style="text-decoration:none"> Retour</a></h3>
                </div>
        <div class="page-title">
            <h1>Suppression de livre</h1>
            <span></span>
        </div>
    </div>
</section>
<!-- end: Page title -->


<section>
    <div class="container">
<div class="hr-title hr-long center"><abbr>Formulaire de suppression (la liste n'affiche que les livres qui ne sont pas dans la partie Nouveautés) </abbr> </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <form method="post" action="receptiondeletebook.php" enctype="multipart/form-data" name="supplivre"> 
                <?php
                    if (isset($_GET['action'])) {
                        if ($_GET['action'] == "deletedok") {
                            ?>
                            <div role="alert" class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
                                <strong><i class="fa fa-exclamation-circle"></i> Félicitation !</strong> Le changement est bien pris en compte </div>
                            <?php
                        } elseif ($_GET['action'] == "deletenotok") {
                            ?>
                            <div role="alert" class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
                                <strong><i class="fa fa-exclamation-circle"></i> Attention !</strong> Une erreur est survenu</div>
                            <?php
                            }
                        } 
                            ?>
                    <div class="row">
                        <div class="col-md-12"><div class="form-group">
                                <label class="upper" for="num">Séléctionner le(s) livre(s) à supprimer :</label>
                                    <select multiple name="isbndelete[]">
                                    <?php 
                                    while ($donnees = $req->fetch()) {
                                    ?>
                                      <?php echo '<option value="'.$donnees['ISBN10'].'"">' ?><?php echo $donnees['ISBN10'].' '.$donnees['Titre']; ?></option>
                                      <?php
                                    }
                                    $req->closeCursor();
                                      ?>
                                    </select>
                            </div></div>
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