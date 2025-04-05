<!-- views/offre_stage/liste_offres_stage.php -->
<h2>Liste des offres de stage</h2>

<form method="GET">
    <input type="text" name="search" placeholder="Rechercher par titre" value="<?= htmlspecialchars($searchTerm) ?>">
    <button type="submit">Rechercher</button>
</form>

<table border="1">
    <tr>
        <th>Titre</th>
        <th>Description</th>
        <th>Date de début</th>
        <th>Date de fin</th>
        <th>Entreprise</th>
        <th>Spécialité</th>
        <th>Actions</th>
        <th>Postuler</th>
        <th>Ajouter à la wish list</th>
    </tr>
    <?php foreach ($offres as $offre): ?>
    <tr>
        <td><?= htmlspecialchars($offre['titre']) ?></td>
        <td><?= htmlspecialchars($offre['description']) ?></td>
        <td><?= htmlspecialchars($offre['date_debut']) ?></td>
        <td><?= htmlspecialchars($offre['date_fin']) ?></td>
        <td><?= htmlspecialchars($offre['entreprise_nom']) ?></td>
        <td><?= htmlspecialchars($offre['specialite']) ?></td>
        <td>
            <a href="index.php?action=modifier_offre_stage&id=<?= $offre['id'] ?>">Modifier</a> |
            <a href="index.php?action=supprimer_offre_stage&id=<?= $offre['id'] ?>" onclick="return confirm('Supprimer cette offre de stage ?')">Supprimer</a>
        </td>
        <td>
            <a href="index.php?action=postuler&id=<?= $offre['id'] ?>">Postuler</a>
        </td>
        <td>
            <a href="index.php?action=ajouter_wish_list&offre_stage_id=<?= $offre['id'] ?>">Ajouter à la wish list</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<div>
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="index.php?action=offres_stage&page=<?= $i ?>&search=<?= urlencode($searchTerm) ?>"><?= $i ?></a>
    <?php endfor; ?>
</div>

<!-- Lien pour ajouter une nouvelle offre de stage -->
<p><a href="index.php?action=ajouter_offre_stage">Ajouter une offre de stage</a></p>
