<!-- views/etudiant/offres_postulees.php -->
<h2>Offres de stage auxquelles vous avez postulé</h2>

<?php if (count($postulations) > 0): ?>
    <table border="1">
        <tr>
            <th>Titre</th>
            <th>Description</th>
            <th>Entreprise</th>
            <th>Date de début</th>
            <th>Date de fin</th>
        </tr>
        <?php foreach ($postulations as $postulation): ?>
            <tr>
                <td><?= htmlspecialchars($postulation['titre']) ?></td>
                <td><?= htmlspecialchars($postulation['description']) ?></td>
                <td><?= htmlspecialchars($postulation['entreprise_nom']) ?></td>
                <td><?= htmlspecialchars($postulation['date_debut']) ?></td>
                <td><?= htmlspecialchars($postulation['date_fin']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>Aucune offre de stage postulée.</p>
<?php endif; ?>

<a href="index.php?action=etudiants">Retour à la liste des étudiants</a>
