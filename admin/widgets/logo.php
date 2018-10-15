<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.php">
    	<?php 
    		if($rap_phim->ten_rap_chieu)
		    { 
		    	echo $rap_phim->ten_rap_chieu;
		    } 
		    else 
		    {
		    	echo "Admin";
		    } 

    	?></a>
</div>