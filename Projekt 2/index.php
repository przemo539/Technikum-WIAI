<?php 
include_once("include/gora.php");
 switch(sprawdz_podstrone()){
	case 'shop':
		include_once("shop.php");
		break;
	case 'author':
		include_once("include/author.php");
		break;
	case 'contact':
		include_once("include/contact.php");
		break;
	case 'admin':
		include_once("include/admin.php");
		break;	
	case 'forg_pass':
		include_once("include/forg_pass.php");
		break;	
	case 'registration':
		include_once("include/registration.php");
		break;	
	case 'cart':
		include_once("include/cart.php");
		break;	
	case 'log_out':
		mysql_query("DELETE from `session` where `login` = '".addslashes($_SESSION['login'])."'");
		session_destroy();
	  
	default:
		include_once("include/home.php"); 
 }
include_once("include/dol.php");
?>