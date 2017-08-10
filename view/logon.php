<!-- Page title -->
<section id="page-title" data-parallax-image="images/menu/2.png">
    <div class="container">
        <div class="page-title">
            <h1>Connexion</h1>
            <span>Page de connexion pour l'administration du site</span>
        </div>
    </div>
</section>

<section>
    <div class="hr-title hr-long center"><abbr>Connexion</abbr> </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form action="index.php?Page=admin" method="post" name="login">
			<?php
                if (isset($_POST['login']) && !isset($_SESSION['admin'])) {
                    ?>
                <div role="alert" class="alert alert-warning alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
				<strong><i class="fa fa-exclamation-circle"></i> Attention !</strong> Le nom d'utilisateur et/ou le mot de passe est incorrect </div>
                    <?php
                }
                ?>
                <div class="form-group">
                    <label class="sr-only">Nom d'utilisateur</label>
                    <input type="text" class="form-control" placeholder="Nom d'utilisateur" name="username">
                </div>
                <div class="form-group">
                    <label class="sr-only">Mot de passe</label>
                    <input type="password" class="form-control" placeholder="Mot de passe" name="mdp">
                </div>

                <div class="form-inline form-group">
                    <button class="btn btn-default" name="login" type="submit">Login</button>

                </div>
            </form>
        </div>
    </div>
</section>