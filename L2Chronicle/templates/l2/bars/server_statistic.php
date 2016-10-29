<?php include "config/stats.php" ?>
<?php

mysql_connect($db_serv,$db_user,$db_pass) or die (mysql_error());

mysql_select_db($db_name) or die(mysql_error());

//Online Players
$query = ("SELECT * FROM characters WHERE online=1 and accesslevel>=0");

$result = mysql_query($query) or die(mysql_error());

$num2=mysql_numrows($result);
$sum=$num2;
$sum1=5;
$num3=$sum + $sum1;

//Alliance
$query = ("SELECT * FROM clan_data WHERE ally_id!=\"\"");

$result = mysql_query($query) or die(mysql_error());

$alliance2=mysql_numrows($result);


//Clan
$get_config_data="SELECT clan_id FROM clan_data";

$query = ("SELECT clan_id FROM clan_data WHERE clan_id>0");

$result = mysql_query($query) or die(mysql_error());

$clan2=mysql_numrows($result);


mysql_close();

mysql_connect($db_serv,$db_user,$db_pass) or die (mysql_error());

mysql_select_db($db_name) or die(mysql_error());
?>
Middle Online: <span id="billeb"><?php print ("$num3"); ?><br></span>
Middle Clans: <span id="billeb"><?php print ("$clan2"); ?><br></span>
Middle Aliances: <span id="billeb"><?php print ("$alliance2"); ?><br></span>