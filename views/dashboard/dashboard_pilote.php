<!-- views/dashboard/dashboard_pilote.php -->
<h2>Tableau de bord - Pilote</h2>

<p>Bienvenue, <?= htmlspecialchars($_SESSION['email']) ?>. Vous êtes connecté en tant que pilote.</p>

<h3>Gérer les sections :</h3>
<ul>
    <li><a href="index.php?action=liste_entreprises">Gérer les entreprises</a></li>
    <li><a href="index.php?action=liste_etudiants">Gérer les étudiants</a></li>
    <li><a href="index.php?action=liste_offres_stage">Gérer les offres de stage</a></li>
</ul>

<a href="index.php?action=logout">Se déconnecter</a>
