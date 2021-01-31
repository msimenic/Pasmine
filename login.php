<?php
include("zaglavlje.html");
include("pdo.php");


$submit = isset($_POST["Submit"]) ? $_POST["Submit"] : false;
$korisnicko_ime = isset($_POST["korisnicko_ime"]) ? $_POST["korisnicko_ime"] : "";
$lozinka = isset($_POST["lozinka"]) ? $_POST["lozinka"] : "";

if($submit == "Potvrdi"){
	$query = $db->query("SELECT * FROM admini WHERE korisnicko_ime = '$_POST[korisnicko_ime]' AND lozinka ='$_POST[lozinka]'"); 


	$rezultati = $query->fetchAll();
	if(count($rezultati) == 0){
		
		echo "<p style='color:#FF0000' align='center'>Pogrešno korisničko ime!</p>";
	}else{
		if($lozinka == $rezultati[0]["lozinka"]){
			
			session_start();
			$_SESSION["korisnik"] = $korisnicko_ime;
			$_SESSION["ime_i_prezime"] = $rezultati[0]["ime"] . " " . $rezultati[0]["prezime"];
			header("Location:pasmine.php");
		}else{
			
			echo "<p style='color:#FF0000' align='center'>Pogrešna lozinka!</p>";
		}
	}

}

?>

<div class="medium-12 medium-offset-12">
<p align="center">Prijava</p>
<form action="" method="post">
Korisničko ime (maja):<br>
<input type="text" name="korisnicko_ime"  /><br />
Lozinka (maja):<br>
<input type="password" name="lozinka" /><br />
<input type="submit" name="Submit"  value="Potvrdi" />
</form>
</div>
<?php
include("podnozje.html");
?>