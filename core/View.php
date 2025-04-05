// core/View.php
<?php
class View {

    // Rendre la vue avec les données
    public function render($view, $data = []) {
        // Si le fichier de vue existe
        if (file_exists("views/$view.php")) {
            // Extraire les données dans des variables
            if (!empty($data)) {
                extract($data);
            }

            // Inclure le fichier de vue
            require_once "views/$view.php";
        } else {
            // Si la vue n'existe pas, afficher une erreur
            echo "La vue '$view' n'existe pas.";
        }
    }
}
?>
