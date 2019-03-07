<?php 
if(isset($_POST['submit2'])){
$login = addslashes($_POST['login']);
$haslo = md5($_POST['haslo'].'2014'.$login);
$sql = mysql_query("Select `id` from `konta` where `login`='".$login."' and`haslo`='".$haslo."'");
$sql = mysql_fetch_row($sql);

if($sql[0]){
zaloguj($login);
}else{
echo '
		<div class="error" style="display:none; width: 800px;  position:absolute; left:500px; top:80px;">
			<img class="icon" src="http://img1.wikia.nocookie.net/__cb20090628000146/nonsensopedia/images/7/75/Wykrzyknik.png" width="100"  alt="" />
			<h4>Błąd</h4>
			<p>
				Podany login i/lub hasło jest nie poprawny
			</p>
		</div>
		<script type="text/javascript"> pokaz_error(); </script> ';
}
}

if(!zalogowany()){
echo $_SESSION['login'];
?>
<center><h2>Logowanie:</h2>
<form method="POST">
<div id="kategorie">
<table>
<tr><td>Login:</td>
<td><input type="text" name="login" size="16"/></td></tr>
<tr><td>Hasło:</td>
<td><input type="password" name="hasło" size="16"/></td></tr>
<td>&nbsp;</td>
<td align="right"><input type="submit" name="submit2" value="Zaloguj"/></td>
</tr>
</table>
<a href="index.php?subpage=forg_pass" >Zapomniałeś hasła? </a><a href="index.php?subpage=registration">Rejestracja</a>

</div>
</form></center>
<?php 
}else{
echo '<div align="center"><h1 style="color:white;">Koszyk</h1><a href="index.php?subpage=cart"><img src="img/cart.png" width="120" /><br/>Obecnie w koszyku posiadasz '.licz_produkty().' rzeczy</a>';
echo'<br/><br/><a href="index.php?subpage=log_out"><big>Wyloguj</big></a>';
$admin = mysql_fetch_row(mysql_query("select `admin` from `konta` where `login`='".addslashes($_SESSION['login'])."'"));
if($admin[0] == 1){
echo '<br/><a href="index.php?subpage=admin"><strong>Panel Admina</strong></a>';
}
echo '</div>';
}
?>