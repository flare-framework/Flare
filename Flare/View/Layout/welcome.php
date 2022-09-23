<div id='stars'></div>
<div id='stars2'></div>
<div id='stars3'></div>
<div id='title'>
<span>Welcome to</span><br>
<span><?=$welcome?></span><br>
<img src="Flare.png" alt="Flare - logo" width="20%" height="20%">
<br>
<span style="font-size: xx-large">
<?php
echo 'PHP VERSION' .PHP_VERSION.'| Flare VERSION : 4.2.0'  ;
$jdf = new jdf() ;
echo  '<br>'.$jdf->jstrftime('%c');
?>
©  Sajjad eftekhari <?= date('Y')?></span>
</div>
