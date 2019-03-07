<?php
ob_start();
 function getmicrotime(){
  list($usec, $sec) = explode(" ",microtime());
  return ((float)$usec + (float)$sec);
}
$time_start = getmicrotime();
session_start();
include_once("function/function-all.php");
include_once("mysql/mysql.php");
?><!DOCTYPE html 
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="Description" content="Sklep interneowy na wiai" />
	<meta name="Keywords" content="Sklep,strona,wiai" />
	<meta name="Author" content="Przemo" />
	<script src="js/jquery-1.11.0.min.js"></script>
	<script src="js/lightbox.min.js"></script>
	<link rel="Stylesheet" type="text/css" href="css/style.css" />
	<link href="css/lightbox.css" rel="stylesheet" />
	<title>Sklep internetowy na Witryny i aplikacje internetowe</title>
<script>
function pokaz_error(){
$(document).ready(function() {
    if ($('div.error').length > 0) {
        $('div.error').css('position', 'absolute')
                                .css('top', '25%')
                                .css('display', 'block')
                                .css('margin', '50px 160px');
        setTimeout(function() {
            $('div.error').fadeOut(4500);
$('div.error').css('display', 'none');
        }, 1600);
    }
});
}

function pokaz_sukces(){
$(document).ready(function() {
    if ($('div.sukces').length > 0) {
        $('div.sukces').css('position', 'absolute')
                                .css('top', '25%')
                                .css('display', 'block')
                                .css('margin', '50px 160px');
        setTimeout(function() {
            $('div.sukces').fadeOut(4500);
$('div.sukces').css('display', 'none');
        }, 1600);
    }
});
}
</script>
</head>
<body>
<div id="top">

    <div id="NAGLOWEK"><?php include("include/menu.php");?></div>
    <div id="LEWO" align="center"><h2>Kategorie:</h2>
	<div id="kategorie"><?php echo wyswietl_kategorie();?></div>
	</div>
	<div id="TRESC">