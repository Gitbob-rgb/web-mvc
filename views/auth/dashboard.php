<!-- views/auth/dashboard.php -->
<h2>Bienvenue, <?= htmlspecialchars($_SESSION['email']) ?></h2>

<p>Vous êtes connecté en tant que <?= htmlspecialchars($_SESSION['role']) ?>.</p>

<?php if ($_SESSION['role'] == 'admin'): ?>
    <p><a href="index.php?action=admin_dashboard">Accéder au tableau de bord administrateur</a></p>
<?php elseif ($_SESSION['role'] == 'pilote'): ?>
    <p><a href="index.php?action=pilote_dashboard">Accéder au tableau de bord pilote</a></p>
<?php elseif ($_SESSION['role'] == 'etudiant'): ?>
    <p><a href="index.php?action=etudiant_dashboard">Accéder au tableau de bord étudiant</a></p>
<?php endif; ?>

<a href="index.php?action=logout">Se déconnecter</a>
