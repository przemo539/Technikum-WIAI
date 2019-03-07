<center><h1>Dodaj kategorie</h1>
<?php
if(isset($_POST['submit_kat'])){
$nazwa = addslashes($_POST['nazwa_kat']);
$opis = addslashes($_POST['opis_kat']);
$ukryte = (int)$_POST['ukryte'];

$sql = mysql_query("insert into kategorie (`nazwa`, `opis`, `ukryte`) values ('".$nazwa."', '".$opis."', '".$ukryte."')");
if($sql){
echo '<div class="sukces" style="display:none; width: 800px; position:absolute; left:500px; top:80px;">
						<img class="icon" src="http://harimgh.files.wordpress.com/2012/03/19514-senyum.png?w=593" width="100"  alt="" />
						<h4>Sukces</h4>
						<p>
							Dodano kategorie
						</p>
					</div>
					<script type="text/javascript"> pokaz_sukces(); </script> ';
}else{
echo 'div class="error" style="display:none; width: 800px;  position:absolute; left:500px; top:80px;">
			<img class="icon" src="http://img1.wikia.nocookie.net/__cb20090628000146/nonsensopedia/images/7/75/Wykrzyknik.png" width="100"  alt="" />
			<h4>Błąd</h4>
			<p>
				Nie dodano kategori
			</p>
		</div>
		<script type="text/javascript"> pokaz_error(); </script> ';
}
}
?> 
<form method="POST" >
	<table>
		<tr>
			<td>Nazwa</td>
			<td><input type="text" name="nazwa_kat" /></td>
		</tr>
		<tr>
			<td>Opis</td>
			<td><textarea name="opis_kat" rows="10" cols="50"></textarea></td>
		</tr>
		<tr>
			<td>Ukryte?</td>
			<td><select name="ukryte">
					<option value="0">Nie</option>
					<option value="1">Tak</option>					
				</select> 
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="submit_kat" value="Dodaj" /></td>
		</tr>
	</table>
	</form>
	
<?php 
if(isset($_POST['submit3'])){
$kat_prod = $_POST['kat_prod'];
$nazwa = $_POST['nazwa_prod'];
$glowne_img = $_FILES['glowne_img']['tmp_name'];
$obrazek1 = $_FILES['obrazek1']['tmp_name'];
$obrazek2 = $_FILES['obrazek2']['tmp_name'];
$obrazek3 = $_FILES['obrazek3']['tmp_name'];
$obrazek4 = $_FILES['obrazek4']['tmp_name'];
$opis = $_POST['opis_prod'];
$cena = $_POST['cena'];
$sztuki = $_POST['sztuki'];

if(is_uploaded_file($glowne_img)) {
     move_uploaded_file($glowne_img, "img/product/".$_FILES['glowne_img']['name']);
   }
if(is_uploaded_file($obrazek1)) {
     move_uploaded_file($obrazek1,  "img/product/".$_FILES['obrazek1']['name']);
   }
if(is_uploaded_file($obrazek2)) {
     move_uploaded_file($obrazek2, "img/product/".$_FILES['obrazek2']['name']);
   }
if(is_uploaded_file($obrazek3)) {
     move_uploaded_file($obrazek3, "img/product/".$_FILES['obrazek3']['name']);
   }
if(is_uploaded_file($obrazek4)) {
     move_uploaded_file($obrazek4, "img/product/".$_FILES['obrazek4']['name']);
   }

$sql = mysql_query("insert into `produkty` (`id_kategori`, `nazwa`, `glowne_img`, `opis`, `data`, `cena`, `sztuki`, `obrazek1`, `obrazek2`, `obrazek3`, `obrazek4`) 
									values ('".$kat_prod."', '".$nazwa."', '".'img/product/'.$_FILES['glowne_img']['name']."', '".$opis."', now(), '".$cena."', '".$sztuki."', '".'img/product/'.$_FILES['obrazek1']['name']."'
									, '".'img/product/'.$_FILES['obrazek2']['name']."', '".'img/product/'.$_FILES['obrazek3']['name']."', '".'img/product/'.$_FILES['obrazek4']['name']."')");
if($sql){
echo '<div class="sukces" style="display:none; width: 800px; position:absolute; left:500px; top:80px;">
						<img class="icon" src="http://harimgh.files.wordpress.com/2012/03/19514-senyum.png?w=593" width="100"  alt="" />
						<h4>Sukces</h4>
						<p>
							Dodano produkt
						</p>
					</div>
					<script type="text/javascript"> pokaz_sukces(); </script> ';
}else{
echo 'div class="error" style="display:none; width: 800px;  position:absolute; left:500px; top:80px;">
			<img class="icon" src="http://img1.wikia.nocookie.net/__cb20090628000146/nonsensopedia/images/7/75/Wykrzyknik.png" width="100"  alt="" />
			<h4>Błąd</h4>
			<p>
				Nie dodano produktu
			</p>
		</div>
		<script type="text/javascript"> pokaz_error(); </script> ';
}
}
?>
	
	<h1>Dodaj Produkt</h1>
	<form method="POST" >
	<table>
		<tr>
			<td>Kategoria</td>
			<td><select name="kat_prod"><?php 
			$kategoria = mysql_query("Select * from kategorie");
			while($kategorie = mysql_fetch_assoc($kategoria)){
			echo '<option value="'.$kategorie['id'].'">'.$kategorie['nazwa'].'</option>';			
			}
			?>
			</select> </td>
		</tr>
		<tr>
			<td>Nazwa</td>
			<td><input type="text" name="nazwa_prod" /></td>
		</tr>
		<tr>
			<td>Główny obrazek</td>
			<td><input type="file" name="glowne_img" /></td>
		</tr>
		<tr>
			<td>Obrazek1</td>
			<td><input type="file" name="obrazek1" /></td>
		</tr>		
		<tr>
			<td>Obrazek2</td>
			<td><input type="file" name="obrazek2" /></td>
		</tr>		
		<tr>
			<td>Obrazek3</td>
			<td><input type="file" name="obrazek3" /></td>
		</tr>		
		<tr>
			<td>Obrazek4</td>
			<td><input type="file" name="obrazek4" /></td>
		</tr>
		<tr>
			<td>Opis</td>
			<td><textarea name="opis_prod" rows="10" cols="50"></textarea></td>
		</tr>
		<tr>
			<td>Cena:</td>
			<td><input type="text" name="cena" /></td>
		</tr>
		<tr>
			<td>Sztuki</td>
			<td><input type="number" name="sztuki" /></td>
		</tr>		
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="submit3" Value="Dodaj" /></td>
		</tr>
	</table>
		</form>
</center>