<?php
    $start = $_POST["cnt"]-9;
    for($i=$start; $i<=$_POST["cnt"]; $i++){  
		if($i<60){
        	echo '<a data-fancybox="gal" data-src="/upload/port/'.$i.'.webp"><div class="img" style="background-image:url(/upload/port/'.$i.'.webp);"></div></a>';
		}
	 }

?>
