// models/PiloteManager.php
<?php
require_once 'Database.php';

class PiloteManager {

    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getPDO();
    }

    // Récupérer tous les pilotes
    public function getAll() {
        $stmt = $this->pdo->prepare("
            SELECT u.id, u.email
            FROM utilisateurs u
            WHERE u.role = 'pilote'
        ");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Récupérer un pilote par son ID
    public function get($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM utilisateurs WHERE id = ? AND role = 'pilote'");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    // Ajouter un nouveau pilote
    public function ajouter($email, $motdepasse) {
        $stmt = $this->pdo->prepare("INSERT INTO utilisateurs (email, motdepasse, role) VALUES (?, ?, ?)");
        $stmt->execute([$email, $motdepasse, 'pilote']);
    }

    // Modifier un pilote existant
    public function modifier($id, $email, $motdepasse) {
        $stmt = $this->pdo->prepare("UPDATE utilisateurs SET email = ?, motdepasse = ? WHERE id = ?");
        $stmt->execute([$email, $motdepasse, $id]);
    }

    // Supprimer un pilote
    public function supprimer($id) {
        $stmt = $this->pdo->prepare("DELETE FROM utilisateurs WHERE id = ?");
        $stmt->execute([$id]);
    }

    public function getNotationsByPilote($id) {
        $stmt = $this->pdo->prepare("
            SELECT e.nom AS entreprise_nom, n.note
            FROM notations n
            JOIN entreprises e ON n.entreprise_id = e.id
            WHERE n.utilisateur_id = ?
        ");
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }
}
?>
