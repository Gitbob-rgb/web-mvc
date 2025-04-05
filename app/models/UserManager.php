// models/UserManager.php
<?php

class UserManager {

    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getPDO(); // Connexion à la base de données
    }

    // Récupérer un utilisateur par son email
    public function getByEmail($email) {
        $stmt = $this->pdo->prepare("SELECT * FROM utilisateurs WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }
}
?>
