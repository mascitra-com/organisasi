<div class="row">
	<header id="top-nav" class="clearfix">
		<div class="col-md-5">
			<!-- TOMBOL RESPONSIF -->
			<nav class="navbar-default pull-left" style="background-color: #FFF">
				<button class="navbar-toggle collapsed" type="button" data-toggle="offcanvas" data-target="#side-nav">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</nav>
			<span class="top-nav-title hidden-xs hidden-sm"><b>Halaman <?=(isset($_view['title']))?$_view['title']:'Admin panel'?></b></span>
		</div>
		<div class="col-md-7">
			<div class="pull-right">
				<a href="<?=site_url('auth/logout')?>" class="top-nav-menu"><i class="fa fa-lock"></i><span></span></a>
			</div>
		</div>
	</header>
</div>