<!-- views/pilote/creer_pilote.php -->
<h2>Ajouter un nouveau pilote</h2>

<?php if (isset($success) && $success): ?>
    <p style="color: green;">Le pilote a été ajouté avec succès !</p>
<?php endif; ?>

<form method="POST">
    <label>Email :</label>
    <input type="email" name="email" required><br>

    <label>Mot de passe :</label>
    <input type="password" name="motdepasse" required><br>

    <button type="submit">Ajouter le pilote</button>
</form>

<a href="index.php?action=liste_pilotes">Retour à la liste des pilotes</a>
