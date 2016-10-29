<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 29/06/2015
 * Time: 18:50
 */
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Join</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/navigation.css" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic|Metamorphous' rel='stylesheet' type='text/css'>
        <script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
        <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>
        <script type='text/javascript'> $(function(){ $(window).scroll(function () { if ($(this).scrollTop() > 850) { $('#header').addClass("fixHeader");  } else { $('#header').removeClass("fixHeader"); } }); }); </script>
    </head>
    <body marginheight="0" >

        
        
        <div id="join_us">
            <div id="header"><?php include "menu.php" ?></div>
            <div class="contain">
                <div class="center">
                    <div class="tete"><h1>Nous rejoindre IG</h1></div>
                    <div class="corps"><?php require "join_us.php" ?></div>
                    <div class="pied"><?php require "join_us_footer.php" ?></div>
                </div>
            </div>
        </div>

     <div id="footer"><?php require "footer.php" ?></div>
    </body>
</html>

