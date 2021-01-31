<?php
include("session.php");
include("zaglavlje.html");
include("pdo.php");

$id = isset($_GET["id"]) ? $_GET["id"] : 0;

if($id == 0){
	echo "<h3>Pasmine <small>(<a href='pasmine_formular.php'>dodaj novu pasminu </a>)</small></h3>";
	$query = $db->query("SELECT * FROM pasmine");
}else{
	$query = $db->query("SELECT * FROM vrste WHERE id_vrste = " . $id);
	$rezultati = $query->fetchAll( );
	echo "<h1>" . $rezultati[0]["naziv_pasmine"] . "</h1> <br> ";
	$query = $db->query("SELECT * FROM pasmine WHERE vrsta= " . $id)  ;
	
}



$rezultati = $query->fetchAll();

foreach($rezultati as $pasmina){
	echo "<div class=\"row\" style=\"margin-top:46px\">";
		echo "<div class=\"medium-4 large-4 columns\">";
			echo "<img src='slike/" . $pasmina["foto"] . "'>";
		echo "</div>";
		echo "<div class=\"medium-4 large-4 columns\">";
			echo "<strong>" . $pasmina["naziv_pasmine"] . "</strong></br>";
		
			$query = $db->query("SELECT * FROM psi WHERE pasmina = " . $pasmina["id_pasmine"] . " ORDER BY broj_psa");
			$psi = $query->fetchAll();
			foreach($psi as $pas){
				echo $pas["broj_psa"] . ". " . $pas["naziv"]  ." <br>";
			}
		echo "</div>";
		echo "<div class=\"medium-4 large-4 columns\">";
		echo "<a href='pasmine_formular.php?id=" . $pasmina["id_pasmine"] . "'>uredi</a><br><a href='pasmine_brisanje.php?id=" . $pasmina["id_pasmine"] . "'>obriši</a>";
		echo "</div>";

	echo "</div>";
}
?>

<?php
include("podnozje.html");
?>