<ol class="breadcrumb">
	<li><a href="<?=site_url('dashboard')?>"><i class="fa fa-home fa-lg"></i></a></li>
	<?php 
		$url  = explode('/', uri_string());
		$link = '';
		for ($i=0; $i<count($url)-1; $i++)
		{
			$link .= '/'.$url[$i];
			echo "<li><a href='".site_url($link)."'>$url[$i]</a></li>";
		}
		echo "<li class='active'>$url[$i]</li>";
	?>
</ol>