<?php 
class Vue {

  // Nom du fichier associ� � la vue
  private $fichier;
  // Titre de la vue (d�fini dans le fichier vue)
  private $titre;

  public function __construct($action) {
    // D�termination du nom du fichier vue � partir de l'action
    $this->fichier = "Vue/vue" . $action . ".php";
  }

  // G�n�re et affiche la vue
  public function generer($donnees) {
    // G�n�ration de la partie sp�cifique de la vue
    $contenu = $this->genererFichier($this->fichier, $donnees);
    // G�n�ration du gabarit commun utilisant la partie sp�cifique
    $vue = $this->genererFichier('Vue/gabarit.php',
      array('titre' => $this->titre, 'contenu' => $contenu));
    // Renvoi de la vue au navigateur
    echo $vue;
  }

  // G�n�re un fichier vue et renvoie le r�sultat produit
  private function genererFichier($fichier, $donnees) {
    if (file_exists($fichier)) {
      // Rend les �l�ments du tableau $donnees accessibles dans la vue
      extract($donnees);
      // D�marrage de la temporisation de sortie
      ob_start();
      // Inclut le fichier vue
      // Son r�sultat est plac� dans le tampon de sortie
      require $fichier;
      // Arr�t de la temporisation et renvoi du tampon de sortie
      return ob_get_clean();
    }
    else {
      throw new Exception("Fichier '$fichier' introuvable");
    }
  }
}
?>