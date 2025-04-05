// controllers/PiloteController.php
<?php
class PiloteController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->loadModel('PiloteManager');
    }

    // Afficher la liste des pilotes
    public function liste() {
        checkAccess(['admin']);
        $pilotes = $this->model->getAll();
        $this->renderView('pilote/liste_pilotes', ['pilotes' => $pilotes]);
    }

    public function affiche($id) {
        $pilote = $this->model->get($id);
        $notations = $this->model->getNotationsByPilote($id);
        $this->renderView('pilote/affiche_pilote', ['pilote' => $pilote, 'notations' => $notations]);
    }
    
    // Créer un nouveau pilote
    public function creer() {
        checkAccess(['admin']);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $motdepasse = password_hash($_POST['motdepasse'], PASSWORD_DEFAULT);
            $this->model->ajouter($email, $motdepasse);
            $this->renderView('pilote/creer_pilote', ['success' => true]);
        } else {
            $this->renderView('pilote/creer_pilote');
        }
    }

    // Modifier un pilote
    public function modifier($id) {
        checkAccess(['admin']);
        $pilote = $this->model->get($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $motdepasse = password_hash($_POST['motdepasse'], PASSWORD_DEFAULT);
            $this->model->modifier($id, $email, $motdepasse);
            $this->renderView('pilote/modifier_pilote', ['success' => true, 'pilote' => $pilote]);
        } else {
            $this->renderView('pilote/modifier_pilote', ['pilote' => $pilote]);
        }
    }

    // Supprimer un pilote
    public function supprimer($id) {
        checkAccess(['admin']);
        $this->model->supprimer($id);
        header('Location: index.php?action=liste_pilotes');
    }
}
