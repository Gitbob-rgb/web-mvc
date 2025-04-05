<!-- views/pilote/liste_pilotes.php -->
<h2>Liste des pilotes</h2>

<?php if (count($pilotes) > 0): ?>
    <table border="1">
        <tr>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($pilotes as $pilote): ?>
            <tr>
                <td><?= htmlspecialchars($pilote['email']) ?></td>
                <td>
                    <a href="index.php?action=modifier_pilote&id=<?= $pilote['id'] ?>">Modifier</a> |
                    <a href="index.php?action=supprimer_pilote&id=<?= $pilote['id'] ?>" onclick="return confirm('Supprimer ce pilote ?')">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>Aucun pilote trouvé.</p>
<?php endif; ?>

<a href="index.php?action=creer_pilote">Ajouter un nouveau pilote</a>
