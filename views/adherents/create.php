<?php
require_once __DIR__ . '/../../app/Controllers/AdherentController.php';

$controller = new AdherentController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        "nom"              => $_POST["nom"],
        "prenom"           => $_POST["prenom"],
        "email"            => $_POST["email"],
        "telephone"        => $_POST["telephone"],
        "date_inscription" => date("Y-m-d"),
        "id_salle"         => $_POST["id_salle"]
    ];

    $controller->store($data);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>FitConnect — Ajouter</title>
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
        .field { margin-bottom: 20px; }
        .field label { display: block; font-size: 14px; font-weight: 600; color: #475569; margin-bottom: 8px; }
        .field input, .field select { width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 14px; outline: none; }
        .field input:focus, .field select:focus { border-color: #2563eb; box-shadow: 0 0 0 3px rgba(37,99,235,0.1); }
        
        .form-actions { display: flex; gap: 12px; margin-top: 25px; }
        .btn-submit { background: #10b981; color: #ffffff; border: none; padding: 10px 20px; font-size: 14px; font-weight: 600; border-radius: 6px; cursor: pointer; }
        .btn-submit:hover { background: #059669; }
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
            <h2>Ajouter un nouvel adhérent</h2>
            <form method="POST">
                <div class="field">
                    <label>Nom</label>
                    <input type="text" name="nom" placeholder="Ex: Alami" required>
                </div>
                <div class="field">
                    <label>Prénom</label>
                    <input type="text" name="prenom" placeholder="Ex: Youssef" required>
                </div>
                <div class="field">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Ex: youssef@mail.com" required>
                </div>
                <div class="field">
                    <label>Téléphone</label>
                    <input type="text" name="telephone" placeholder="Ex: 0612345678" required>
                </div>
                <div class="field">
                    <label>ID Salle</label>
                    <input type="number" name="id_salle" placeholder="Ex: 1" min="1" required>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn-submit">Enregistrer</button>
                    <a href="index.php" class="btn-cancel">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>