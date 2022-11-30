<!DOCTYPE html>
<html>
<head>
<title>Inscription</title>
<link rel="stylesheet" href="styles/inscription_action-style.css" />
<link rel="icon" type="image/x-icon" href="img/logo-onglet.svg">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<?php include('header.php'); ?>
<main>

<section>
    


</section>

</main>

<?php include('footer.php'); ?>


</body>
</html>

<?php

if ($_GET){
    echo '<table border=2>
    <thead>
    <tr>
        <th>Argument</th>
        <th>Valeur</th>
    </tr>
    </thead>';
    }
    
    foreach($_GET as $argument => $valeur) {
    echo "<tr>
        <td>$argument</td>
        <td>$valeur</td>
        </tr>";
    }
?>