// controllers/EtudiantController.php
<?php
require_once 'models/EtudiantManager.php';

class EtudiantController {
    private $manager;

    public function __construct($pdo) {
        $this->manager = new EtudiantManager($pdo);
    }

    // Afficher la liste des étudiants
    public function index() {
        $etudiants = $this->manager->getAll();
        require_once 'views/etudiant/liste_etudiants.php';
    }

    // Afficher les détails d'un étudiant
    // controllers/EtudiantController.php
    public function afficher($id) {
    $etudiant = $this->manager->get($id);
    $notations = $this->manager->getNotationsByEtudiant($id);  // Récupérer les entreprises notées
    require_once 'views/etudiant/affiche_etudiant.php';
}


    // Ajouter un étudiant
    public function ajouter() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $motdepasse = password_hash($_POST['motdepasse'], PASSWORD_DEFAULT);
            $this->manager->ajouter($email, $motdepasse);
            header('Location: index.php?action=etudiants');
        }
        require_once 'views/etudiant/creer_etudiant.php';
    }

    // Modifier un étudiant
    public function modifier($id) {
        $etudiant = $this->manager->get($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $motdepasse = password_hash($_POST['motdepasse'], PASSWORD_DEFAULT);
            $this->manager->modifier($id, $email, $motdepasse);
            header('Location: index.php?action=etudiants');
        }
        require_once 'views/etudiant/modifier_etudiant.php';
    }

    // Supprimer un étudiant
    public function supprimer($id) {
        $this->manager->supprimer($id);
        header('Location: index.php?action=etudiants');
    }

    // Voir les offres postulées par un étudiant
    public function voirPostulations($id) {
        $postulations = $this->manager->getPostulations($id);
        require_once 'views/etudiant/offres_postulees.php';
    }

    

}
?>
