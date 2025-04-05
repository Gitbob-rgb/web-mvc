<!-- views/entreprise/liste_entreprises.php -->
<h2>Liste des entreprises</h2>

<form method="GET">
    <input type="text" name="search" placeholder="Rechercher par nom" value="<?= htmlspecialchars($searchTerm) ?>">
    <button type="submit">Rechercher</button>
</form>

<table border="1">
    <tr>
        <th>Nom</th>
        <th>Adresse</th>
        <th>Email</th>
        <th>Actions</th>
        <th>Détails</th>
    </tr>
    <?php foreach ($entreprises as $entreprise): ?>
    <tr>
        <td><?= htmlspecialchars($entreprise['nom']) ?></td>
        <td><?= htmlspecialchars($entreprise['adresse']) ?></td>
        <td><?= htmlspecialchars($entreprise['email']) ?></td>
        <td>
            <a href="index.php?action=modifier_entreprise&id=<?= $entreprise['id'] ?>">Modifier</a> |
            <a href="index.php?action=supprimer_entreprise&id=<?= $entreprise['id'] ?>" onclick="return confirm('Supprimer cette entreprise ?')">Supprimer</a>
        </td>
        <td><a href="index.php?action=afficher_entreprise&id=<?= $entreprise['id'] ?>">Détails</a></td>
    </tr>
    <?php endforeach; ?>
</table>

<div>
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="index.php?action=entreprises&page=<?= $i ?>&search=<?= urlencode($searchTerm) ?>"><?= $i ?></a>
    <?php endfor; ?>
</div>

<!-- Lien pour ajouter une nouvelle entreprise -->
<p><a href="index.php?action=ajouter_entreprise">Ajouter une entreprise</a></p>
