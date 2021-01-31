<?php
include("session.php");
include("pdo.php");

if($_POST["submit"] == "Odustani"){
	header("Location:pasmine.php");
}


if($_FILES["slika"]["name"]){

	$putanja = "slike/"; 
	move_uploaded_file($_FILES["slika"]["tmp_name"], $putanja . $_FILES["slika"]["name"]);


	$uploadana_slika = $_FILES["slika"]["name"];

}else{
	$uploadana_slika = $_POST["foto"];
}

if($_POST["id_pasmine"] > 0 && $_POST["submit"] == "Dodaj/Uredi" ){
	$upit = $db->query("UPDATE pasmine SET 
		naziv_pasmine = '" . $_POST["naziv_pasmine"] . "',
		vrsta = '" . $_POST["vrsta"] . "',
		foto = '" . $uploadana_slika . "'
		WHERE
		id_pasmine = " . $_POST["id_pasmine"] . "

		");
	header("Location:pasmine.php");


}elseif($_POST["id_pasmine"] > 0 && $_POST["submit"] == "Potvrdi" ){
	$upit = $db->query("DELETE FROM pasmine WHERE id_pasmine= " . $_POST["id_pasmine"]);
	header("Location:pasmine.php");


}elseif($_POST["id_pasmine"] == 0){
	$upit = $db->query("INSERT INTO pasmine
		(naziv_pasmine, vrsta, foto) VALUES
		('" . $_POST["naziv_pasmine"] . "',
		'" . $_POST["vrsta"] . "',
		'" . $uploadana_slika . "')
		");
	header("Location:pasmine.php");

}elseif($_POST["id_pasmine"]  == 0) {
	$upit = $db->query("DELETE FROM pasmine WHERE id_pasmine = " . $_POST["id_pasmine"]);
	header("Location:albumi.php");

}
?>
