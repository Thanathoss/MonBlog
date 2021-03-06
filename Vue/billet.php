<?php

require '../Modele/Modele.php';

try {
  if (isset($_GET['id'])) {
    // intval renvoie la valeur num�rique du param�tre ou 0 en cas d'�chec
    $id = intval($_GET['id']);
    if ($id != 0) {
      $billet = getBillet($id);
      $commentaires = getCommentaires($id);
      require 'vueBillet.php';
    }
    else
      throw new Exception("Identifiant de billet incorrect");
  }
  else
    throw new Exception("Aucun identifiant de billet");
}
catch (Exception $e) {
  $msgErreur = $e->getMessage();
  require 'vueErreur.php';
}