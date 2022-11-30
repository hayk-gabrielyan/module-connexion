<!DOCTYPE html>
<html>
<head>
<title>Connexion</title>
<link rel="stylesheet" href="styles/connexion-style.css" />
<link rel="icon" type="image/x-icon" href="img/logo-onglet.svg">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <form action="/action_page.php">
            <h2>Connexion</h2>
            <div class="input-container">
            <i class="fa fa-user icon"></i>
            <input class="input-field" type="text" placeholder="Nom d'utilisateur" name="usrnm">
    </div>
            <div class="input-container">
            <i class="fa fa-key icon"></i>
            <input class="input-field" type="password" placeholder="Mot de passe" name="psw">
    </div>
            <button type="submit" class="button">Se connecter</button>
        </form>
</div>
</section>

</main>

<?php include('footer.php'); ?>

</body>
</html>