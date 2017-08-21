<?php
            try {
                $bdd = new PDO('mysql:host=localhost;dbname=Patrimoire&Media;charset=utf8', 'root', 'root');
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
            if(isset($_GET['id'])){
                $id=$_GET['id'];
                // Vérification des identifiants
                $req = $bdd->prepare('SELECT * FROM books inner join collection on books.Idcollection = collection.Id where ISBN10=:isbn10');
                $req->bindParam("isbn10", $id,PDO::PARAM_INT) ;
                $req->execute();
                $donnees = $req->fetch()
            
        
        ?>
<!-- Page title -->
<section id="page-title" data-parallax-image="images/menu/2.png">
    <div class="container">
        <div class="breadcrumb">
                    <h3><i class="fa fa-arrow-circle-left"></i><a href="#" onclick="history.go(-1);" style="text-decoration:none"> Retour</a></h3>
                </div>
        <div class="page-title">
            <h1>Produit</h1>
            <span>Voici le produit que vous venez de chercher</span>
        </div>
    </div>
</section>
<!-- end: Page title -->


        <!-- SHOP PRODUCT PAGE -->
        <section id="product-page" class="product-page p-b-0">
            <div class="container">
                <div class="product">
                    <div class="row m-b-40">
                        <div class="col-md-5">
                            <div class="product-image">
                                <!-- Carousel slider -->
                                <div class="carousel dots-inside dots-dark arrows-visible arrows-only arrows-dark" data-items="1" data-loop="true" data-autoplay="true" data-animate-in="fadeIn" data-animate-out="fadeOut" data-autoplay-timeout="2500" data-lightbox="gallery">

                                    <?php echo '<a href="images/books/'.$donnees['ISBN10'].'/'.$donnees['ISBN10'].'.'.$donnees['Format'].'" data-lightbox="image" title="Shop product image!"><img alt="Shop product image!" class="img-responsive img-rounded" alt="" src="images/books/'.$donnees['ISBN10'].'/'.$donnees['ISBN10'].'.'.$donnees['Format'].'"></a>' ?>
                                    <?php echo '<a href="images/books/'.$donnees['ISBN10'].'/'.$donnees['ISBN10'].'-2.'.$donnees['Format2'].'" data-lightbox="image" title="Shop product image!"><img alt="Shop product image!" class="img-responsive img-rounded" alt="" src="images/books/'.$donnees['ISBN10'].'/'.$donnees['ISBN10'].'-2.'.$donnees['Format2'].'"></a>' ?>
                                    
                                </div>
                                <!-- Carousel slider -->
                            </div>
                        </div>


                        <div class="col-md-7">
                            <div class="product-description">
                                
                                <div class="product-title">
                                    <h3><?php echo $donnees['Titre']; ?></h3>
                                </div>
                                <div class="product-category">Auteurs : <?php echo $donnees['Auteurs']; ?></div>
                                <div class="product-category">Collection : <?php echo $donnees['Nomcollection']; ?></div>
                                <div class="product-price"><ins><?php echo $donnees['Prix']; ?> €</ins>
                                </div>
                                <div class="m-b-10"></div>
                                <br><br><br><br><br><br><br><br><br>
                                <div class="product-meta">
                                </div>
                                <div class="m-t-20 m-b-10"></div>
                                    <button type="button" class="btn btn-light btn-creative btn-icon-holder btn-shadow btn-light-hover">Acheter le livre<i class="fa fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>

                    <div id="tabs-1" class="tabs simple">
                        <ul class="tabs-navigation">
                            <li class="active"><a href="#tab1"><i class="fa fa-align-justify"></i>Description</a> </li>
                            <li><a href="#tab2"><i class="fa fa-info"></i>Additional Info</a> </li>
                        </ul>
                        <div class="tabs-content">
                            <div class="tab-pane active" id="tab1">
                                <p><?php echo $donnees['Description']; ?></a></p>
                            </div>
                            <div class="tab-pane" id="tab2">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>Auteur(s)</td>
                                            <td><?php echo $donnees['Auteurs']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Date de parution</td>
                                            <td><?php echo $donnees['Dateparution']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Photographe(s)</td>
                                            <td><?php echo $donnees['Photographes']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Iconographe(s)</td>
                                            <td><?php echo $donnees['Iconographes']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Format du livre</td>
                                            <td><?php echo $donnees['Formatlivre']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nombre de pages</td>
                                            <td><?php echo $donnees['Nbpage']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Reliure</td>
                                            <td><?php echo $donnees['Reliure']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Prix</td>
                                            <td><?php echo $donnees['Prix']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end: SHOP PRODUCT PAGE -->
        <?php
    }
    ?>