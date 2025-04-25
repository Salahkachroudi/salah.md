<?php 
class RendezVous {

    public $id;
    public $date;
    public $heure;
    public $client;

    public static function getAll() {
        $c = new PDO("mysql:host=localhost;dbname=rdv", "root", "");
        $rq = "SELECT * FROM rendezvous";
        $stm = $c->prepare($rq);
        $stm->execute();
        $resultat = $stm->fetchAll(PDO::FETCH_CLASS, "RendezVous");
        return $resultat;
    }

    public static function delete($id) {
        $c = new PDO("mysql:host=localhost;dbname=rdv", "root", "");
        $rq = "DELETE FROM rendezvous WHERE id = :id";
        $stm = $c->prepare($rq);
        $stm->execute(["id" => $id]);
    }

    public static function insert($date, $heure, $client) {
        $c = new PDO("mysql:host=localhost;dbname=rdv", "root", "");
        $rq = "INSERT INTO rendezvous VALUES (NULL, :date, :heure, :client)";
        $stm = $c->prepare($rq);
        $stm->execute([
            "date" => $date,
            "heure" => $heure,
            "client" => $client
        ]);
    }
    public static function update($id, $date, $heure, $client) {
        $c = new PDO("mysql:host=localhost;dbname=rdv", "root", "");
        $rq = "UPDATE rendezvous SET date = :date, heure = :heure, client = :client WHERE id = :id";
        $stm = $c->prepare($rq);
        $stm->execute([
            "id" => $id,
            "date" => $date,
            "heure" => $heure,
            "client" => $client
        ]);
    }
    
}
?>
