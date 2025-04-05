<!-- views/etudiant/liste_etudiants.php -->
<h2>Liste des étudiants</h2>

<form method="GET">
    <input type="text" name="search" placeholder="Rechercher par email" value="<?= htmlspecialchars($searchTerm) ?>">
    <button type="submit">Rechercher</button>
</form>

<table border="1">
    <tr>
        <th>Email</th>
        <th>Nombre de postulations</th>
        <th>Actions</th>
        <th>Détails</th>
    </tr>
    <?php foreach ($etudiants as $etudiant): ?>
    <tr>
        <td><?= htmlspecialchars($etudiant['email']) ?></td>
        <td><?= htmlspecialchars($etudiant['nombre_postulations']) ?></td>
        <td>
            <a href="index.php?action=modifier_etudiant&id=<?= $etudiant['id'] ?>">Modifier</a> |
            <a href="index.php?action=supprimer_etudiant&id=<?= $etudiant['id'] ?>" onclick="return confirm('Supprimer cet étudiant ?')">Supprimer</a>
        </td>
        <td><a href="index.php?action=afficher_etudiant&id=<?= $etudiant['id'] ?>">Détails</a></td>
    </tr>
    <?php endforeach; ?>
</table>

<div>
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="index.php?action=etudiants&page=<?= $i ?>&search=<?= urlencode($searchTerm) ?>"><?= $i ?></a>
    <?php endfor; ?>
</div>

<!-- Lien pour créer un nouvel étudiant -->
<p><a href="index.php?action=creer_etudiant">Créer un étudiant</a></p>
