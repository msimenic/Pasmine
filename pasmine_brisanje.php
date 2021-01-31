<?php
include("session.php");
include("zaglavlje.html");
include("pdo.php");


$id = isset($_GET["id"]) ? $_GET["id"] : 0;

if($id != 0){
   	$upit = $db->query("DELETE FROM pasmine WHERE id_pasmine = " . $id);
	header("Location:pasmine.php");

	$rezultati = $query->fetchAll();
    $id_pasmine = $rezultati[0]["id_pasmine"];
    $naziv_pasmine = $rezultati[0]["naziv_pasmine"];
    $vrsta = $rezultati[0]["vrsta"];
    $foto = $rezultati[0]["foto"];
}else{
    $id_pasmine = 0;
    $naziv_pasmine = "";
    $vrsta = 0;
    $foto= "";
}
$query = $db->query("SELECT * FROM psi WHERE pasmina = " . $pasmina["id_pasmine"] . " ORDER BY broj_psa");
			$psi = $query->fetchAll();
			foreach($psi as $pas){
				echo $pas["broj_psa"] . ". " . $pas["naziv"]  ." <br>";
			}




 include("podnozje.html");


?>