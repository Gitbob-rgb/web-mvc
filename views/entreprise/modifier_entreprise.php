<!-- views/entreprise/ajouter_entreprise.php -->
<h2>Ajouter une nouvelle entreprise</h2>

<?php if (isset($_GET['success']) && $_GET['success'] == 'true'): ?>
    <p style="color: green;">L'entreprise a été ajoutée avec succès !</p>
<?php endif; ?>

<form method="POST">
    <label>Nom :</label>
    <input type="text" name="nom" required><br>

    <label>Adresse :</label>
    <input type="text" name="adresse" required><br>

    <label>Email :</label>
    <input type="email" name="email" required><br>

    <button type="submit">Ajouter l'entreprise</button>
</form>
