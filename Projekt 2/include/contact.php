<?php
if(isset($_POST['submit'])){
echo '
	<div class="error" style="display:none; width: 800px; position:absolute; left:500px; top:80px;">
    <img class="icon" src="http://img1.wikia.nocookie.net/__cb20090628000146/nonsensopedia/images/7/75/Wykrzyknik.png" width="100"  alt="" />
    <h4>Błąd</h4>
    <p>
        Nie udało się wysłać wiadomosci do naszego administratora
    </p>
</div>
<script type="text/javascript"> pokaz_error(); </script> ';
}
?>

<br/><br/><center>
<form method="POST">
<table>
	<tr>
		<td>
			Imie:
		</td>
		<td>
			<input type="text" name="name"/>
		</td>
	</tr>	
	<tr>
		<td>
			Nazwisko:
		</td>
		<td>
			<input type="text" name="surname"/>
		</td>
	</tr>	
	<tr>
		<td>
			Email:
		</td>
		<td>
			<input type="email" name="email"/>
		</td>
	</tr>
	<tr>
		<td>
			Temat:
		</td>
		<td>
			<input type="text" name="temat"/>
		</td>
	</tr>
	<tr>
		<td>
			Tresc:
		</td>
		<td>
			<textarea rows = "10" cols ="50">Tu wpisz wiadomość ;)</textarea>
		</td>
	</tr>	
	<tr>
		<td>
			<input type="reset" value="Wyczyść :)" />
		</td>
		<td>
			<input type="submit" name="submit" value="Wyślij :)" />
		</td>
	</tr>
	</table>
	</form>
	</center>