<?php
include("session.php");
include("zaglavlje.html");
include("pdo.php");

$query = $db->query("SELECT * FROM admini");
$rezultati = $query->fetchAll();
?>
<table align="center">
	<tr>
	<th>Admin-Korisnik</th>
	<th><a href="pristup_forma.php">Novi admin</a></th>
	<tr>
<?php

foreach($rezultati as $stavka){
	echo "<tr>
			<td>" . $stavka["ime"] . " " . $stavka["prezime"] . "</td>
		  	<td><a href=\"pristup_forma.php?id=" . $stavka["id"] . "\">uredi</a> | <a href=\"pristup_izmjena.php?akcija=brisanje&id=" . $stavka["id"] . "\"> obriši  </a></td>
		  </tr>";
}
?>
</table>
<?php
include("podnozje.html");
?>