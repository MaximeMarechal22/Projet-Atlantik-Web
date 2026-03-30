<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Atlantik</title>
</head>
<body>
<nav class="navbar navbar-light bg-">
  <a class="navbar-brand" href="<?php echo site_url('accueil') ?>">
    <img src="../../../assets/images/Atlantik.jpg" width="35" height="35" class="d-inline-block align-top">
    Atlantik
    <?php
        $session = session();
        if(!is_null($session->get('identifiant')) or !is_null($session->get('Identifiant'))) : ?>
        <a href="<?php echo site_url('sedeconnecter') ?>"><button class="btn btn-outline-danger" type="button">Se déconnecter</button></a>&nbsp;&nbsp;
        <?php if ($session->get('profil') == 'Administrateur') : ?>
            <a href="<?php echo site_url('ajouterproduit') ?>">Ajouter un produit</a>&nbsp;&nbsp;
            <a href="<?php echo site_url('voircommandesproduits') ?>">Voir commandes-produits</a>&nbsp;&nbsp;
            <?php endif;  ?>
        
    <?php else : ?>
        <a href="<?php echo site_url('seconnecter') ?>"><button class="btn btn-outline-success" type="button">Se connecter</button></a>&nbsp;&nbsp;
    <?php endif; ?>
    <a href="<?php echo site_url('voirlesproduits') ?>"><button class="btn btn-outline-dark" type="button">Voir tous les produits</button></a>&nbsp;&nbsp;
    <a href="<?php echo site_url('voirlesproduitsavecpagination') ?>"><button class="btn btn-outline-dark" type="button">Lister les produits (par 3)</button></a>&nbsp;&nbsp;
  </a>
  
</nav>

  
    