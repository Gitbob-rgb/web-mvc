<!-- views/pilote/modifier_pilote.php -->
<h2>Modifier le pilote</h2>

<?php if (isset($success) && $success): ?>
    <p style="color: green;">Les informations du pilote ont été mises à jour avec succès !</p>
<?php endif; ?>

<form method="POST">
    <label>Email :</label>
    <input type="email" name="email" value="<?= htmlspecialchars($pilote['email']) ?>" required><br>

    <label>Mot de passe :</label>
    <input type="password" name="motdepasse" required><br>

    <button type="submit">Mettre à jour le pilote</button>
</form>

<a href="index.php?action=liste_pilotes">Retour à la liste des pilotes</a>
