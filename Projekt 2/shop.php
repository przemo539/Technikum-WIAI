<?php 
$id_category = (int)$_GET['category'];
if($id_category>0){
	$sql = "Select `id`, `nazwa`, `opis` from `kategorie` where `ukryte`='0' and `id`='$id_category'";
	$kategoria  = mysql_fetch_assoc(mysql_query($sql));
}
if($kategoria['id']){
	$produkt_id = (int)$_GET['product'];
	if($produkt_id == 0){
	
		$produkty = pobierz_produkty_id_glowna($kategoria['id']);
		echo '<b><center>'.$kategoria['opis'].'</center></b>
			<table  border="0">
			<tr>';
		$odstep = 0;
		while($produkt = mysql_fetch_array($produkty)){
			if($odstep == 3){
				echo '</tr><tr>';
				$odstep = 0;
			}
	
			echo '<td style="width: 175px; height: 155px" >
				<center>
				<a href="index.php?subpage=shop&category='.$kategoria['id'].'&product='.$produkt['id'].'"><font size="4"> <b>'.$produkt['nazwa'].'</b></font></a><br/>
				<a href="index.php?subpage=shop&category='.$kategoria['id'].'&product='.$produkt['id'].'"><img width="133px" height="133px" src="'.$produkt['glowne_img'].'" /></a><br/>
				<a href="index.php?subpage=shop&category='.$kategoria['id'].'&product='.$produkt['id'].'">Cena: '.$produkt['cena'].' zł</a></td>';
 
			$odstep++;
		} 
	echo '</tr>
	<tr><td colspan="3" id="paginacja"><center>'.pagination('index.php?subpage=shop&category='.$kategorie['id'], policz_produkty($kategorie['id']), 9, pobierz_numer_strony()).'</center></td></tr></table>';

		
	}else{
	if((int)$_GET['dodaj'] == $produkt_id) dodaj_produkt_do_koszyka($produkt_id);

	$sql = "Select * from `produkty` where `id`='$produkt_id'";
	$produkt = mysql_fetch_assoc(mysql_query($sql));
	echo '<center><b><h1>'.$produkt ['nazwa'].'</h1></b></center>';
	echo '<table>
				<tr>
					<td>&nbsp;</td>
					<td colspan="4"><div style="width: 250px; height: 250px; float: left;"><a href="'.$produkt['glowne_img'].'" data-lightbox="produkt"><img src="'.$produkt['glowne_img'].'"  width="250" height="250"/></div></a>
					<div style="width: 150px; height: 150px; float: right;"><b>
					<font size="5" >Cena: '.$produkt['cena'].' zł</font><br/><br/>
					Dostępna ilość sztuk: '.$produkt['sztuki'].'<br/>
					<a href="index.php?subpage=shop&category='.$_GET['category'].'&product='.$_GET['product'].'&dodaj='.$_GET['product'].'">Dodaj do koszyka</a></b></div></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><a href="'.$produkt['obrazek1'].'" data-lightbox="produkt"><img src="'.$produkt['obrazek1'].'" width="130" height="130"/></a></td>
					<td><a href="'.$produkt['obrazek2'].'" data-lightbox="produkt"><img src="'.$produkt['obrazek2'].'" width="130" height="130"/></a></td>
					<td><a href="'.$produkt['obrazek3'].'" data-lightbox="produkt"><img src="'.$produkt['obrazek3'].'" width="130" height="130"/></a></td>
					<td><a href="'.$produkt['obrazek4'].'" data-lightbox="produkt"><img src="'.$produkt['obrazek4'].'" width="130" height="130"/></a></td>
				</tr>
				</table>';
	echo '.<br/><br/><div align="center">'.$produkt['opis'].'</div>';
	}
}else{
	 $produkty = pobierz_produkty();
 
	echo '<b><center><br/></center></b>
			<table  border="0">
			<tr>';
	$odstep = 0;
		while($produkt = mysql_fetch_array($produkty)){
			if($odstep == 3){
				echo '</tr><tr>';
				$odstep = 0;
			}
	
			echo '<td style="width: 175px; height: 155px" >
				<center>
				<a href="index.php?subpage=shop&category='.$produkt['id_kategori'].'&product='.$produkt['id'].'"><font size="4"> <b>'.$produkt['nazwa'].'</b></font><br/>
					<img width="133px" height="133px" src="'.$produkt['glowne_img'].'" /><br/>
					Cena: '.$produkt['cena'].' zł</a></td>';
 
			$odstep++;
		} 
	echo '</tr>
	<tr><td colspan="3" id="paginacja"><center>'.pagination('index.php?subpage=shop', policz_produkty_all(), 9, pobierz_numer_strony()).'</center></td></tr></table>';
}
?>