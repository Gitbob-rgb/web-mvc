// core/Controller.php
<?php
class Controller {

    protected $model;
    protected $view;

    public function __construct() {
        $this->view = new View();
    }

    // Charger le modèle
    public function loadModel($model) {
        require_once "models/$model.php";
        $this->model = new $model();
    }

    // Afficher la vue
    public function renderView($view, $data = []) {
        $this->view->render($view, $data);
    }
}
?>
