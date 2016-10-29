<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="eng" xml:lang="eng">
<head>

<title>L2 Chronicle</title>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<meta name="description" content="L2 Chronicle" />

<meta name="keywords" content="L2, Lineage, Interlude, Chronicle, PvP" />

<meta name="viewport" content="width=device-width, user-scalable=yes" />

<meta name="robots" content="all" />

<meta name="revisit-after" content="1 days" />
<link rel="search" type="application/opensearchdescription+xml" href="engine/opensearch.php" title=".:L2 Chronicle:. - Private Lineage 2 Interlude Server" />
<link rel="alternate" type="application/rss+xml" title=".:L2 Chronicle:. - Private Lineage 2 High Five Server" href="rss.xml" />
<link rel="shortcut icon" href="templates/l2/images/favicon.png"/>
<link rel="stylesheet" type="text/css" href="templates/l2/css/droidsans.css" />
<link rel="stylesheet" type="text/css" href="templates/l2/css/style.css" />
<style type="text/css">
</style>
<?php
header('Content-Type: text/html; charset=UTF-8');
?>
</head>
	<div id="header">
		<div id="logo"><h1><a href="index.php" title="L2 Chronicle - Be One Of The Best"><span>L2 Chronicle - Be One Of The Best</span></a></h1></div>
			<div id="menu">
				<div class="module">
					<div class="moduleb">
						<ul class="great">
							<li id="men">
								<?php include "templates/l2/bars/menu.php" ?>
							</li>
						</ul>					
					</div>
				</div>
			</div>
	</div>

	<div id="bdte">
		<div id="widg1">
			<div id="stats">
				<?php include "templates/l2/bars/statistic.php" ?>
			</div>
		</div>
		<div id="widg2">
			<div id="statut">
				<?php include "templates/l2/bars/status.php" ?>
			</div>
		</div>
				<div id="widg3">
					<div id="stat">
						<?php include "templates/l2/bars/server_statistic.php" ?>
					</div>
					<div id="stat1">
						<?php include "templates/l2/bars/server_statistic_h.php" ?>
					</div>
				</div>
			</div>

	<div id="content">
		<div id="contentb">
			<div id="titlea">
				<img src="templates/l2/images/high_castle.png" />
			</div>
			<?php require 'config/statsh.php' ?>
<?php
header('Content-Type: text/html; charset=UTF-8');
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
		</div>
		<div id="contenta">
			<div id="titlea">
				<img src="templates/l2/images/middle_castle.png" />
			</div>
			<?php require 'config/stats.php' ?>
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
		</div>
	</div>

	<div id="footer">
		<div id="foot">
			<p id="kora">Copyright 2015 © -- Tous droits réservés par L2-Chronicle</p>
		</div>
	</div>


</html>