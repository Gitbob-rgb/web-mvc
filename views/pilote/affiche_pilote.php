<!-- views/pilote/affiche_pilote.php -->
<h2>Entreprises notées par le pilote : <?= htmlspecialchars($pilote['email']) ?></h2>

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
    <p>Ce pilote n'a pas encore noté d'entreprises.</p>
<?php endif; ?>

<a href="index.php?action=liste_pilotes">Retour à la liste des pilotes</a>
