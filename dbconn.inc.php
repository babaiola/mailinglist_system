<?
  $dbhost="";
  $dbname="";
  $dbuser="";
  $dbpass="";
  $conn=mysql_connect($dbhost,$dbuser,$dbpass) or die("Impossibile Collegarsi Al Server MySQL $dbhost");
  mysql_select_db($dbname,$conn) or die("Impossibile Selezionare Il Database $dbname");
?>
