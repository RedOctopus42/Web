<?php

    $db_user = "chronicle"; 
    $db_pass = "Wingshell2502"; 
    $db_name = "l2reuniongs"; 
    $db_serv = "62.210.201.245"; 

    $res = mysql_connect ( $db_serv, $db_user, $db_pass ) or die ("Coudn't connect to [$db_serv]"); 
    $resdb = mysql_select_db ( "$db_name",$res ); 

    return $res; 

?>