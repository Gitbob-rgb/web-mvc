<!-- views/offre_stage/modifier_offre_stage.php -->
<h2>Modifier l'offre de stage</h2>

<?php if (isset($_GET['success']) && $_GET['success'] == 'true'): ?>
    <p style="color: green;">Les informations de l'offre de stage ont été mises à jour avec succès !</p>
<?php endif; ?>

<form method="POST">
    <label>Titre :</label>
    <input type="text" name="titre" value="<?= htmlspecialchars($offre_stage['titre']) ?>" required><br>

    <label>Description :</label>
    <textarea name="description" required><?= htmlspecialchars($offre_stage['description']) ?></textarea><br>

    <label>Date de début :</label>
    <input type="date" name="date_debut" value="<?= htmlspecialchars($offre_stage['date_debut']) ?>" required><br>

    <label>Date de fin :</label>
    <input type="date" name="date_fin" value="<?= htmlspecialchars($offre_stage['date_fin']) ?>" required><br>

    <label>Entreprise :</label>
    <select name="entreprise_id" required>
        <?php foreach ($entreprises as $entreprise): ?>
            <option value="<?= $entreprise['id'] ?>" <?= $entreprise['id'] == $offre_stage['entreprise_id'] ? 'selected' : '' ?>><?= htmlspecialchars($entreprise['nom']) ?></option>
        <?php endforeach; ?>
    </select><br>

    <label>Spécialité :</label>
    <input type="text" name="specialite" value="<?= htmlspecialchars($offre_stage['specialite']) ?>" required><br>

    <button type="submit">Mettre à jour l'offre</button>
</form>
