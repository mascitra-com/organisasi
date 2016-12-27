<div class="container">
	<div class="row section" id="jumbo">
		<div class="col-xs-12 col-sm-12 col-md-8 green">
			<div class="text-center"><h1>SLIDER</h1></div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4 white">
			<div class="panel">
				<div class="panel-body">
					<h3 class="panel-title"><i class="fa fa-newspaper-o"></i> Berita Paling Populer</h3>
					<table class="table table-hover">
						<tbody>
							<?php for($i=0;$i<5;$i++):?>
								<tr>
									<td><img src="<?=base_url('assets/img/default-2.png')?>" alt="thumbnail" height="75"></td>
									<td>
										<h4>Judul berita</h4>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab quasi, perferendis...</p>
									</td>
								</tr>
							<?php endfor;?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="row section" id="new-article">
		<div class="page-header">
			<h3>Berita terbaru</h3>
		</div>
		<?php for($i=0;$i<4;$i++):?>
			<div class="col-sm-6 col-md-3">
				<div class="thumbnail">
					<img class="img-fit" src="<?=base_url('assets/img/default-2.png')?>" alt="thumbnail">
					<div class="caption">
						<h3>Ini judul berita</h3>
						<span>25 Desember, 2016</span>
					</div>
				</div>
			</div>
		<?php endfor;?>
	</div>
	<div class="row section" id="news">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-news" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Artikel Berita</a>
				</div>
				<div class="collapse navbar-collapse" id="nav-news">
					<form class="navbar-form navbar-right">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="cari berita">
						</div>
						<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
					</form>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#">Semua</a></li>
						<li><a href="#">Terbaru</a></li>
						<li><a href="#">Terpopuler</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="col-md-12 white">
			<div class="news-list">
				<?php for($i=0;$i<8;$i++):?>
					<div class="col-xs-12 col-sm-4 col-md-3">
						<div class="thumbnail">
							<img class="img-fit" src="<?=base_url('assets/img/default-2.png')?>" alt="thumbnail" width="100%">
							<div class="caption">
								<h5>Ini judul berita</h5>
							</div>
						</div>
					</div>
				<?php endfor;?>
			</div>
		</div>
	</div>

	<div class="row section" id="misc1">
		<div class="col-xs-12 col-sm-6 col-md-9 white">
			<div class="row" id="agenda">
				<div class="col-xs-12">
					<div class="page-header">
						<h4>Agenda terbaru</h4>
					</div>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae exercitationem, dolorem sint libero, animi nesciunt eum sequi natus esse fugiat vero doloremque rem nulla quisquam.</p>
				</div>
			</div>
			<div class="row" id="regulasi">
				<div class="col-xs-12">
					<div class="page-header">
						<h4>Regulasi terbaru</h4>
					</div>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, accusantium temporibus enim debitis vitae similique nihil. Id iusto iste dolores, fugit necessitatibus similique expedita neque.</p>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-3 blue" id="sosmed">
			<div class="page-header">
				<h4>Sosisal media</h4>
			</div>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate possimus ratione voluptatibus deserunt libero est odio dignissimos repellendus, in fugiat!</p>
		</div>
	</div>
	<div class="row section" id="banner-full">
		<div class="col-md-12">
			<img src="<?=base_url('assets/img/default.png')?>" alt="banner">
		</div>
	</div>
	<div class="row section" id="banner-half">
		<div class="col-xs-12 col-sm-12 col-md-6">
			<img src="<?=base_url('assets/img/default.png')?>" alt="banner">
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6">
			<img src="<?=base_url('assets/img/default.png')?>" alt="banner">
		</div>
	</div>

	<div class="row section white" id="gallery-photo">

	</div>
</div>