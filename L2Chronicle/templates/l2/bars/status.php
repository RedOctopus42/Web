

            <p class="stts"><font color="#FFBA08">Login Server </font> 
            <?php $open = @fsockopen('62.210.201.245', '2106', $ERRNO, $ERRSTR, .1);
        if(!$open) {
            echo '<span id="bille"><font color=red><img src="http://www.l2-chronicle.eu/Lineage/img/offline.gif" /></font></b></span>';
        } else {
            echo '<span id="bille"><b><font color=green><img src="http://www.l2-chronicle.eu/Lineage/img/online.gif" /></font></b></span>';
        } ?></p>
            
            <font color="#FFBA08">Middle Server </font>
            <?php $open = @fsockopen('62.210.201.245', '7778', $ERRNO, $ERRSTR, .1);
        if(!$open) {
            echo '<span id="bille"><b><font color=red><img src="http://www.l2-chronicle.eu/Lineage/img/offline.gif" /></font></b></span>';
        } else {
            echo '<span id="bille"><b><font color=green><img src="http://www.l2-chronicle.eu/Lineage/img/online.gif" /></font></b></span>';
        } ?><br>
            
            <font color="#FFBA08">High Server </font>
            <?php $open = @fsockopen('62.210.201.245', '7777', $ERRNO, $ERRSTR, .1);
        if(!$open) {
            echo '<span id="bille"><b><font color=red><img src="http://www.l2-chronicle.eu/Lineage/img/offline.gif" /></font></b></span>';
        } else {
            echo '<span id="bille"><b><font color=green><img src="http://www.l2-chronicle.eu/Lineage/img/online.gif" /></font></b></span>';
        } ?><br>


