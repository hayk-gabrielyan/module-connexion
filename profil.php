<!--connexion à la base de donnée-->
<?php 
session_start();
include 'include/connect_db.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Inscription</title>
<link rel="stylesheet" href="styles/profile.css" />
<link rel="icon" type="image/x-icon" href="img/logo-onglet.svg">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<!--header des pages-->
<?php include('include/header.php'); ?>
<main>
    <section>

        <?php 
            // rappel des variable contenant les informations de l'utilisateur
            $login = $_SESSION['login'];
            $password = $_SESSION['password'];
            $nom = $_SESSION['nom'];
            $prenom = $_SESSION['prenom'];

            //Message de bienvenue
            echo "<p> Bonjour <span id='user'>$login</span> </p>";

            // affichage en cas d'erreur
            if(isset($_GET['erreur'])){
                if($_GET['erreur'] == 0)
                    echo "<p style='color:green'>Modifications enregistrées</p>";
                else if ($_GET['erreur'] == 1){
                    echo "<p style='color:red'>Mot de passe incorrect, modifications non réalisées</p>";
                }
                else if ($_GET['erreur'] == 2){
                    echo "<p style='color:red'>Veuillez entrer votre mot de passe pour réaliser des changements</p>";
                }
            }

        
            //affichage en cas d'erreur
            if(isset($_GET['erreur'])){
                if ($_GET['erreur'] == 3){
                    echo "<p style='color:red'>Les deux mots de passe ne correspondent pas</p>";
                }
                else if ($_GET['erreur'] == 4){
                    echo "<p style='color:red'>Veuillez entrer un nouveau mot de passe</p>";
                }
                else if ($_GET['erreur'] == 5){
                    echo "<p style='color:red'>Case ancien mot de passe vide ou incorrect</p>";
                }
                else if ($_GET['erreur'] == 6){
                    echo "<p style='color:green'>Modifications enregistrées</p>";
                }
            }
        ?>

        <form action="" method="POST">
        <div class="container">
            <div class="bold register">Formulaire de modification de vos informations</div>
            <hr>
            <label for="nom" class="bold">Changer le nom</label>
            <input type="text" placeholder="Saisissez ici le nouveau nom ..." name="nom"  value="<?=$nom?>" required>

            <label for="prenom" class="bold">Changer le prénom</label>
            <input type="text" placeholder="Saisissez ici le nouveau prénom ..." name="prenom"  value="<?=$prenom?>" required>

            <label for="login" class="bold">Changer le nom d'utilisateur</label>
            <input type="text" placeholder="Saissisez ici le nouveau nom d'utilisateur ..." name="login"  value="<?=$login?>" required >

            <label for="password" class="bold">Ancien mot de passe</label>
            <input type="password" name ="password"  value="" placeholder="Entrez votre ancien mot de passe" >

            <label for="newpassword" class="bold">Nouveau mot de passe</label>
            <input type="password" name="newpassword" placeholder="Saissisez ici le nouveau mot de passe ..."  required  >

            <label for="newpassword2" class="bold">Confirmer le nouveau mot de passe</label>
            <input type="password" name="newpassword2" placeholder="Confirmer ici le nouveau mot de passe ..."  required  >
            <hr>

            <button type="submit" class="registerbtn">Enregistrer les modifications</button>
        </div>
        </form>

    </section>
</main>

<?php
    if(isset($_POST['login']) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['password'])){
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $password = $_POST['password'];
        if ($password != ""){
            $requete = "SELECT password FROM utilisateurs where login = '".$login."'";
            $exec_requete = $connect -> query($requete);
            $reponse = mysqli_fetch_array($exec_requete);
            $password_hash = $reponse['password'];
            if (password_verify($password, $password_hash)) { //mot de passe correct
                // stockage des nouvelles infos dans la BDD
                $password = password_hash($password, PASSWORD_DEFAULT);
                $requete = "UPDATE utilisateurs SET login = '".$_POST['login']."', prenom = '".$prenom."', nom = '".$nom."' where login = '".$login."'";
                $exec_requete = $connect -> query($requete);
                // stockage des nouvelles infos dans les variables de session
                $login = $_POST['login'];
                $_SESSION['login'] = $login;
                $_SESSION['prenom'] = $prenom;
                $_SESSION['nom'] = $nom;
                // redirection vers la page profil avec les nouvelles données
                header('Location: profil.php?erreur=0');
            }
            else{
                header('Location: profil.php?erreur=1'); // mot de passe incorrect
            }
        }
        else{
            header('Location: profil.php?erreur=2'); // mot de passe vide
        }
    }
?>



<?php
    if(isset($_POST['password']) && isset($_POST['newpassword']) && isset($_POST['newpassword2'])){
        if ($_POST['password'] != ""){
            if (password_verify($_POST['password'], $password)) { // ancien mot de passe correct
                if (isset($_POST['newpassword']) && $_POST['newpassword'] !== '' && isset($_POST['newpassword2']) && $_POST['newpassword2'] !== ''){
                    if ($_POST['newpassword'] == $_POST['newpassword2']){ // nouveau mot de passe correct
                        $password = password_hash($_POST['newpassword'], PASSWORD_BCRYPT);
                        // stockage du nouveau mot de passe dans la BDD
                        $requete = "UPDATE utilisateurs SET password = '".$password."'";
                        $exec_requete = $connect -> query($requete);
                        // stockage du nouveau mot de passe dans les variables de session
                        $_SESSION['password'] = $password;
                        // redirection avec message de réussite
                        header('Location: profil.php?erreur=6');
                        
                    }
                    else{
                        // $_SESSION['erreur'] = 3; // les deux mots de passe ne correspondent pas
                        header('Location: profil.php?erreur=3'); // deux mots de passe différents
                    }
                }
                else{
                    //$_SESSION['erreur'] = 4; // case nouveau mot de passe vide
                    header('Location: profil.php?erreur=4'); // nouveau mot de passe vide
                }
            }
            else{
                //$_SESSION['erreur'] = 5; // ancien mot de passe incorrect
                header('Location: profil.php?erreur=5'); // ancien mot de passe incorrect
            }
        }
        else{
            //$_SESSION['erreur'] = 5; // ancien mot de passe vide
            header('Location: profil.php?erreur=5'); // ancien mot de passe vide
        }
    }

?>

<!--footer des pages-->
<?php include('include/footer.php'); ?>

</body>
</html>