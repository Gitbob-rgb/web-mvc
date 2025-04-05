// models/EtudiantManager.php
<?php
require_once 'config.php';

class EtudiantManager {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Récupérer tous les étudiants
    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM utilisateurs WHERE role = 'etudiant'");
        return $stmt->fetchAll();
    }

    // Récupérer un étudiant par son ID
    public function get($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM utilisateurs WHERE id = ? AND role = 'etudiant'");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    // Ajouter un nouvel étudiant
    public function ajouter($email, $motdepasse) {
        $stmt = $this->pdo->prepare("INSERT INTO utilisateurs (email, motdepasse, role) VALUES (?, ?, ?)");
        $stmt->execute([$email, $motdepasse, 'etudiant']);
    }

    // Modifier un étudiant
    public function modifier($id, $email, $motdepasse) {
        $stmt = $this->pdo->prepare("UPDATE utilisateurs SET email = ?, motdepasse = ? WHERE id = ?");
        $stmt->execute([$email, $motdepasse, $id]);
    }

    // Supprimer un étudiant
    public function supprimer($id) {
        $stmt = $this->pdo->prepare("DELETE FROM utilisateurs WHERE id = ?");
        $stmt->execute([$id]);
    }

    // Récupérer toutes les postulations d'un étudiant
    public function getPostulations($id) {
        // Récupère les offres de stage auxquelles l'étudiant a postulé
        $stmt = $this->pdo->prepare(
            "SELECT o.titre, o.description, e.nom AS entreprise_nom, o.date_debut, o.date_fin
            FROM wish_list w
            JOIN offres_stage o ON w.offre_stage_id = o.id
            JOIN entreprises e ON o.entreprise_id = e.id
            WHERE w.utilisateur_id = ?"
        );
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }

    // models/EtudiantManager.php
    public function getNotationsByEtudiant($utilisateur_id) {
    $stmt = $this->pdo->prepare("
        SELECT e.nom AS entreprise_nom, n.note
        FROM notations n
        JOIN entreprises e ON n.entreprise_id = e.id
        WHERE n.utilisateur_id = ?
    ");
    $stmt->execute([$utilisateur_id]);
    return $stmt->fetchAll();
}

}
?>
