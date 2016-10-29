<p class="stat">Login Server
<?php
$open = @fsockopen('195.154.223.227', '2106', $ERRNO, $ERRSTR, .1);
if(!$open)
{
    echo '<span id="bille1"><img src="img/offline.gif" /></b></span>';
} else
{
    echo '<span id="bille1"><b><img src="img/online.gif" /></b></span>';
}
?>
    Game Server
<?php
$open = @fsockopen('195.154.223.227', '7778', $ERRNO, $ERRSTR, .1);
if(!$open)
{
    echo '<span id="bille"><b><img src="img/offline.gif" /></b></span>';
}
else
{
    echo '<span id="bille"><b><img src="img/online.gif" /></b></span>';
}
?>
</p>
