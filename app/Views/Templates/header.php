<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" type="image/png" href="/assets/images/Atlantik.png">
    <title>Atlantik</title>
</head>
<body>
<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
  <div class="container-fluid d-flex justify-content-between align-items-center">

    <a class="navbar-brand" href="<?php echo site_url('accueil') ?>">
      <img src="../../../assets/images/Atlantik.png" width="30" height="30" class="d-inline-block align-center">
      Atlantik
    </a>

    <div class="d-flex align-items-center">

      <a href="<?php echo site_url('voirlesliaisons') ?>">
        <button class="btn btn-outline-info me-2" type="button">
          🌊 Voir les liaisons
        </button>
      </a>

      <a href="<?php echo site_url('voirleshoraires') ?>">
        <button class="btn btn-outline-success me-2" type="button">
          🕛 Voir les horaires des traversées
        </button>
      </a>

    <?php
      $session = session();
      $identifiant = $session->get('identifiant') ?? $session->get('Identifiant');
      $profil = $session->get('profil');
      ?>

      <?php if (!is_null($identifiant)) : ?>

        <div class="dropdown">
          <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
            👤 <?php echo $session->get('Identifiant') ?? $session->get('profil'); ?>
          </button>

          <ul class="dropdown-menu dropdown-menu-end">

            <li>
              <a class="dropdown-item" href="<?php echo site_url('afficherreservations') ?>">
                Voir mes réservations
              </a>
            </li>

            <?php if (!is_null($session->get('NOCLIENT'))) : ?>
              <li>
                <a class="dropdown-item" href="<?php echo site_url('modifiermoncompte') ?>">
                  Modifier mes infos
                </a>
              </li>
            <?php endif; ?>

            <li><hr class="dropdown-divider"></li>

            <li>
              <a class="dropdown-item text-danger" href="<?php echo site_url('sedeconnecter') ?>">
                Se déconnecter
              </a>
            </li>

          </ul>
        </div>

      <?php else: ?>

        <div class="dropdown">
          <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
            👤 Identification
          </button>

          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item" href="<?php echo site_url('seconnecter') ?>">
                Se connecter
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="<?php echo site_url('creeruncompte') ?>">
                Créer un compte
              </a>
            </li>
          </ul>
        </div>

      <?php endif; ?>
      
    </div>
  </div>
</nav>

  
    