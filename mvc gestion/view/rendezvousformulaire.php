<?php
require_once __DIR__ . '/../model/rendezvous.php'; 

$liste = RendezVous::getAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des Rendez-vous</title>
    <style>
        table {
            border-collapse: collapse;
            width: 70%;
        }
        th, td {
            border: 1px solid #aaa;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #eee;
        }
    </style>
</head>
<body>

    <h1>Gestion des Rendez-vous</h1>
    

    <a href="ajout.php">➕ Ajouter un nouveau rendez-vous</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Heure</th>
            <th>Client</th>
            <th>Action</th>
        </tr>
        <?php if (!empty($liste)): ?>
            <?php foreach ($liste as $rdv): ?>
                <tr>
                    <td><?= htmlspecialchars($rdv->id) ?></td>
                    <td><?= htmlspecialchars($rdv->date) ?></td>
                    <td><?= htmlspecialchars($rdv->heure) ?></td>
                    <td><?= htmlspecialchars($rdv->client) ?></td>
                    <td>
                        <a href="modifier.php?id=<?= $rdv->id ?>">✏️ Modifier</a> |
                        <a href="rendezvous.php?delete=<?= $rdv->id ?>" onclick="return confirm('Supprimer ce rendez-vous ?')">🗑️ Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="5">Aucun rendez-vous trouvé.</td></tr>
        <?php endif; ?>
    </table>

</body>
</html>
