<?php
require_once '../model/rendezvous.php'; 


if (!isset($_GET['id'])) {
    header("Location: rendezvous.php");
    exit();
}

$id = $_GET['id'];
$liste = RendezVous::getAll();
$rdv = null;

foreach ($liste as $item) {
    if ($item->id == $id) {
        $rdv = $item;
        break;
    }
}

if (!$rdv) {
    echo "Rendez-vous introuvable.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier le Rendez-vous</title>
</head>
<body>
    <h1>Modifier le Rendez-vous</h1>
    <form action="rendezvous_controller.php" method="post">
        <input type="hidden" name="id" value="<?= $rdv->id ?>">

        <label for="date">Date :</label>
        <input type="date" name="date" value="<?= $rdv->date ?>" required><br>

        <label for="heure">Heure :</label>
        <input type="time" name="heure" value="<?= $rdv->heure ?>" required><br>

        <label for="client">Nom du Client :</label>
        <input type="text" name="client" value="<?= $rdv->client ?>" required><br>

        <input type="submit" name="update" value="Modifier">
    </form>
</body>
</html>
