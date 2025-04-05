<!-- views/dashboard/dashboard_etudiant.php -->
<h2>Tableau de bord - Étudiant</h2>

<p>Bienvenue, <?= htmlspecialchars($_SESSION['email']) ?>. Vous êtes connecté en tant qu'étudiant.</p>

<h3>Gérer les sections :</h3>
<ul>
    <li><a href="index.php?action=liste_entreprises">Voir les entreprises</a></li>
    <li><a href="index.php?action=liste_offres_stage">Voir les offres de stage</a></li>
    <li><a href="index.php?action=wish_list">Voir ma wish list</a></li>
</ul>

<a href="index.php?action=logout">Se déconnecter</a>
