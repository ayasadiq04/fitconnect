<?php
require_once __DIR__ . '/../../app/Controllers/SeanceController.php';

$controller = new SeanceController();
$seances = $controller->index();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>FitConnect — Séances</title>
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
        
        .badge-activity { background: #eff6ff; color: #2563eb; padding: 4px 10px; border-radius: 6px; font-size: 13px; font-weight: 600; display: inline-block; }
        .badge-yoga { background: #f0fdf4; color: #16a34a; }
        .badge-muscu { background: #fef3c7; color: #d97706; }
        .badge-cardio { background: #fef2f2; color: #dc2626; }
        .badge-pilates { background: #faf5ff; color: #9333ea; }
        
        .btn-edit { color: #b45309; text-decoration: none; font-weight: 600; margin-right: 12px; }
        .btn-del { color: #991b1b; text-decoration: none; font-weight: 600; }
        .empty { text-align: center; padding: 40px; color: #64748b; }
        
        .info-sub { color: #94a3b8; font-size: 12px; }
    </style>
</head>
<body>
    <header>
        <div class="container nav">
            <div class="logo"><i class="ti ti-bolt"></i> FitConnect</div>
            <div class="nav-links">
                <a href="../dashboard/index.php">Dashboard</a>
                <a href="../adherents/index.php">Adhérents</a>
                <a href="../abonnements/index.php">Abonnements</a>
                <a href="index.php" class="active">Séances</a>
                <a href="../salles/index.php">Salles</a>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="action-bar">
            <a href="create.php" class="btn-main"><i class="ti ti-plus"></i> Ajouter une séance</a>
        </div>

        <div class="box">
            <h2>Liste des séances (<?= count($seances) ?>)</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Activité</th>
                        <th>Date</th>
                        <th>Durée</th>
                        <th>Équipement</th>
                        <th>Salle</th>
                        <th>Adhérent</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($seances)): ?>
                        <tr>
                            <td colspan="8" class="empty">
                                <i class="ti ti-calendar-off" style="font-size: 32px; display: block; margin-bottom: 10px;"></i>
                                Aucune séance trouvée.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($seances as $seance): 
                            // Déterminer la classe du badge selon l'activité
                            $badgeClass = 'badge-activity';
                            $type = strtolower($seance['type_activite'] ?? '');
                            if (strpos($type, 'yoga') !== false) $badgeClass .= ' badge-yoga';
                            elseif (strpos($type, 'musc') !== false || strpos($type, 'halt') !== false) $badgeClass .= ' badge-muscu';
                            elseif (strpos($type, 'cardio') !== false || strpos($type, 'course') !== false) $badgeClass .= ' badge-cardio';
                            elseif (strpos($type, 'pilates') !== false) $badgeClass .= ' badge-pilates';
                        ?>
                        <tr>
                            <td><strong>#<?= htmlspecialchars($seance['id_seance']) ?></strong></td>
                            <td>
                                <span class="<?= $badgeClass ?>">
                                    <i class="ti ti-<?= 
                                        strpos($type, 'yoga') !== false ? 'peace' : 
                                        (strpos($type, 'musc') !== false ? 'barbell' : 
                                        (strpos($type, 'cardio') !== false ? 'run' : 
                                        (strpos($type, 'pilates') !== false ? 'stretching' : 'activity'))) 
                                    ?>"></i>
                                    <?= htmlspecialchars($seance['type_activite']) ?>
                                </span>
                            </td>
                            <td><?= htmlspecialchars($seance['date_seance']) ?></td>
                            <td><?= htmlspecialchars($seance['duree']) ?> min</td>
                            <td><?= htmlspecialchars($seance['equipement'] ?: '—') ?></td>
                            <td>
                                <?= htmlspecialchars($seance['nom_salle'] ?? 'Salle #' . $seance['id_salle']) ?>
                                <br><span class="info-sub">ID: <?= htmlspecialchars($seance['id_salle']) ?></span>
                            </td>
                            <td>
                                <?= htmlspecialchars(($seance['prenom_adherent'] ?? '') . ' ' . ($seance['nom_adherent'] ?? '')) ?>
                                <br><span class="info-sub">ID: <?= htmlspecialchars($seance['id_adherent']) ?></span>
                            </td>
                            <td>
                                <a href="edit.php?id=<?= htmlspecialchars($seance['id_seance']) ?>" class="btn-edit">
                                    <i class="ti ti-edit"></i> Modifier
                                </a>
                                <a href="../../app/Controllers/SeanceController.php?action=delete&id=<?= htmlspecialchars($seance['id_seance']) ?>" 
                                   class="btn-del" 
                                   onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette séance ?');">
                                    <i class="ti ti-trash"></i> Supprimer
                                </a>
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