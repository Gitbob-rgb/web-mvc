<!-- views/offre_stage/postuler.php -->
<h2>Postuler à l'offre de stage</h2>

<?php if (isset($error)): ?>
    <p style="color: red;"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form method="POST" enctype="multipart/form-data">
    <label>Nom :</label>
    <input type="text" name="nom" required><br>

    <label>Prénom :</label>
    <input type="text" name="prenom" required><br>

    <label>Lettre de motivation :</label>
    <input type="file" name="lettre_motivation" accept=".pdf,.png,.jpeg,.doc,.docx" required><br>

    <label>CV :</label>
    <input type="file" name="cv" accept=".pdf,.png,.jpeg,.doc,.docx" required><br>

    <button type="submit">Envoyer la candidature</button>
</form>
