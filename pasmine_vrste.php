<?php
include("session.php");
include("zaglavlje.html");
include("pdo.php");

$id = isset($_GET["id"]) ? $_GET["id"] : 0;

if($id == 0){
	echo "<h1>Pasmine</h1>";
	$query = $db->query("SELECT * FROM pasmine");
}else{
	$query = $db->query("SELECT * FROM vrste WHERE id_vrste = " . $id);
	$rezultati = $query->fetchAll();
	echo "<h1>" . $rezultati[0]["naziv_vrste"] . "</h1>";
	$query = $db->query("SELECT * FROM pasmine WHERE vrsta = " . $id);
}


$rezultati = $query->fetchAll();

foreach($rezultati as $pasmina){
	echo "<div class=\"row\" style=\"margin-top:45px\">";
		echo "<div class=\"medium-3 large-3 columns\">";
			echo "<img src='slike/pas_" . $pasmina["id_pasmine"] . ".jpg'>";
		echo "</div>";
		echo "<div class=\"medium-9 large-9 columns\">";
			echo "<strong>" . $pasmina["naziv_pasmine"] . "</strong></br>";
		
			$query = $db->query("SELECT * FROM psi WHERE pasmina = " . $pasmina["id_pasmine"] . " ORDER BY broj_psa");
			$psi = $query->fetchAll();
			foreach($psi as $pas){
				echo $pas["broj_psa"] . ". " . $pas["naziv"] . " <br>";
			}
		echo "</div>";
	echo "</div>";
}
?>

<?php
include("podnozje.html");
?>