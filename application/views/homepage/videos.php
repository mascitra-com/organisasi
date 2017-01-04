<div class="container-fluid">
	<div class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<span class="navbar-brand" style="padding-left: 10px;">Video</span>
			</div>
			<form class="navbar-form navbar-right" role="search" method="POST" action="<?=site_url('homepage/search/videos')?>">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Cari judul video" name="name" value="<?= isset($search->name) ?$search->name : '' ?>">
				</div>
				<button type="submit" class="btn btn-default">Cari</button>
			</form>
		</div>
	</div>

	<div class="row">
		<?php foreach($videos as $video):?>
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<?php if (strpos($video->link, 'youtube')) { ?>
					<iframe width="100%" height="250px" src="<?= $video->link ?>?controls=1"></iframe>
					<?php } else { ?>
					<video src="<?= $video->link ?>" controls width="100%" height="250px">
						Sorry, your browser doesn't support embedded videos,
						but don't worry, you can <a href="<?= $video->link ?>">Download It</a>
						and watch it with your favorite video player!
					</video>
					<?php } ?>
					<div class="caption">
						<h4><?= $video->name?></h4>
					</div>
				</div>
			</div>
		<?php endforeach;?>
	</div>
	<nav aria-label="...">
		<ul class="pager">
		</ul>
	</nav>
</div>