<?php

function connection(){
	require "config/bdd.php";
}


$online = array('0' => "<font color=#FF0000><b>OFFLINE</b></font>", '1' => "<font color=#035922><b>ONLINE</b></font>");
$klan = array('0' => "No Clan"); 
$FORM = "" ; 
$query_chars = "select char_name,level,sex,classid,pkkills from characters WHERE accesslevel=0 AND pkkills >= 1 order by pkkills desc limit 10;"; 
connection(); 
$link = mysql_query($query_chars); 
$i=1; 
$r=255; 
?>
<div class="top_ge_r">
<?php
echo '<h2>TOP PK</h2>';
while ( $row=mysql_fetch_row($link) ) 
{ 
    $timer2=$row[4]/1000;
    $datetime2  = gmstrftime("%d.%m.%Y v %H:%M:%S", $timer2);
    $query = "select classname from char_templates where classid=$row[3]"; 
    $link2 = mysql_query($query); 
    $class = mysql_fetch_row($link2); 

    $FORM .= "<table><tr> 
    <td class='top_id'>$i</b></td>
    <td class='top_name'>$row[0]</td>
    <td class='top_value'>$row[4]</td>
    </tr></table>"; 
    $i++; 
    $r -= 0; 
}  

mysql_close(); 

echo $FORM; 
?>
</div>

<?php
$sexes = array('Male', 'Female'); 
$online = array('0' => "<font color=#FF0000><b>OFFLINE</b></font>", '1' => "<font color=#035922><b>ONLINE</b></font>");
$klan = array('0' => "No Clan"); 
$FORM = "" ; 
$query_chars = "select char_name,level,sex,classid,pvpkills from characters WHERE accesslevel=0 AND pvpkills >= 1 order by pvpkills desc limit 10;"; 
connection(); 
$link = mysql_query($query_chars); 
$i=1; 
$r=255; 
?>
<div class="top_ge_r">
<?php
echo '<h2>TOP PVP</h2>';
while ( $row=mysql_fetch_row($link) ) 
{ 
    $timer2=$row[4]/1000;
    $datetime2  = gmstrftime("%d.%m.%Y v %H:%M:%S", $timer2);
    $query = "select classname from char_templates where classid=$row[3]"; 
    $link2 = mysql_query($query); 
    $class = mysql_fetch_row($link2); 

    $FORM .= "<table><tr> 
    <td class='top_id'>$i</b></td>
    <td class='top_name'>$row[0]</td>
    <td class='top_value'>$row[4]</td>
    </tr></table>"; 
    $i++; 
    $r -= 0; 
}  

mysql_close(); 

echo $FORM; 

?>
</div>

<?php
$FORM = "" ;
$query_clans = "select clan_name, clan_level from clan_data order by clan_level desc limit 10;"; 
connection(); 
$link = mysql_query($query_clans); 
$i=1; 
$r=255; 
?>
<div class="top_ge_r">
<?php
echo '<h2>TOP CLAN</h2>';
while ( $row=mysql_fetch_row($link) ) 
{ 
    $timer2=$row[4]/1000;
    $datetime2  = gmstrftime("%d.%m.%Y v %H:%M:%S", $timer2);
    $query = "select classname from char_templates where classid=$row[3]"; 
    $link2 = mysql_query($query); 
    $class = mysql_fetch_row($link2); 

    $FORM .= "<table><tr> 
    <td class='top_id'>$i</b></td>
    <td class='top_name'>$row[0]</td>
    <td class='top_value'>$row[1]</td>
    </tr></table>"; 
    $i++; 
    $r -= 0; 
}  

mysql_close(); 

echo $FORM; 

?>
</div>