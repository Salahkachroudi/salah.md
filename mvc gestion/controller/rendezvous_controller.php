<?php
require_once '../model/rendezvous.php'; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['date']) && isset($_POST['heure']) && isset($_POST['client'])) {
        $date = $_POST['date'];
        $heure = $_POST['heure'];
        $client = $_POST['client'];

        RendezVous::insert($date, $heure, $client);
        header("Location: rendezvous.php");
        exit();
    }
    
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    RendezVous::delete($id);
    header("Location: rendezvous.php");
    exit();
}

?>
