<html>
<title>MailingList</title>
<?
  include "dbconn.inc.php";
  $cancella=$_REQUEST['cancella'];
  if ($cancella!="") {
    $sql="DELETE FROM `mailinglist_ing` WHERE `indirizzo`='".$cancella."';";
    $res=mysql_query($sql,$conn) or die("Errore ".mysql_error());
  }
  echo '<table>';
  $sql="SELECT * FROM `mailinglist` ORDER BY `indirizzo`;";
  $res=mysql_query($sql,$conn) or die("Errore ".mysql_error());
  while ($riga=mysql_fetch_array($res)) {
      echo '<tr><td><b>'.$riga[indirizzo].'</b></td><td><a href=showmail.php?cancella='.$riga[indirizzo].'>cancella</a></td></tr>';
  }
  echo '</table>';
?>
</html>
