<?php
// Fichier de configuration principal de l'application

// Paramètres de la base de données
define('DB_HOST', 'localhost');
define('DB_NAME', 'kéké');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8');

// Démarrage des sessions
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Définir le fuseau horaire de l'application (facultatif mais conseillé)
date_default_timezone_set('Europe/Paris');

// Autoloading des classes (si vous utilisez un autoloader)
function autoload($class) {
    $class = str_replace('\\', '/', $class);
    require_once "core/$class.php";
}

// Enregistrement de la fonction d'autoload
spl_autoload_register('autoload');

// Fonction pour afficher les erreurs (facultatif en production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Connexion à la base de données (facultatif, peut être déplacé dans la classe Database)
try {
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
    $pdo = new PDO($dsn, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
