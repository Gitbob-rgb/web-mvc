<!-- views/etudiant/affiche_etudiant.php -->
<h2>Détails de l'étudiant</h2>

<p><strong>Email :</strong> <?= htmlspecialchars($etudiant['email']) ?></p>


<!-- Lien vers les offres de stage auxquelles l'étudiant a postulé -->
<h3>Voir les offres de stage auxquelles cet étudiant a postulé :</h3>
<a href="index.php?action=voirPostulations&id=<?= $etudiant['id'] ?>">Voir les offres postulées par cet étudiant</a>

<!-- Liste des entreprises notées par l'étudiant -->
<h3>Entreprises notées par cet étudiant :</h3>

<?php if (count($notations) > 0): ?>
    <table border="1">
        <tr>
            <th>Entreprise</th>
            <th>Note</th>
        </tr>
        <?php foreach ($notations as $notation): ?>
            <tr>
                <td><?= htmlspecialchars($notation['entreprise_nom']) ?></td>
                <td><?= htmlspecialchars($notation['note']) ?> étoiles</td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>Cet étudiant n'a pas encore noté d'entreprises.</p>
<?php endif; ?>

<a href="index.php?action=etudiants">Retour à la liste des étudiants</a>