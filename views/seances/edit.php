<?php
require_once __DIR__ . '/../../app/Controllers/SeanceController.php';

$controller = new SeanceController();
$id = $_GET['id'];
$seance = $controller->show($id);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller->update($id, $_POST);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>FitConnect — Modifier une séance</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: sans-serif; }
        body { background: #f8fafc; color: #333; padding-bottom: 40px; }
        .container { max-width: 600px; margin: 0 auto; padding: 0 20px; }
        
        header { background: #ffffff; border-bottom: 1px solid #e2e8f0; padding: 20px 0; margin-bottom: 30px; }
        .nav { display: flex; justify-content: space-between; align-items: center; }
        .logo { font-size: 18px; font-weight: 700; color: #2563eb; }
        .nav-links a { color: #64748b; text-decoration: none; margin-left: 20px; font-size: 14px; }
        
        .box { background: #ffffff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; }
        .box h2 { font-size: 18px; margin-bottom: 20px; color: #0f172a; }
        .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
        .field { margin-bottom: 20px; }
        .field label { display: block; font-size: 14px; font-weight: 600; color: #475569; margin-bottom: 8px; }
        .field select, .field input { width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 14px; outline: none; }
        .field input:focus, .field select:focus { border-color: #2563eb; box-shadow: 0 0 0 3px rgba(37,99,235,0.1); }
        
        .form-actions { display: flex; gap: 12px; margin-top: 25px; }
        .btn-submit { background: #d97706; color: #ffffff; border: none; padding: 10px 20px; font-size: 14px; font-weight: 600; border-radius: 6px; cursor: pointer; }
        .btn-submit:hover { background: #b45309; }
        .btn-cancel { background: #f1f5f9; color: #64748b; text-decoration: none; padding: 10px 20px; font-size: 14px; border-radius: 6px; border: 1px solid #e2e8f0; }
        .btn-cancel:hover { background: #e2e8f0; }
    </style>
</head>
<body>
    <header>
        <div class="container nav">
            <div class="logo"><i class="ti ti-bolt"></i> FitConnect</div>
            <div class="nav-links">
                <a href="index.php">Retour à la liste</a>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="box">
            <h2>Modifier la séance #<?= htmlspecialchars($seance['id_seance']) ?></h2>
            <form method="POST">
                <div class="field">
                    <label>Activité</label>
                    <select name="type_activite" required>
                        <option value="Musculation" <?= $seance['type_activite'] == 'Musculation' ? 'selected' : '' ?>>Musculation</option>
                        <option value="Cardio" <?= $seance['type_activite'] == 'Cardio' ? 'selected' : '' ?>>Cardio</option>
                        <option value="Fitness" <?= $seance['type_activite'] == 'Fitness' ? 'selected' : '' ?>>Fitness</option>
                        <option value="Yoga" <?= $seance['type_activite'] == 'Yoga' ? 'selected' : '' ?>>Yoga</option>
                        <option value="Crossfit" <?= $seance['type_activite'] == 'Crossfit' ? 'selected' : '' ?>>Crossfit</option>
                    </select>
                </div>
                <div class="grid-2">
                    <div class="field">
                        <label>Date de la séance</label>
                        <input type="date" name="date_seance" value="<?= htmlspecialchars($seance['date_seance']) ?>" required>
                    </div>
                    <div class="field">
                        <label>Durée</label>
                        <input type="time" name="duree" value="<?= htmlspecialchars($seance['duree']) ?>" required>
                    </div>
                </div>
                <div class="field">
                    <label>Équipement</label>
                    <input type="text" name="equipement" value="<?= htmlspecialchars($seance['equipement']) ?>" required>
                </div>
                <div class="grid-2">
                    <div class="field">
                        <label>ID Salle</label>
                        <input type="number" name="id_salle" value="<?= htmlspecialchars($seance['id_salle']) ?>" min="1" required>
                    </div>
                    <div class="field">
                        <label>ID Adhérent</label>
                        <input type="number" name="id_adherent" value="<?= htmlspecialchars($seance['id_adherent']) ?>" min="1" required>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn-submit">Modifier</button>
                    <a href="index.php" class="btn-cancel">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>