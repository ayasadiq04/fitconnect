<?php
require_once __DIR__ . '/../../app/Controllers/AbonnementController.php';

$controller = new AbonnementController();
$abonnements = $controller->index();

function typeClass($type) {
    $type = strtolower($type);
    if (str_contains($type, 'mensuel')) return 'mensuel';
    if (str_contains($type, 'trimestriel')) return 'trimestriel';
    if (str_contains($type, 'annuel')) return 'annuel';
    return 'default';
}

function statutClass($statut) {
    return strtolower($statut) == 'actif' ? 'actif' : 'expire';
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>FitConnect — Abonnements</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: sans-serif; }
        body { background: #f8fafc; color: #333; padding-bottom: 40px; }
        .container { max-width: 1000px; margin: 0 auto; padding: 0 20px; }
        
        header { background: #ffffff; border-bottom: 1px solid #e2e8f0; padding: 20px 0; margin-bottom: 30px; }
        .nav { display: flex; justify-content: space-between; align-items: center; }
        .logo { font-size: 18px; font-weight: 700; color: #2563eb; }
        .nav-links a { color: #64748b; text-decoration: none; margin-left: 20px; font-size: 14px; }
        .nav-links a.active { color: #2563eb; font-weight: 600; }
        
        .action-bar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        .btn-main { background: #2563eb; color: #ffffff; padding: 10px 18px; text-decoration: none; font-size: 14px; border-radius: 6px; font-weight: 600; }
        .btn-main:hover { background: #1d4ed8; }
        
        .box { background: #ffffff; padding: 24px; border-radius: 12px; border: 1px solid #e2e8f0; }
        .box h2 { font-size: 16px; font-weight: 700; color: #0f172a; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; font-size: 14px; }
        th { background: #f8fafc; text-align: left; padding: 12px; color: #64748b; font-weight: 600; border-bottom: 1px solid #e2e8f0; }
        td { padding: 14px 12px; border-bottom: 1px solid #f1f5f9; }
        tr:last-child td { border-bottom: none; }
        tr:hover td { background: #f8fafc; }
        
        .badge { padding: 4px 10px; border-radius: 6px; font-size: 12px; font-weight: 600; }
        .badge.mensuel { background: #eff6ff; color: #2563eb; }
        .badge.trimestriel { background: #ecfdf5; color: #10b981; }
        .badge.annuel { background: #f5f3ff; color: #8b5cf6; }
        .badge.default { background: #f1f5f9; color: #64748b; }
        
        .statut { padding: 4px 10px; border-radius: 6px; font-size: 12px; font-weight: 600; }
        .statut.actif { background: #ecfdf5; color: #10b981; }
        .statut.expire { background: #fef2f2; color: #ef4444; }
        
        .btn-edit { color: #b45309; text-decoration: none; font-weight: 600; margin-right: 12px; }
        .btn-del { color: #991b1b; text-decoration: none; font-weight: 600; }
        .empty { text-align: center; padding: 40px; color: #64748b; }
    </style>
</head>
<body>
    <header>
        <div class="container nav">
            <div class="logo"><i class="ti ti-bolt"></i> FitConnect</div>
            <div class="nav-links">
                <a href="../dashboard/index.php">Dashboard</a>
                <a href="../adherents/index.php">Adhérents</a>
                <a href="index.php" class="active">Abonnements</a>
                <a href="../seances/index.php">Séances</a>
                <a href="../salles/index.php">Salles</a>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="action-bar">
            <a href="create.php" class="btn-main"><i class="ti ti-plus"></i> Ajouter un abonnement</a>
        </div>

        <div class="box">
            <h2>Liste des abonnements (<?= count($abonnements) ?>)</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Type</th>
                        <th>Date Début</th>
                        <th>Date Fin</th>
                        <th>Statut</th>
                        <th>ID Adhérent</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($abonnements)): ?>
                        <tr><td colspan="7" class="empty">Aucun abonnement trouvé.</td></tr>
                    <?php else: ?>
                        <?php foreach ($abonnements as $abonnement): ?>
                        <tr>
                            <td><strong>#<?= $abonnement['id_abonnement'] ?></strong></td>
                            <td>
                                <span class="badge <?= typeClass($abonnement['type_abonnement']) ?>">
                                    <?= htmlspecialchars($abonnement['type_abonnement']) ?>
                                </span>
                            </td>
                            <td><?= htmlspecialchars($abonnement['date_debut']) ?></td>
                            <td><?= htmlspecialchars($abonnement['date_fin']) ?></td>
                            <td>
                                <span class="statut <?= statutClass($abonnement['statut']) ?>">
                                    <?= htmlspecialchars($abonnement['statut']) ?>
                                </span>
                            </td>
                            <td>#<?= $abonnement['id_adherent'] ?></td>
                            <td>
                                <a href="edit.php?id=<?= $abonnement['id_abonnement'] ?>" class="btn-edit">Modifier</a>
                                <a href="../../app/Controllers/AbonnementController.php?action=delete&id=<?= $abonnement['id_abonnement'] ?>" 
                                   class="btn-del" 
                                   onclick="return confirm('Supprimer cet abonnement ?');">Supprimer</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>