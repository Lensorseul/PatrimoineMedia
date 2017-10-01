<!-- Page title -->
<section id="page-title" data-parallax-image="images/menu/2.png">
    <div class="container">
        <div class="breadcrumb">
                    <h3><i class="fa fa-arrow-circle-left"></i><a href="#" onclick="history.go(-1);" style="text-decoration:none"> Retour</a></h3>
                </div>
        <div class="page-title">
            <h1>Créer une collection</h1>
            <span>Page permettant la création d'une collection qui pourra servir dans la gestion des livres</span>
        </div>
    </div>
</section>
<!-- end: Page title -->


<section>
    <div class="container">
        <div class="hr-title hr-long center"><abbr>Formulaire de création d'une collection</abbr> </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <form method="post" action="receptioncollection.php" enctype="multipart/form-data" name="receptioncollection">
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
                                <label class="upper" for="company">Nom de la collection (200 caractères max) :</label>
                                <input type="text" class="form-control required" name="nomcol" placeholder="Nom de la collection" id="nomcol" aria-required="true">
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