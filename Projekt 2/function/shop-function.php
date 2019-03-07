<?php 
function wyswietl_kategorie(){
	$kategoria = pobierz_kategorie();
	$zwrot='<center>';
		while($kategorie = mysql_fetch_assoc($kategoria)){
			$zwrot.= '<a href="index.php?subpage=shop&category='.$kategorie['id'].'" id="kategoria">'.$kategorie['nazwa'].' ('.policz_produkty($kategorie['id']).')</a><br/>';
		}
		$zwrot.='</center>';
	return $zwrot;
 }
 
 function pobierz_kategorie(){
	$sql = "Select `id`, `nazwa`, `opis` from `kategorie` where `ukryte`='0'";
	$sql = mysql_query($sql);
	return $sql;
 }
 
 function pobierz_produkty_id_glowna($id){
	$sql = "Select `id`, `nazwa`, `glowne_img`, `cena`, `sztuki` from `produkty` where `id_kategori`='$id'  limit 9 offset ".pobierz_numer_strony()."";
	$sql = mysql_query($sql);
	return $sql;
 }
 
 function policz_produkty($id){
 $sql="Select count(*) from `produkty` where `id_kategori`='$id'";
 $sql = mysql_fetch_row(mysql_query($sql));
 return $sql[0]; 
 }

?>