<!-- views/dashboard/dashboard_admin.php -->
<h2>Tableau de bord - Administrateur</h2>

<p>Bienvenue, <?= htmlspecialchars($_SESSION['email']) ?>. Vous êtes connecté en tant qu'administrateur.</p>

<h3>Gérer les sections :</h3>
<ul>
    <li><a href="index.php?action=liste_entreprises">Gérer les entreprises</a></li>
    <li><a href="liste_etudiants">Gérer les étudiants</a></li>
    <li><a href="index.php?action=liste_pilotes">Gérer les pilotes</a></li>
    <li><a href="index.php?action=liste_offres_stage">Gérer les offres de stage</a></li>
    <li><a href="index.php?action=wish_list">Gérer les wish list</a></li>
</ul>

<a href="index.php?action=logout">Se déconnecter</a>
