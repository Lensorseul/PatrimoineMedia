
         <!--Product list-->
                <div class="shop">
                    <div class="grid-layout grid-4-columns" data-item="grid-item">
                    <?php
            try {
                $bdd = new PDO('mysql:host=localhost;dbname=patrimoire&media;charset=utf8', 'root', 'root');
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }

// Vérification des identifiants
        $req = $bdd->prepare('SELECT * FROM books');
        $req->execute();


// On affiche chaque entrée une à une
        while ($donnees = $req->fetch()) {
                ?>
                <div class="grid-item">
                    <div class="product">
                        <div class="product-image">
                            <?php echo '<a href="index.php?Page=showbook&id='.$donnees['ISBN10'].'">' ?><?php echo '<img alt="Shop product image!" class="img-responsive img-rounded" alt="" src="images/books/'.$donnees['ISBN10'].'/'.$donnees['ISBN10'].'.'.$donnees['Format'].'">' ?>
                            </a>
                            <?php echo '<a href="index.php?Page=showbook&id='.$donnees['ISBN10'].'">' ?><?php echo '<img alt="Shop product image!" class="img-responsive img-rounded" alt="" src="images/books/'.$donnees['ISBN10'].'/'.$donnees['ISBN10'].'-2.'.$donnees['Format2'].'">' ?>
                            </a>
                        </div>

                        <div class="product-description">
                            <div class="product-category">Auteurs : <?php echo $donnees['Auteurs']; ?></div>
                            <div class="product-title">
                                <h3>Titre : <?php echo $donnees['Titre']; ?></h3>
                            </div>
                            <div class="product-price">Prix : <ins><?php echo $donnees['Prix']; ?> €</ins>
                            </div>
                            <div class="product-rate" style="black">
                                       <p>Collection : <?php echo $donnees['Dateparution']; ?></p>
                                    </div>
                        </div>
                    </div>
                </div>
                <?php
        }

        $req->closeCursor(); // Termine le traitement de la requête
        ?>

            </div>
            <hr>

        </div>

