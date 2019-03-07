<?php 
function dodaj_produkt_do_koszyka($id_produktu){
	if(zalogowany()){
	$sql = mysql_fetch_row(mysql_query("Select `id` from `koszyk` where `login`='".addslashes($_SESSION['login'])."'"));
	
	if($sql[0] > 0){
		mysql_query("update `koszyk` set `zakupy`=CONCAT(zakupy, ',', '$id_produktu')");
	}else{
		mysql_query("insert into `koszyk` (`login`, `zakupy`) values ('".addslashes($_SESSION['login'])."', '".$id_produktu."')");
	}
	echo '<div class="sukces" style="display:none; width: 800px; position:absolute; left:500px; top:80px;">
						<img class="icon" src="http://harimgh.files.wordpress.com/2012/03/19514-senyum.png?w=593" width="100"  alt="" />
						<h4>Sukces</h4>
						<p>
							Produkt został poprawnie dodany do koszyka :)
						</p>
					</div>
					<script type="text/javascript"> pokaz_sukces(); </script> ';
	}else{
	echo '
		<div class="error" style="display:none; width: 800px;  position:absolute; left:500px; top:80px;">
			<img class="icon" src="http://img1.wikia.nocookie.net/__cb20090628000146/nonsensopedia/images/7/75/Wykrzyknik.png" width="100"  alt="" />
			<h4>Błąd</h4>
			<p>
				Aby móc robić zakupy w naszym sklepie musisz się zalogować ;)
			</p>
		</div>
		<script type="text/javascript"> pokaz_error(); </script> ';
	}
}
?>