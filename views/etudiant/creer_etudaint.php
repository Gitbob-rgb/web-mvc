<!-- views/etudiant/creer_etudiant.php -->
<h2>Créer un étudiant</h2>

<?php if (isset($_GET['success']) && $_GET['success'] == 'true'): ?>
    <p style="color: green;">L'étudiant a été créé avec succès !</p>
<?php endif; ?>

<form method="POST">
    <label>Email:</label>
    <input type="email" name="email" required><br>

    <label>Mot de passe:</label>
    <input type="password" name="motdepasse" required><br>

    <button type="submit">Créer un étudiant</button>
</form>
