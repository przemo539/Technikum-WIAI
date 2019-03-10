<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="description" content="sprawdzian itp" />
		<meta name="Keywords" content="sprawdzian, sprawdzian, sprawdzian" />
		<meta name="robots" content="index,follow" />
		<meta name="author" content="Przemo">
		<meta name="reply-to" content="email@hotmail.com">
		<meta name="category" content="">
		<meta name="rating" content="General">
		<title>Sprawdzian</title>
	</head>
	<body>
		<center>
			<table style="border:1px; border-color:black; border-style: solid; height:600px; width:1000px" background="img/tlo.png">
				<tr> 
					<td colspan="3" style="border:1px; border-color:black; border-style: solid; text-align:center; font-family:Verdana; font-size:15pt;" valign="middle"><?php echo '<img src="img/baner.png" alt="baner" width="100"/> Sprawdzian :D'  ?></td>
					<td style="text-align:center; border:1px; border-color:black; border-style: solid;"><?php echo "Dzisiaj jest: ".date("d-m-Y H:i:s") ?></td>
				</tr>
				<tr>
					<td colspan="2" style="text-align:center; border:1px; border-color:black; border-style: solid;"><?php   echo "Nazywam się Przemek<br>";
											echo "Mam 18 lat"; ?></td>
					<td colspan="2" style="text-align:center; border:1px; border-color:black; border-style: solid;"><?php 
										if(date("H")<12){
										echo "Dobry dzień";
										}elseif(date("H")<17){
										echo "Dobry dzień";
										}else{
										echo "Dobry wieczór";
										}?>
								</td>
				</tr>
				<tr>
					<td colspan="4" style="border:1px; border-color:black; border-style: solid; text-align:center;"><?php echo "<a href=\"phpinfo.php\">PHPINFO()</a>"; ?></td>
				</tr>
				<tr>
					<td style="width:250px; text-align:center; border:1px; border-color:black; border-style: solid;"><img width="250" height="150" src="img/wiosna.jpg" alt="wiosna"/></td>
					<td style="width:250px; text-align:center; border:1px; border-color:black; border-style: solid;"><img width="250" height="150" src="img/lato.jpg" alt="lato"/></td>
					<td style="width:250px; text-align:center; border:1px; border-color:black; border-style: solid;"><img width="250" height="150" src="img/jesien.jpg" alt="jesien"/></td>
					<td style="width:250px; text-align:center; border:1px; border-color:black; border-style: solid;"><img width="250" height="150" src="img/zima.jpg" alt="zima"/></td>
				</tr>
				<tr>
					<td colspan="4" style=" text-align:center;border:1px; border-color:black; border-style: solid;"><b>Powered by Przemysław Szymoniak 3TI &#169; 2014</b></td>
				</tr>
			</table>
		</body>
	</center>
</html>