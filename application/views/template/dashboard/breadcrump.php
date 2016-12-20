<ol class="breadcrumb">
	<li><a href="<?=site_url('dashboard')?>"><i class="fa fa-home fa-lg"></i></a></li>
	<?php
		$url  = explode('/', uri_string());
		$link = '';
		for ($i=0; $i<count($url)-1; $i++)
		{
			$link .= '/'.$url[$i];
			if(($url[$i+1] != 'index')) {
                echo "<li><a href='" . site_url($link) . "'>" . ucfirst($url[$i]) . "</a></li>";
            } else {
                echo "<li class='active'>" . ucfirst($url[$i]) . "</li>";
            }
		}
		if(!is_numeric($url[$i]))
		    if($url[$i] != 'index')
            echo "<li class='active'>" . ucfirst($url[$i]) . "</li>";
    ?>
</ol>