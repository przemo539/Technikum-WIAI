<?php 
if(isset($_POST['submit'])){
echo '<div class="sukces" style="display:none; width: 800px; position:absolute; left:500px; top:80px;">
						<img class="icon" src="http://harimgh.files.wordpress.com/2012/03/19514-senyum.png?w=593" width="100"  alt="" />
						<h4>Sukces</h4>
						<p>
							Zamówienie było by zrealizowane gdyby był to sklep ;P
						</p>
					</div>
					<script type="text/javascript"> pokaz_sukces(); </script> ';
mysql_query("delete from `koszyk` where `login` = '".addslashes($_SESSION['login'])."'");
}
?>
<center><h1>Koszyk</h1>
<?php
$sql=mysql_fetch_row(mysql_query("select `zakupy` from `koszyk` where `login`='".addslashes($_SESSION['login'])."'"));
if($sql[0]){
	$tablica = explode(",", $sql[0]);
    
	$tab_lista = array_fill_keys($tablica, 0);
		
    foreach($tablica as $element)
    {
    if(isset($tab_lista[$element]))
    {
    $tab_lista[$element]++;
    }
    }
?>
<table border="1">
	<tr>
		<td width="250">Produkt</td>
		<td width="90">Sztuki</td>
		<td width="90">Cena(szt)</td>
		<td width="90">Cena</td>
	</tr>
<?php
	$cena = 0;
	for($i=1;$i<=count($tab_lista);$i++){
		$produkt = each($tab_lista);
		$sql = "Select * from `produkty` where `id`='".$produkt['key']."'";
		$dane_produktu = mysql_fetch_assoc(mysql_query($sql));
		echo'<tr>
			<td><b>'.$dane_produktu['nazwa'].'</b></td>
			<td><b>'.$produkt['value'].'</b></td>
			<td><b>'.$dane_produktu['cena'].' zł</b></td>
			<td><b>'.$produkt['value']*$dane_produktu['cena'].' zł</b></td>
			</tr>';
		$cena += $produkt['value']*$dane_produktu['cena'];
	}
?>

	<tr>
		<td colspan="4"><br/></td>
	</tr>
	<tr>
		<td colspan="3" width="440"><b>Przesyłka</b></td>
		<td width="90"><b>20 zł</b></td>
	</tr>	
	<tr>
		<td colspan="3" width="440"><b>Sumaryczny koszt zakupów</b></td>
		<td width="90"><b><?php echo $cena+20;?> zł</b></td>
	</tr>
	</table>
	<h1>Dane do wysyłki</h1>
<form method="POST">
<table>
	<tr>
		<td>Imię:</td>
		<td><input type="text" name="imie" /></td>
	</tr>
	<tr>
		<td>Nazwisko:</td>
		<td><input type="text" name="nazwisko" /></td>
	</tr>
	<tr>
		<td>Adres:</td>
		<td><input type="adress" name="adres" /></td>
	</tr>	
	<tr>
		<td>Kod pocztowy:</td>
		<td><input type="text" name="kod" size="2" />-<input type="text" name="kod" size="3" /></td>
	</tr>
	<tr>
		<td>Numer telefonu:</td>
		<td><input type="tel" name="tel" /></td>
	</tr>
	<tr>
		<td><input type="hidden" name="cena" value="<?php echo $cena;?>"/></td>
		<td><input type="submit" name="submit" Value="Złóż zamówienie" /></td>
	</tr>
	</table>
</center>
<?php
}else{
echo'Twój koszyk jest pusty :)';
}?>