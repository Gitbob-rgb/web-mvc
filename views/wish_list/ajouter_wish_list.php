<!-- views/wish_list/ajouter_wish_list.php -->
<h2>Ajouter à la Wish List</h2>

<?php if (isset($_GET['success']) && $_GET['success'] == 'true'): ?>
    <p style="color: green;">L'offre de stage a été ajoutée à votre wish list avec succès !</p>
<?php endif; ?>

<a href="index.php?action=wish_list">Retour à ma Wish List</a>
