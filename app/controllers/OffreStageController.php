// controllers/OffreStageController.php
<?php
require_once 'models/OffreStageManager.php';

class OffreStageController {
    private $manager;

    public function __construct($pdo) {
        $this->manager = new OffreStageManager($pdo);
    }

    public function index() {
        $offres = $this->manager->getAll();
        require_once 'views/offre_stage/liste_offres_stage.php';
    }

    public function ajouter() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titre = $_POST['titre'];
            $description = $_POST['description'];
            $date_debut = $_POST['date_debut'];
            $date_fin = $_POST['date_fin'];
            $entreprise_id = $_POST['entreprise_id'];
            $specialite = $_POST['specialite'];
            $this->manager->ajouter($titre, $description, $date_debut, $date_fin, $entreprise_id, $specialite);
            header('Location: index.php?action=ajouter_offre_stage&success=true');
            exit;
        }
    
        $entreprises = $this->manager->getAll();
        require_once 'views/offre_stage/ajouter_offre_stage.php';
    }
    
    public function modifier($id) {
        $offre = $this->manager->get($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titre = $_POST['titre'];
            $description = $_POST['description'];
            $date_debut = $_POST['date_debut'];
            $date_fin = $_POST['date_fin'];
            $entreprise_id = $_POST['entreprise_id'];
            $specialite = $_POST['specialite'];
            $this->manager->modifier($id, $titre, $description, $date_debut, $date_fin, $entreprise_id, $specialite);
            header('Location: index.php?action=modifier_offre_stage&id=' . $id . '&success=true');
            exit;
        }
    
        $entreprises = $this->manager->getAll();
        require_once 'views/offre_stage/modifier_offre_stage.php';
    }

    public function supprimer($id) {
        $this->manager->supprimer($id);
        header('Location: index.php?action=offres_stage');
    }
}
?>
