<!DOCTYPE html>
<html>
<head>
<title>Inscription</title>
<link rel="stylesheet" href="styles/user_modification.css" />
<link rel="icon" type="image/x-icon" href="img/logo-onglet.svg">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<?php include('include/header.php'); ?>
<main>
<section>
    <form action="/action_page.php">
    <div class="container">
        <div class="bold register">Modification de vos informations</div>
        <hr>
        <label for="surname" class="bold">Changer le nom</label>
        <input type="text" placeholder="Saisissez le nouveau nom" name="surname" id="surname" required>

        <label for="name" class="bold">Changer le prénom</label>
        <input type="text" placeholder="Saisissez le nouveau prénom" name="name" id="name" required>

        <label for="username" class="bold">Changer le nom d'utilisateur</label>
        <input type="text" placeholder="Saissisez le nouveau nom d'utilisateur" name="email" id="username" required>

        <label for="psw" class="bold">Changer le Mot de passe</label>
        <input type="password" placeholder="Saissisez le nouveau mot de passe" name="psw" id="psw" required>

        <label for="psw-repeat" class="bold">Répétez le nouveau mot de passe</label>
        <input type="password" placeholder="Repetez le nouveau mot de passe" name="psw-repeat" id="psw-repeat" required>
        <hr>

        <button type="submit" class="registerbtn">Enregistrer les modifications</button>
    </div>

</form>
</div>
</section>

</main>

<?php include('include/footer.php'); ?>

</body>
</html>