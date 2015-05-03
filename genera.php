<html>
<head>
<script type="text/javascript">
<!--
  function doRedirect() {
<?
echo 'location.href="invia.php?start='.$_REQUEST["start"].'"';
?>
  }
 //-->
</script>
<title>automatic system - genera</title>
</head>
<body>
OGNI PAGINA VERRA' VISUALIZZATA DOPO 30 SECONDI<br>
<?
  include "dbconn.inc.php";
  if ($_REQUEST["oggetto"]!="") {
    $handle=fopen('oggetto.txt', 'w+');
    fwrite($handle, $_REQUEST["oggetto"]);
    fclose($handle);
  }
  if ($_REQUEST["testo"]!="") {
    $handle=fopen('testo.txt', 'w+');
    fwrite($handle, $_REQUEST["testo"]);
    fclose($handle);
  }
  $sql="SELECT count(*) as totale FROM `mailinglist_ing`;";
  $res=mysql_query($sql,$conn) or die("Errore ".mysql_error());
  while ($riga=mysql_fetch_array($res)) $max=floor($riga["totale"]/20)+1;
  for ($i=0; $i<$max; $i++) {
    if ($_REQUEST["start"]==$i) echo '<li>';
    echo '<a href="invia.php?start='.$i.'">pagina '.$i.'</a><br>';
  }
  if ($_REQUEST["start"]<$max)
    echo '<body onload="javascript:window.setTimeout(\'doRedirect()\', 30000);">';
  mysql_close($conn);
?>
</body>
</html>
