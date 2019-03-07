</div>
<div id="PRAWO">
<?php include('prawo.php');?>
</div>

<div id="STOPKA">&nbsp;</div>

</body>
</html>
<?php
//zakończenie odliczania i wyświetlenie czasu generowania
$time_end = getmicrotime();
$time = substr($time_end - $time_start, 0, 4);
echo '<div id="czas_generowania" align="center" style="color: red;">wygenerowano w '.$time.' ms</div>';
ob_end_flush()?>