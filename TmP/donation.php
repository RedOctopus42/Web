<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Donation</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/navigation.css" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic|Metamorphous' rel='stylesheet' type='text/css'>
        <script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
        <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>
    </head>

    <body marginheight="0" >

        <div id="donation">
            <div id="header"><?php include "menu_dons.php" ?></div>
                <div class="center">
                    <div class="tete"><h1>How to donate</h1></div>
                    <div class="corps"><?php require "dons.php" ?></div>
                    <div class="pied"></div>
                </div>
        </div>

     <div id="footer"><?php require "footer.php" ?></div>
    </body>

</html>