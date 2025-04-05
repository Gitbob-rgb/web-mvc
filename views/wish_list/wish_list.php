<!-- views/wish_list/wish_list.php -->
<h2>Ma Wish List</h2>

<?php if (count($wishList) > 0): ?>
    <table border="1">
        <tr>
            <th>Titre</th>
            <th>Description</th>
            <th>Entreprise</th>
            <th>Date de début</th>
            <th>Date de fin</th>
            <th>Spécialité</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($wishList as $offre): ?>
            <tr>
                <td><?= htmlspecialchars($offre['titre']) ?></td>
                <td><?= htmlspecialchars($offre['description']) ?></td>
                <td><?= htmlspecialchars($offre['entreprise_nom']) ?></td>
                <td><?= htmlspecialchars($offre['date_debut']) ?></td>
                <td><?= htmlspecialchars($offre['date_fin']) ?></td>
                <td><?= htmlspecialchars($offre['specialite']) ?></td>
                <td>
                    <a href="index.php?action=supprimer_wish_list&offre_stage_id=<?= $offre['id'] ?>" onclick="return confirm('Supprimer cette offre de la wish list ?')">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>Vous n'avez aucune offre dans votre wish list.</p>
<?php endif; ?>

<h3>Ajouter une nouvelle offre à ma Wish List</h3>

<?php if (count($offres) > 0): ?>
    <ul>
        <?php foreach ($offres as $offre): ?>
            <li>
                <?= htmlspecialchars($offre['titre']) ?> - 
                <a href="index.php?action=ajouter_wish_list&offre_stage_id=<?= $offre['id'] ?>">Ajouter à ma Wish List</a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Aucune offre de stage n'est disponible à ajouter pour le moment.</p>
<?php endif; ?>

<a href="index.php?action=offres_stage">Retour aux offres de stage</a>
