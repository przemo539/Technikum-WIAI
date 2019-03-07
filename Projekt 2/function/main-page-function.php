<?php 

function sprawdz_podstrone(){
	if($_GET['subpage']){
		$podstrona = addslashes($_GET['subpage']);
	}else{
		return 'home';
		}
		
	switch($podstrona){
		case 'shop':
			return 'shop';
			break;
		case 'author':
			return 'author';
			break;
		case 'contact':
			return 'contact';
			break;
	  	case 'contact':
			return 'contact';
			break;	  	
		case 'forg_pass':
			return 'forg_pass';
			break;		
		case 'registration':
			return 'registration';
			break;		
		case 'cart':
			return 'cart';
			break;		
		case 'log_out':
			return 'log_out';
			break;
	  
		default:
			return 'home'; 
	}
 }
 
 function zaloguj($login){
	mysql_query("insert into `session` (`login`, `session_id`, `data`, `aktywny`) values ('".$login."', '".session_id()."', now(), '".time()."')"); 
	$_SESSION['session_id'] = session_id();
	$_SESSION['login'] = $login;

 }
 
 function zalogowany(){
	$session_id = addslashes($_SESSION['session_id']);
	$login = addslashes($_SESSION['login']);
	$sql = mysql_fetch_row(mysql_query("select `id` from `session` where `session_id` = '".$session_id."' and login = '".$login."'"));
	if($sql[0] > 0){
		return 1;
	}else{
		return 0 ;
	}
 }

?>