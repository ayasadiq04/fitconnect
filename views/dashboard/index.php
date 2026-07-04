<?php
require_once __DIR__ . '/../../app/Repositories/AdherentRepository.php';
require_once __DIR__ . '/../../app/Repositories/AbonnementRepository.php';
require_once __DIR__ . '/../../app/Repositories/SeanceRepository.php';
require_once __DIR__ . '/../../app/Repositories/SalleRepository.php';

$adherentRepository = new AdherentRepository();
$abonnementRepository = new AbonnementRepository();
$seanceRepository = new SeanceRepository();
$salleRepository = new SalleRepository();

$nombreAdherents   = $adherentRepository->count();
$nombreAbonnements = $abonnementRepository->count();
$nombreSeances     = $seanceRepository->count();
$nombreSalles      = $salleRepository->count();

$derniersAdherents = $adherentRepository->findAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>FitConnect — Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: system-ui, sans-serif; }
        body { background: #f8fafc; color: #1e293b; padding-bottom: 40px; }
        .container { max-width: 1000px; margin: 0 auto; padding: 0 20px; }
        
        header { background: #ffffff; border-bottom: 1px solid #e2e8f0; padding: 20px 0; margin-bottom: 30px; }
        .nav { display: flex; justify-content: space-between; align-items: center; }
        .logo { font-size: 18px; font-weight: 700; color: #2563eb; }
        .nav-links a { color: #64748b; text-decoration: none; margin-left: 20px; font-size: 14px; }
        .nav-links a.active { color: #2563eb; font-weight: 600; }
        
        .grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 30px; }
        .card { background: #ffffff; padding: 24px; border-radius: 12px; border: 1px solid #e2e8f0; }
        .card h3 { font-size: 13px; color: #64748b; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px; }
        .card .val { font-size: 32px; font-weight: 700; color: #0f172a; margin-bottom: 16px; }
        .card-actions { display: flex; justify-content: space-between; align-items: center; }
        .btn-add { background: #eff6ff; color: #2563eb; padding: 6px 12px; text-decoration: none; font-size: 13px; border-radius: 6px; font-weight: 600; }
        .btn-add:hover { background: #2563eb; color: #ffffff; }
        .link-view { font-size: 13px; color: #64748b; text-decoration: none; }
        .link-view:hover { color: #0f172a; }
        
        .box { background: #ffffff; padding: 24px; border-radius: 12px; border: 1px solid #e2e8f0; }
        .box h2 { font-size: 16px; font-weight: 700; margin-bottom: 20px; color: #0f172a; }
        table { width: 100%; border-collapse: collapse; font-size: 14px; }
        th { background: #f8fafc; text-align: left; padding: 12px; color: #64748b; font-weight: 600; border-bottom: 1px solid #e2e8f0; }
        td { padding: 14px 12px; border-bottom: 1px solid #f1f5f9; color: #334155; }
        tr:last-child td { border-bottom: none; }
        tr:hover td { background: #f8fafc; }
    </style>
</head>
<body>
    <header>
        <div class="container nav">
            <div class="logo"><i class="ti ti-bolt"></i> FitConnect</div>
            <div class="nav-links">
                <a href="#" class="active">Dashboard</a>
                <a href="../adherents/index.php">Adhérents</a>
                <a href="../abonnements/index.php">Abonnements</a>
                <a href="../seances/index.php">Séances</a>
                <a href="../salles/index.php">Salles</a>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="grid">
            <div class="card">
                <h3>Adhérents</h3>
                <div class="val"><?= $nombreAdherents ?></div>
                <div class="card-actions">
                    <a href="../adherents/create.php" class="btn-add">+ Ajouter</a>
                    <a href="../adherents/index.php" class="link-view">Voir tout</a>
                </div>
            </div>
            <div class="card">
                <h3>Abonnements</h3>
                <div class="val"><?= $nombreAbonnements ?></div>
                <div class="card-actions">
                    <a href="../abonnements/create.php" class="btn-add">+ Ajouter</a>
                    <a href="../abonnements/index.php" class="link-view">Voir tout</a>
                </div>
            </div>
            <div class="card">
                <h3>Séances</h3>
                <div class="val"><?= $nombreSeances ?></div>
                <div class="card-actions">
                    <a href="../seances/create.php" class="btn-add">+ Ajouter</a>
                    <a href="../seances/index.php" class="link-view">Voir tout</a>
                </div>
            </div>
            <div class="card">
                <h3>Salles</h3>
                <div class="val"><?= $nombreSalles ?></div>
                <div class="card-actions">
                    <a href="../salles/create.php" class="btn-add">+ Ajouter</a>
                    <a href="../salles/index.php" class="link-view">Voir tout</a>
                </div>
            </div>
        </div>

        <div class="box">
            <h2>Derniers adhérents inscrits</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom & Prénom</th>
                        <th>Email</th>
                        <th>Date d'inscription</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $compteur = 0;
                    foreach (array_reverse($derniersAdherents) as $adherent):
                        if ($compteur == 5) break;
                    ?>
                    <tr>
                        <td>#<?= $adherent['id_adherent'] ?></td>
                        <td><?= htmlspecialchars($adherent['nom'] . ' ' . $adherent['prenom']) ?></td>
                        <td><?= htmlspecialchars($adherent['email']) ?></td>
                        <td><?= $adherent['date_inscription'] ?></td>
                    </tr>
                    <?php $compteur++; endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>