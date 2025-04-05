<!-- views/etudiant/modifier_etudiant.php -->
<h2>Modifier l'étudiant</h2>

<?php if (isset($_GET['success']) && $_GET['success'] == 'true'): ?>
    <p style="color: green;">Les informations de l'étudiant ont été mises à jour avec succès !</p>
<?php endif; ?>

<form method="POST">
    <label>Email:</label>
    <input type="email" name="email" value="<?= htmlspecialchars($etudiant['email']) ?>" required><br>

    <label>Nouveau mot de passe:</label>
    <input type="password" name="motdepasse" required><br>

    <button type="submit">Mettre à jour l'étudiant</button>
</form>
