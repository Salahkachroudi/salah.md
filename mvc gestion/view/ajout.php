<?php
require_once '../model/rendezvous.php';   

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['date']) && !empty($_POST['heure']) && !empty($_POST['client'])) {
        $date = $_POST['date'];
        $heure = $_POST['heure'];
        $client = $_POST['client'];

        RendezVous::insert($date, $heure, $client);

        header("Location: rendezvous.php");
        exit();
    } else {
        $error = "Tous les champs sont obligatoires.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un Rendez-vous</title>
</head>
<body>
    <h1>Ajouter un Rendez-vous</h1>
    <?php if (!empty($error)): ?>
        <p style="color:red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <form action="rendezvous_controller.php" method="post">
        <label for="date">Date :</label>
        <input type="date" name="date" required><br>

        <label for="heure">Heure :</label>
        <input type="time" name="heure" required><br>

        <label for="client">Nom du Client :</label>
        <input type="text" name="client" required><br>

        <input type="submit" value="Ajouter">
    </form>
</body>
</html>
