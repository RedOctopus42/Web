<?php

    $db_user = "chronicle"; 
    $db_pass = "Wingshell2502"; 
    $db_name = "l2reuniongshigh"; 
    $db_serv = "62.210.201.245"; 

	$res = mysql_connect ($db_serv, $db_user, $db_pass) or die ('Coudn\'t connect to host');
	$resdb = mysql_select_db( $db_name, $res ) or die ('Couldn\'t select database');

	return(res);

?>

<?php

$sql = mysql_query('SELECT id,name,taxPercent,siegeDate,regTimeEnd FROM `castle`') or die('Query failed!');
$cor = 0;

while($c = mysql_fetch_array($sql)) {
      $cor = $cor + 1;
      $bg  = $cor % 2 == 0 ? '#ba9b45' : '#987e35';

      $cl = mysql_query("SELECT * FROM clan_data WHERE hasCastle = '".$c['id']."'") or die(mysql_error());
      $clan = mysql_fetch_array($cl);
	  
	  $l = mysql_query("SELECT * FROM clan_data WHERE leader_id = '".$clan['leader_id']."'") or die(mysql_error());
	  $lord = mysql_fetch_array($l);

?>
<table class="b2kb">
  <tr>
    <td id='C1'><h2 id="topc">Castle Name: <font color="#FFF"><?php echo $c['name'];?></font><br />Tax Percent: <font color="#FFF"><?php echo $c['taxPercent']."%"; ?></font></h2> </td>
    <td id='C2'><h2 id="topc"><?php echo !empty($clan['clan_name']) ? $clan['clan_name'] : "No Clan"; ?></td>
    <td id='C3'><h2 id="topc"><?php echo !empty($lord['char_name']) ? $lord['char_name'] : "No Lord"; ?></td>
    <td id='C4'><h2 id="topc"><?php echo !empty($clan['ally_name']) ? $clan['ally_name'] : "No Ally"; ?></td>
    <td id='C5'><h2 id="topc"><?php echo @date('D\, j M Y H\:i',$c['siegeDate']/1000); ?></td><br />
  </tr></table>
<?php
}
?>
<br>