<?php
include("session.php");
include("zaglavlje.html");
include("pdo.php");

$query = $db->query("SELECT * FROM vrste");
$rezultati = $query->fetchAll();
?>
<table align="center">
	<tr>
	<th> Vrste </th>
	<th></th>
	<tr>
<?php

foreach($rezultati as $stavka){
	echo "<tr>
			<td><a href='pasmine_vrste.php?id=" . $stavka["id_vrste"] . "'>" . $stavka["naziv_vrste"] . "</a></td>
		  	<td>";
	
	$query = $db->query("SELECT * FROM pasmine WHERE vrsta = " . $stavka["id_vrste"]);
	$vrste = $query->fetchAll();
	foreach($vrste as $slikica){
		echo "<img src='slike/" . $slikica["foto"] . "' width='190' height='190'>";
	}


	echo "</td>
		  </tr>";
}
?>
</table>
<?php
include("podnozje.html");
?>