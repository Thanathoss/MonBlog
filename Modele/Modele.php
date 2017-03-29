<?php
abstract class Modele {

  // Objet PDO d'acc�s � la BD
  private $bdd;

  // Ex�cute une requ�te SQL �ventuellement param�tr�e
  protected function executerRequete($sql, $params = null) {
    if ($params == null) {
      $resultat = $this->getBdd()->query($sql);    // ex�cution directe
    }
    else {
      $resultat = $this->getBdd()->prepare($sql);  // requ�te pr�par�e
      $resultat->execute($params);
    }
    return $resultat;
  }

  // Renvoie un objet de connexion � la BD en initialisant la connexion au besoin
  private function getBdd() {
    if ($this->bdd == null) {
      // Cr�ation de la connexion
      $this->bdd = new PDO('mysql:host=localhost;dbname=monblog;charset=utf8',
        'ts2', 'ts2', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    return $this->bdd;
  }

}
?>