<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="eng" xml:lang="eng">
<head>

<title>L2 Chronicle</title>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<meta name="description" content="L2 Chronicle" />

<meta name="keywords" content="L2, Lineage, Interlude, Chronicle, PvP" />

<meta name="viewport" content="width=device-width, user-scalable=yes" />

<meta name="generator" content="DataLife Engine (http://l2Chronicle.sytes.net/)" />

<meta name="robots" content="all" />

<meta name="revisit-after" content="1 days" />

<link rel="search" type="application/opensearchdescription+xml" href="engine/opensearch.php" title=".:L2 Chronicle:. - Private Lineage 2 Interlude Server" />
<link rel="alternate" type="application/rss+xml" title=".:L2 Chronicle:. - Private Lineage 2 High Five Server" href="rss.xml" />
<link rel="shortcut icon" href="templates/l2/images/favicon.png"/>
<link rel="stylesheet" type="text/css" href="templates/l2/css/droidsans.css" />
<link rel="stylesheet" type="text/css" href="templates/l2/css/style.css" />
<style type="text/css">
</style>
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
				<img src="templates/l2/images/high_activity.png" />
			</div>
<?php 

function connect() 
{ 
require "config/statsh.php";
}

$sexes = array('Male', 'Female'); 
$online = array('0' => "<font color=#FF0000><b>OFFLINE</b></font>", '1' => "<font color=#035922><b>ONLINE</b></font>");
$klan = array('0' => "No Clan"); 
$FORM = "" ; 
$query_chars = "select char_name,level,sex,classid,onlinetime from characters WHERE accesslevel=0 AND onlinetime >= 1 order by onlinetime desc limit 10;"; 
connect(); 
$link = mysql_query($query_chars); 
$i=1; 
$r=255; 
while ( $row=mysql_fetch_row($link) ) 
{ 
    $timer2=$row[4]/60;
    $timer3=$timer2/60;
    $timer4=$timer3/24;
    $timer4b=(int)$timer4;
    $timer5=$timer3%24;
    $datetime2  = gmstrftime("%d d %H:%M:%S", $timer4);
    $query = "select classname from char_templates where classid=$row[3]"; 
    $link2 = mysql_query($query); 
    $class = mysql_fetch_row($link2); 

    $FORM .= "<table class='b2k'><tr> 
    <td class='Namb'><h2 id='top'>$i</b></h2></span></td>
    <td class='Nam'><h2 id='top'>$row[0]</h2></td>
    <td class='Name'><h2 id='top'>$timer4b d $timer5 h</h2></td><br>
    </tr></table>"; 
    $i++; 
    $r -= 0; 
}  

mysql_close(); 

echo $FORM; 

?>
		</div>
		<div id="contenta">
			<div id="titlea">
				<img src="templates/l2/images/middle_activity.png" />
			</div>
<?php 

function connection() 
{ 
include "config/stats.php";
}

$sexes = array('Male', 'Female'); 
$online = array('0' => "<font color=#FF0000><b>OFFLINE</b></font>", '1' => "<font color=#035922><b>ONLINE</b></font>");
$klan = array('0' => "No Clan"); 
$FORM = "" ; 
$query_chars = "select char_name,level,sex,classid,onlinetime from characters WHERE accesslevel=0 AND onlinetime >= 1 order by onlinetime desc limit 10;"; 
connection(); 
$link = mysql_query($query_chars); 
$i=1; 
$r=255; 
while ( $row=mysql_fetch_row($link) ) 
{ 
    $timer2=$row[4]/60;
    $timer3=$timer2/60;
    $timer4=$timer3/24;
    $timer4b=(int)$timer4;
    $timer5=$timer3%24;
    $datetime2  = gmstrftime("%H:%M:%S", $timer2);
    $query = "select classname from char_templates where classid=$row[3]"; 
    $link2 = mysql_query($query); 
    $class = mysql_fetch_row($link2); 

    $FORM .= "<table class='b2k'><tr> 
    <td class='Namb'><h2 id='top'>$i</b></h2></span></td>
    <td class='Nam'><h2 id='top'>$row[0]</h2></td>
    <td class='Name'><h2 id='top'>$timer4b d $timer5 h</h2></td><br>
    </tr></table>"; 
    $i++; 
    $r -= 0; 
}  

mysql_close(); 

echo $FORM; 

?>
		</div>
	</div>

	<div id="footer">
		<div id="foot">
			<p id="kora">Copyright 2015 © -- Tous droits réservés par L2-Chronicle</p>
		</div>
	</div>


</html>