<!-- Page title -->
<section id="page-title" data-parallax-image="images/menu/2.png">
    <div class="container">
        <div class="page-title">
            <h1>Nouveautés</h1>
            <span>Voici les nouveaux livres</span>
        </div>
    </div>
</section>
<!-- end: Page title -->


<section>
    <div class="container">

        <div class="hr-title hr-long center"><abbr>Default Form</abbr> </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <form method="post" action="reception.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12"><div class="form-group">
                                <label class="upper" for="num">Numéro de l'image a changer :</label>
                                <select>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="upper" for="company">Titre de l'actualité (200 caractères max):</label>
                                <input type="text" class="form-control required" name="namelivre" placeholder="Nom du livre" id="namelivre" aria-required="true">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="upper" for="icone">Image pour l'actualité :</label>
                                <input type="file" class="form-control required" name="icone" id="icone" aria-required="true"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="upper" for="titre">Description du fichier (2500 caractères max) :</label>
                                <textarea class="form-control required" name="description" rows="9" placeholder="Entrer la description" id="comment" aria-required="true"></textarea>

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




        <?php
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=Patrimoire&Media;charset=utf8', 'root', 'root');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

// Vérification des identifiants
        $req = $bdd->prepare('SELECT * FROM News');
        $req->execute();


// On affiche chaque entrée une à une
        while ($donnees = $req->fetch()) {
            if ($donnees['Id'] == 2) {
                ?>
                <section class="p-b-0">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7 text-right">
                                <hr class="space">
                                <hr class="space">
                                <hr class="space">
                                <h1 class="heading-jumbo"><?php echo $donnees['Titre']; ?></h1>
                                <p class="lead"><?php echo $donnees['Description']; ?></p>
                                <a class="btn" href="#" ><span><i class="fa fa-tint"></i>Learn more</span></a> </div>
                            <div class="col-md-5"> <img alt="" src="images/other/polo-iphone6-v3.png"> </div>
                        </div>
                    </div>
                </section>
            <?php } else { ?>
                <section class="p-b-0">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5"> <img alt="" src="images/other/5.jpg"> </div>
                            <div class="col-md-7">
                                <hr class="space">
                                <hr class="space">
                                <hr class="space">
                                <h1 class="heading-jumbo"><?php echo $donnees['Titre']; ?></h1>
                                <p class="lead"><?php echo $donnees['Description']; ?></p>
                                <a class="btn" href="#" ><span><i class="fa fa-tint"></i>Learn more</span></a>
                            </div>
                        </div>
                    </div>
                </section>
            <?php }
            ?>

            <?php
        }

        $req->closeCursor(); // Termine le traitement de la requête
        ?>


        
    </div>
</section>
<!-- end: Content -->
