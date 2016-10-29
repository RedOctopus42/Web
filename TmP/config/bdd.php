<?php

    $db_user = "tmp"; 
    $db_pass = "WinGshell2209"; 
    $db_name = "tmp gs"; 
    $db_serv = "195.154.223.227"; 

    $res = mysql_connect ( $db_serv, $db_user, $db_pass ) or die ("Coudn't connect to [$db_serv]"); 
    $resdb = mysql_select_db ( "$db_name",$res ); 
    mysql_query("SET NAMES 'utf8'");

    return $res; 

?>
