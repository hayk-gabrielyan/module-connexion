<?php session_start();?>

<?php
    // rappel des variable contenant les informations de l'utilisateur
    $login = $_SESSION['login'];
    $password = $_SESSION['password'];
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Page d'Utilisateur</title>
<link rel="stylesheet" href="styles/user.css" />
<link rel="icon" type="image/x-icon" href="img/logo-onglet.svg">
</head>
<body>

<!-- header des pages -->
<?php include('include/header.php'); ?>

<main>
    <section>
            <div>Bienvenue
                <?php 
                    echo "<span id='user'>$login</span>";
                ?> 
            </div>
            <p>Pour modifier les informations de profil<br> appuyez ici.</p>
            <a href="profil.php"><button class="button orange">Modifier mes informations de profil.</button></a>
    </section>
</main>

<!-- footer des pages -->
<?php include('include/footer.php'); ?>

</body>
</html>