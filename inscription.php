<?php

    include('include/connect_db.php'); // connexion à la base de donnée
    
    if(isset($_POST['login']) && isset($_POST['password']) && isset($_POST['prenom'])){
    $login = mysqli_real_escape_string($connect,htmlspecialchars($_POST['login']));
    $password = mysqli_real_escape_string($connect,htmlspecialchars($_POST['password']));
    $password2 = mysqli_real_escape_string($connect,htmlspecialchars($_POST['password2']));
    $prenom = mysqli_real_escape_string($connect,htmlspecialchars($_POST['prenom']));
    $nom = mysqli_real_escape_string($connect,htmlspecialchars($_POST['nom']));

    if($login !== "" && $password !== "" && $password2 !== "" && $prenom !== "" && $nom !== ""){
        if($password == $password2){
            $requete = "SELECT count(*) FROM utilisateurs where login = '".$login."'";
            $exec_requete = $connect -> query($requete);
            $reponse      = mysqli_fetch_array($exec_requete);
            $count = $reponse['count(*)'];

            if($count==0){
                $password = password_hash($password, PASSWORD_BCRYPT);
                $requete = "INSERT INTO utilisateurs (login, prenom, nom, password) VALUES ('".$login."', '".$prenom."', '".$nom."', '".($password)."')";
                $exec_requete = $connect -> query($requete);
                header('Location: connexion.php');
            }
            else{// utilisateur déjà existant
                header('Location: inscription.php?erreur=1');
            }
        }
        else{// mot de passe différent
            header('Location: inscription.php?erreur=2'); 
        }
    }

}

mysqli_close($connect); // fermer la connexion
?>

<!-- partie HTML -->
<!DOCTYPE html>
<html>
<head>
<title>Inscription</title>
<link rel="stylesheet" href="styles/inscription-style.css" />
<link rel="icon" type="image/x-icon" href="img/logo-onglet.svg">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<!-- header des pages -->
<?php include('include/header.php'); ?>
<main>
<section>

<!-- partie PHP qui affiche l'erreur de utilisateur existant ou mot de passes qui correspondent pas -->
<?php
    if(isset($_GET['erreur'])){
        $err = $_GET['erreur'];
        if($err==1){
            echo "<center><p style='color:red'>Ce nom d'utilisateur a déjà été utilisé</p></center>";
        }
        if($err==2){
            echo "<center><p style='color:red'>Les mot de passes ne correspondent pas</p></center>";
        }
    }
?>

    <form action="inscription.php" method="POST">

        <div class="container">
            <div class="bold register">Inscrivez-vous</div>
            <p>Remplissez toutes les cases</p>
            <hr>
            <div class="name">
                <label for="name" class="bold">Nom</label>
                <input type="text" placeholder="Saissisez votre nom" name="nom" id="nom" required>
                
                <label for="name" class="bold" id="name">Prénom</label>
                <input type="text" placeholder="Saissisez votre prénom" name="prenom" id="prenom" required>
            </div>
            <label for="login" class="bold">Nom d'utilisateur</label>
            <input type="text" placeholder="Saissisez un nom d'utilisateur" name="login" id="login" required>

            <label for="password" class="bold">Mot de passe</label>
            <input type="password" placeholder="Mot de passe" name="password" id="password" required>

            <label for="password2" class="bold">Répétez le mot de passe</label>
            <input type="password" placeholder="Confirmez le mot de passe" name="password2" id="password2" required>
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

<!-- footer des pages -->
<?php include('include/footer.php'); ?>



</body>
</html>


