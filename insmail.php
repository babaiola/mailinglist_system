<html>
<title>MailingList</title>
<?
  $newmail=$_REQUEST['newmail'];
  if (strpos($newmail,"@")) {
      include "dbconn.inc.php";
      $sql="INSERT INTO `mailinglist_ing` ( `indirizzo` ) VALUES ('".$newmail."');";
      $res=mysql_query($sql,$conn) or die("Errore ".mysql_error());
      echo '<b>mail '.$newmail.' inserita</b>';
  }
?>
<form method="post" action="insmail.php">
<input type="text" name="newmail" size="30">
<input type="submit" value="Inserisci">
</form>
</html>
