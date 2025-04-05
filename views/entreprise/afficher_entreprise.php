<!-- views/entreprise/afficher_entreprise.php -->
<h2>Entreprise : <?= htmlspecialchars($entreprise['nom']) ?></h2>

<p><strong>Adresse :</strong> <?= htmlspecialchars($entreprise['adresse']) ?></p>
<p><strong>Email :</strong> <?= htmlspecialchars($entreprise['email']) ?></p>

<h3>Moyenne des notes :</h3>
<p>Note moyenne : <?= $moyenne ? number_format($moyenne, 2) : 'Pas encore de votes' ?></p>

<a href="index.php?action=noter_entreprise&id=<?= $entreprise['id'] ?>">Donner une note</a>

<a href="index.php?action=entreprises">Retour à la liste des entreprises</a>
