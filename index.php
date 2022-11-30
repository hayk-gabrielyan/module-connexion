<!DOCTYPE html>
<html>
<head>
<title>Accueil</title>
<link rel="stylesheet" href="styles/style.css" />
<link rel="icon" type="image/x-icon" href="img/logo-onglet.svg">
</head>
<body>

<?php include('header.php'); ?>
<main>
<section>
    <div class="left_block">
        <div class="Bienvenue">Binevenue</div>
            <div class="chez">
                <div >chez</div>
                <img src="img/logo_black_letters.svg" class="accueil-logo">
            </div>
            <p>Conseil et expertise en Système d'information</p>
    </div>
    <div class="right_block">
        <div>Connectez-vous à votre compte</div>
        <a href="connexion.php"><button class="button green">Se connecter</button></a>
        <div>Pas encore inscrit?</div>
        <a href="inscription.php"><button class="button orange">S'inscrire</button></a>
    </div>
</section>

</main>

<?php include('footer.php'); ?>
</body>
</html>