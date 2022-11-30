<!DOCTYPE html>
<html>
<head>
<title>Inscription</title>
<link rel="stylesheet" href="styles/inscription-style.css" />
<link rel="icon" type="image/x-icon" href="img/logo-onglet.svg">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<?php include('header.php'); ?>
<main>
<section>
    <form action="inscription_action.php" method="GET">

        <div class="container">
            <div class="bold register">Inscrivez-vous</div>
            <p>Remplissez toutes les cases</p>
            <hr>
            <div class="name">
                <label for="name" class="bold">Nom</label>
                <input type="text" placeholder="Saissisez votre nom" name="surname" id="surname" required>
                
                <label for="name" class="bold" id="name">Prénom</label>
                <input type="text" placeholder="Saissisez votre prénom" name="name" id="name" required>
            </div>
            <label for="username" class="bold">Nom d'utilisateur</label>
            <input type="text" placeholder="Saissisez un nom d'utilisateur" name="username" id="username" required>

            <label for="password" class="bold">Mot de passe</label>
            <input type="password" placeholder="Mot de passe" name="password" id="password" required>

            <label for="password-repeat" class="bold">Répétez le mot de passe</label>
            <input type="password" placeholder="Confirmez le mot de passe" name="password-repeat" id="password-repeat" required>
            <hr>
            <p id="policy">En vous inscrivant, vous acceptez nos <a href="#">Conditions Générales d’Utilisation</a>.</p>

            <button type="submit" class="registerbtn">S'inscrire</button>
        </div>
    
        <div class="container signin">
            <p>Avez-vous déjà un compte? <a href="connexion.php">Connexion</a></p>
        </div>

    </form>
</div>
</section>

</main>

<?php include('footer.php'); ?>

</body>
</html>
