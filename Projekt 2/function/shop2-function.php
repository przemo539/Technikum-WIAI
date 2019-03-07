<?php  
 function pobierz_produkty(){
	$sql = "Select `id`, `nazwa`, `glowne_img`, `cena`, `sztuki`, `id_kategori` from `produkty` limit 9 offset ".pobierz_numer_strony()."";
	$sql = mysql_query($sql);
	return $sql;
 }
 
 function policz_produkty_all(){
 $sql="Select count(*) from `produkty`";
 $sql = mysql_fetch_row(mysql_query($sql));
  return $sql[0]; 
 }

 
 function licz_produkty(){
	$sql = mysql_fetch_row(mysql_query("select `zakupy` from `koszyk` where `login`='".addslashes($_SESSION['login'])."'"));
	if($sql[0]){
		$tablica = explode(",", $sql[0]);
		return count($tablica);
	}else{
		return 0;
	}
 }
?>