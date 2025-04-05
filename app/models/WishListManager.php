// models/WishListManager.php
<?php
require_once 'config.php';

class WishListManager {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function ajouter($utilisateur_id, $offre_stage_id) {
        // Vérifier si l'offre est déjà dans la wish list
        $stmt = $this->pdo->prepare("SELECT * FROM wish_list WHERE utilisateur_id = ? AND offre_stage_id = ?");
        $stmt->execute([$utilisateur_id, $offre_stage_id]);
        
        if ($stmt->rowCount() == 0) {
            // Ajouter l'offre à la wish list si elle n'est pas déjà présente
            $stmt = $this->pdo->prepare("INSERT INTO wish_list (utilisateur_id, offre_stage_id, date_ajout) VALUES (?, ?, ?)");
            $stmt->execute([$utilisateur_id, $offre_stage_id, date('Y-m-d')]);
        }
    }
    
    public function supprimer($utilisateur_id, $offre_stage_id) {
        $stmt = $this->pdo->prepare("DELETE FROM wish_list WHERE utilisateur_id=? AND offre_stage_id=?");
        $stmt->execute([$utilisateur_id, $offre_stage_id]);
    }
    
    public function getAll($utilisateur_id) {
        $stmt = $this->pdo->prepare("SELECT o.*, e.nom AS entreprise_nom
                                      FROM wish_list w
                                      JOIN offres_stage o ON w.offre_stage_id = o.id
                                      JOIN entreprises e ON o.entreprise_id = e.id
                                      WHERE w.utilisateur_id = ?");
        $stmt->execute([$utilisateur_id]);
        return $stmt->fetchAll();
    }
}
?>
