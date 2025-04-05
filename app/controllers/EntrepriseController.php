// controllers/EntrepriseController.php
<?php
require_once 'models/EntrepriseManager.php';

class EntrepriseController {
    private $manager;

    public function __construct($pdo) {
        $this->manager = new EntrepriseManager($pdo);
    }

    public function index() {
        $entreprises = $this->manager->getAll();
        require_once 'views/entreprise/liste_entreprises.php';
    }

    // controllers/EntrepriseController.php
    public function ajouter() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = $_POST['nom'];
        $adresse = $_POST['adresse'];
        $email = $_POST['email'];
        $this->manager->ajouter($nom, $adresse, $email);
        header('Location: index.php?action=ajouter_entreprise&success=true');
        exit;
    }
    require_once 'views/entreprise/ajouter_entreprise.php';
}

    public function modifier($id) {
    $entreprise = $this->manager->get($id);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = $_POST['nom'];
        $adresse = $_POST['adresse'];
        $email = $_POST['email'];
        $this->manager->modifier($id, $nom, $adresse, $email);
        header('Location: index.php?action=modifier_entreprise&id=' . $id . '&success=true');
        exit;
    }
    require_once 'views/entreprise/modifier_entreprise.php';
}

    public function supprimer($id) {
        $this->manager->supprimer($id);
        header('Location: index.php?action=entreprises');
    }
}
?>
