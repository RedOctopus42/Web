<?php

require "config/bdd.php";


$sql = mysql_query("SELECT * FROM characters WHERE accesslevel = 0 ") or die(mysql_error());
$cor = 0;
$i = 0;
?>
<div class="top_ge">
	<h2>CASTLE</h2>
<?php
$sql = mysql_query("SELECT * FROM castle ORDER BY name") or die(mysql_error());
$cor = 0;
while($c = mysql_fetch_array($sql)) {
      $cor = $cor + 1;
      $bg  = $cor % 2 == 0 ? '#ba9b45' : '#987e35';

      $cl = mysql_query("SELECT * FROM clan_data WHERE hasCastle = '".$c['id']."'") or die(mysql_error());
      $clan = mysql_fetch_array($cl);
	  
	  $l = mysql_query("SELECT * FROM characters WHERE charId = '".$clan['leader_id']."'") or die(mysql_error());
	  $lord = mysql_fetch_array($l);

?>
<table>
  <tr>
    <td class='top_castle'><?php echo $c['name'];?></font><br />Tax: <font color="#FFF"><?php echo $c['taxPercent']."%"; ?></font></h2> </td>
    <td class='top_clan'><?php echo !empty($clan['clan_name']) ? $clan['clan_name'] : "No Clan"; ?></td>
  </tr></table>
<?php
}
?>
</div>

 