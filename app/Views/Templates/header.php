<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Atlantik</title>
</head>
<body>
<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
  <center>
    <a class="navbar-brand" href="<?php echo site_url('accueil') ?>">
    <img src="../../../assets/images/Atlantik.png" width="30" height="30" class="d-inline-block align-center"> Atlantik
  </center>
    <?php
        $session = session();
        if(!is_null($session->get('identifiant')) or !is_null($session->get('Identifiant'))) : ?>
        <a href="<?php echo site_url('sedeconnecter') ?>"><button class="btn btn-outline-danger" type="button">Se déconnecter</button></a>
        
    <?php else: ?>
      <a href="<?php echo site_url('seconnecter') ?>"><button class="btn btn-outline-success" type="button">Se connecter</button></a>
        ou
        <a href="<?php echo site_url('creeruncompte') ?>"><button class="btn btn-outline-success" type="button">Créer un compte</button></a>
    <?php endif ?>
    <a href="<?php echo site_url('voirlesliaisons') ?>"><button class="btn btn-outline-info" type="button">Voir les liaisons par secteur</button></a>
        
</nav>

  
    