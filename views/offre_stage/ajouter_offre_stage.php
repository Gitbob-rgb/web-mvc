<!-- views/offre_stage/ajouter_offre_stage.php -->
<h2>Ajouter une nouvelle offre de stage</h2>

<?php if (isset($_GET['success']) && $_GET['success'] == 'true'): ?>
    <p style="color: green;">L'offre de stage a été ajoutée avec succès !</p>
<?php endif; ?>

<form method="POST">
    <label>Titre :</label>
    <input type="text" name="titre" required><br>

    <label>Description :</label>
    <textarea name="description" required></textarea><br>

    <label>Date de début :</label>
    <input type="date" name="date_debut" required><br>

    <label>Date de fin :</label>
    <input type="date" name="date_fin" required><br>

    <label>Entreprise :</label>
    <select name="entreprise_id" required>
        <?php foreach ($entreprises as $entreprise): ?>
            <option value="<?= $entreprise['id'] ?>"><?= htmlspecialchars($entreprise['nom']) ?></option>
        <?php endforeach; ?>
    </select><br>

    <label>Spécialité :</label>
    <input type="text" name="specialite" required><br>

    <button type="submit">Ajouter l'offre</button>
</form>
