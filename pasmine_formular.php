<?php
include("session.php");
include("zaglavlje.html");
include("pdo.php");


$id = isset($_GET["id"]) ? $_GET["id"] : 0;

if($id != 0){
    $query = $db->query("SELECT * FROM pasmine WHERE id_pasmine = $id");
    $rezultati = $query->fetchAll();
    $id_pasmine = $rezultati[0]["id_pasmine"];
    $naziv_pasmine = $rezultati[0]["naziv_pasmine"];
    $vrsta = $rezultati[0]["vrsta"];
    $foto = $rezultati[0]["foto"];
}else{
    $id_pasmine = 0;
    $naziv_pasmine = "";
    $vrsta = 0;
    $foto = "";
}


?>
<h3>Nova pasmina</h3>

<div class="row" style="margin-top:36px">
	<div class="medium-12 large-12 columns">
    <form method="post" action="pasmine_sql.php" enctype="multipart/form-data" name="form" id="forma-pasmine">
    <input type="hidden" name="id_pasmine" value="<?php echo $id_pasmine;?>">
   Pasmina
    <select name="pasmina">
    <option value="0"> -- </option>
     <?php
        $query = $db->query("SELECT * FROM pasmine);
        $rezultati = $query->fetchAll();
        foreach($rezultati as $pas){
            if($pasmina == $pas["id_pasmine"]){
                $selected = " selected";
            }else{
                $selected = "";
            }
            echo "<option value='" . $pas["id_pasmine"] . "'$selected>" . $pas["naziv_pasmine"] . "</option>";
        }
    ?>   </select>
    Ime  
    <input type="text" name="naziv" value="<?php echo $naziv;?>">
	Vrsta 
    <select name="vrsta">
    <option value="0"> -- </option>
    <?php
        $query = $db->query("SELECT * FROM vrste");
        $rezultati = $query->fetchAll();
        foreach($rezultati as $vrs){
            if($vrsta == $vrs["id_vrste"]){
                $selected = "selected";
            }else{
                $selected = "";
            }
            echo "<option value='" . $vrs["id_vrste"] . "'" . 
            $selected ." >" . $vrs["naziv_vrste"] . "</option>";
        }
    ?>
    </select>
    
    Foto
    <input type="text" name="foto" value="<?php echo $foto;?>" >
    <?php
        if($foto == ""){
            $slika = "error.jpg";
        }else{
            $slika = $foto;
        }
    ?>
	<img src="slike/<?php echo $slika; ?>" width="150"><br><br>

    <input type="submit" name="submit" value="Dodaj/Uredi" class="button">
    </form>
    
    
    </div>
</div>    
<?php
include("podnozje.html");
?>