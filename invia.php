<html>
<head>
<script type="text/javascript">
<!--
  function doRedirect() {
<?
echo 'location.href="genera.php?start='.($_REQUEST["start"]+1).'"';
?>
  }
 //-->
</script>
<?
function MAIL_NVLP($fromname, $fromaddress, $toname, $toaddress, $subject, $message)
{
   $headers  = "MIME-Version: 1.0\n";
   $headers .= "Content-type: text/plain; charset=iso-8859-1\n";
   $headers .= "X-Priority: 3\n";
   $headers .= "X-MSMail-Priority: Normal\n";
   $headers .= "X-Mailer: php\n";
   $headers .= "From: \"".$fromname."\" <".$fromaddress.">\n";
   $headers .= 'Content-Type: text/html; charset="iso-8859-1"\n';
   $message=str_replace(chr(92),"",$message);
   $strh='<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"><HTML><HEAD>
      <META http-equiv=Content-Type content="text/html; = charset=iso-8859-1">
      <META content="MSHTML 6.00.2800.1498" name=GENERATOR>
      </HEAD><BODY>';
   $strt='</BODY></HTML>';
   $message=str_replace("[img]",'<IMG alt="" src="',$message);
   $message=str_replace("[/img]",' baseline=20 border=0><BR>',$message);
   return mail($toaddress, $subject, $strh.$message.$strt, $headers);
}
?>
<title>automatic system - invia</title>
</head>
<body>
<?
  include "dbconn.inc.php";
  $handle=fopen('oggetto.txt', "r");
  $oggetto=fread($handle, filesize('oggetto.txt'));
  fclose($handle);
  $handle=fopen('testo.txt', "r");
  $testo=fread($handle, filesize('testo.txt'));
  fclose($handle);
  $limite=$_REQUEST["start"]*20;
  $sql="SELECT * FROM `mailinglist_ing` ORDER BY `indirizzo` LIMIT ".$limite.", 20;";
  $res=mysql_query($sql,$conn) or die("Errore ".mysql_error());
  while ($riga=mysql_fetch_array($res)) {
    echo $riga[indirizzo]."<br>";
    MAIL_NVLP("ArchIng","arching@unicamente.org","",$riga[indirizzo],$oggetto,$testo);
  }
  mysql_close($conn);
  echo '<br>HO MANDATO 20 EMAIL:<br><br>Oggetto: ';
  echo $oggetto."<br><br>Testo: ".str_replace("\n","<br>",$testo)."<br><br>";
  echo 'Questa e la pagina numero '.$_REQUEST["start"].'<br>TRA 30 SECONDI SARAI REINDIRIZZATO ALL\'INDICE';
  echo '<body onload="javascript:window.setTimeout(\'doRedirect()\', 30000);">';
?>
</body>
</html>
