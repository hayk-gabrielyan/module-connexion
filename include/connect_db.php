<?php 
    $mysqli = new mysqli('localhost', 'root', '', 'moduleconnexion');   // connexion à la base de données
    $request = $mysqli->query("SELECT * FROM utilisateurs");       // On lance la requête pour récupérer la table
    $users = $request->fetch_all();   
?>