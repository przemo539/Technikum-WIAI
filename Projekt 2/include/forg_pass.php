<center><h2>Zapomniałem hasła</h2>
<form method="POST">
<b>Podaj email:<input type="email" name="email" /></b>
<input type="submit" name="submit" value="Wyślij" />
</form></center>
<?php 
if(isset($_POST['submit'])){
echo '
		<div class="error" style="display:none; width: 800px; position:absolute; left:500px; top:80px;">
			<img class="icon" src="http://img1.wikia.nocookie.net/__cb20090628000146/nonsensopedia/images/7/75/Wykrzyknik.png" width="100"  alt="" />
			<h4>Błąd</h4>
			<p>
				Nie można wysłać przypomnienia hasła.
			</p>
		</div>
		<script type="text/javascript"> pokaz_error(); </script> ';
}?>