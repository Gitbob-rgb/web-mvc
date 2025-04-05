// controllers/WishListController.php
<?php
require_once 'models/WishListManager.php';

class WishListController {
    private $manager;

    public function __construct($pdo) {
        $this->manager = new WishListManager($pdo);
    }

    public function index() {
        checkAccess(['admin','etudiant']);
        $utilisateur_id = $_SESSION['user_id'];
        $wish_list = $this->manager->getAll($utilisateur_id);
        require_once 'views/wish_list/wish_list.php';
    }

    public function ajouter($offre_stage_id) {
        checkAccess(['admin','etudiant']);
        $utilisateur_id = $_SESSION['user_id'];
        $this->manager->ajouter($utilisateur_id, $offre_stage_id);
        header('Location: index.php?action=wish_list&success=true');  // Redirection après ajout
        exit;
    }

    public function supprimer($offre_stage_id) {
        checkAccess(['admin','etudiant']);
        $utilisateur_id = $_SESSION['user_id'];
        $this->manager->supprimer($utilisateur_id, $offre_stage_id);
        header('Location: index.php?action=wish_list');
    }
}
?>
