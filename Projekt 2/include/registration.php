<?php
if(isset($_POST['submit'])){
$login = addslashes($_POST['login']);
$haslo = md5($_POST['haslo'].'2014'.$login);
$email = addslashes($_POST['email']);

$sprawdz_login = mysql_fetch_row(mysql_query("select `id` from `konta` where `login`='".$login."'"));

if($sprawdz_login){
	echo '
		<div class="error" style="display:none; width: 800px; position:absolute; left:500px; top:80px;">
			<img class="icon" src="http://img1.wikia.nocookie.net/__cb20090628000146/nonsensopedia/images/7/75/Wykrzyknik.png" width="100"  alt="" />
			<h4>Błąd</h4>
			<p>
				Wpisany Login jest już w naszej bazie. <br/>
				Proszę wprowadzić inny Login
			</p>
		</div>
		<script type="text/javascript"> pokaz_error(); </script> ';
}else{
		$sprawdz_email = mysql_fetch_row(mysql_query("select `id` from `konta` where `email`='".$email."'"));
		if($sprawdz_email){
			echo '
				<div class="error" style="display:none; width: 800px; position:absolute; left:500px; top:80px;">
					<img class="icon" src="http://img1.wikia.nocookie.net/__cb20090628000146/nonsensopedia/images/7/75/Wykrzyknik.png" width="100"  alt="" />
					<h4>Błąd</h4>
					<p>
						Wpisany Email jest już w naszej bazie. <br/>
						Proszę wprowadzić inny Email
					</p>
				</div>
				<script type="text/javascript"> pokaz_error(); </script> ';
		}else{
			$sql = mysql_query("INSERT INTO `konta` (`login`, `haslo`, `email`, `dodano`) values ('".$login."', '".$haslo."', '".$email."', now())");

			if($sql){
				echo '
					<div class="sukces" style="display:none; width: 800px; position:absolute; left:500px; top:80px;">
						<img class="icon" src="http://harimgh.files.wordpress.com/2012/03/19514-senyum.png?w=593" width="100"  alt="" />
						<h4>Sukces</h4>
						<p>
							Twoje konto zostalo poprawnie stworzone.</br>
							<b>Zaraz zostaniesz automatycznie zalogowany</b>
						</p>
					</div>
					<script type="text/javascript"> pokaz_sukces(); </script> ';
					zaloguj($login);
					header("Refresh:3; URL=index.php");
			}else{
				echo '
					<div class="error" style="display:none; width: 800px; position:absolute; left:500px; top:80px;">
						<img class="icon" src="http://img1.wikia.nocookie.net/__cb20090628000146/nonsensopedia/images/7/75/Wykrzyknik.png" width="100"  alt="" />
						<h4>Błąd</h4>
						<p>
							Przykro nam ale coś poszło nie tak. <br/>
							<b>Nie udało się stworzyć konta</b><br/>
							Spróbuj ponownie za chwile.
						</p>
					</div>
					<script type="text/javascript"> pokaz_error(); </script> ';
			}
		}

	}
}
?>

<center><h2>Rejestracja:</h2>
<form method="POST">

<table>
<tr><td>Login:</td>
<td><input type="text" name="login" size="30"/></td></tr>
<tr><td>Hasło:</td>
<td><input type="password" name="haslo" size="30"/></td></tr>
<tr><td>Email:</td>
<td><input type="email" name="email" size="30"/></td></tr>
<td><input type="reset" value="wyczyść" /></td>
<td align="right"><input type="submit" name="submit" value="Rejestruj"/></td>
</tr>
</table>



</form></center>