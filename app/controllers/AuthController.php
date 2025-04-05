// controllers/AuthController.php
<?php

class AuthController {

    // Méthode de connexion
    public function login() {
        // Si le formulaire est soumis via POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Charger le modèle UserManager
            require_once 'models/UserManager.php';
            $userManager = new UserManager();
            
            // Récupérer l'utilisateur avec l'email
            $user = $userManager->getByEmail($_POST['email']);
            
            // Vérifier si l'utilisateur existe
            if ($user) {
                // Vérifier si le mot de passe est correct
                if (password_verify($_POST['motdepasse'], $user['motdepasse'])) {
                    // Si les identifiants sont valides, démarrer la session
                    session_start();
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['role'] = $user['role'];

                    // Redirection en fonction du rôle
                    if ($user['role'] == 'admin') {
                        header('Location: admin_dashboard.php');
                    } elseif ($user['role'] == 'pilote') {
                        header('Location: pilote_dashboard.php');
                    } elseif ($user['role'] == 'etudiant') {
                        header('Location: etudiant_dashboard.php');
                    }
                    exit;
                } else {
                    // Si le mot de passe est incorrect
                    $error = "Identifiants incorrects.";
                }
            } else {
                // Si l'utilisateur n'existe pas
                $error = "Identifiants incorrects.";
            }
        }

        // Afficher la page de login avec l'erreur si nécessaire
        require_once 'views/auth/login.php';
    }

    // Déconnexion
    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header('Location: login.php');
    }
}
?>
