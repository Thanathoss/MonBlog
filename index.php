<?php
// Accès aux données
$bdd = new PDO('mysql:host=localhost;dbname=monblog;charset=utf8', 'root', '');
$billets = $bdd->query('select BIL_ID as id, BIL_DATE as date,'
  . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
  . ' order by BIL_ID desc');

// Affichage
require 'vueAccueil.php';