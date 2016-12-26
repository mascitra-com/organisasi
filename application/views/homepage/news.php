<div class="container">
	<div class="page-header">
		<h1><i class="fa fa-newspaper-o"></i> Berita</h1>
	</div>
	<?php for($i=0;$i<5;$i++): ?>
		<div class="row news-list">
			<div class="col-md-5">
				<img src="<?=base_url('assets/img/bg-login.jpg')?>" alt="judul berita" class="img-fit" width="100%" height="250px">
			</div>
			<div class="col-md-7">
				<h1 class="news-title">Ini adalah judul berita</h1>
				<span class="news-date"><i class="fa fa-calendar"></i> 25 Desember 2016</span>
				<span class="news-author"><i class="fa fa-user"></i> Admin</span>
				<div class="news-content">
					<p>
						<strong>Jember -- </strong>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum laboriosam provident nam, 
						consequatur iste pariatur explicabo cupiditate quidem enim tempore sit eveniet similique? 
						Dolorem eaque saepe delectus perspiciatis voluptatibus, iure labore pariatur recusandae autem 
						numquam.
					</p>
					<a href="<?=site_url('homepage/news_article')?>">selengkapnya <i class="fa fa-arrow-right"></i></a>
				</div>
			</div>
		</div>
	<?php endfor; ?>
	<nav aria-label="...">
		<ul class="pager">
			<li class="previous"><a href="#"><span aria-hidden="true">&larr;</span> Lebih Baru</a></li>
			<li class="next"><a href="#">Lebih Lama <span aria-hidden="true">&rarr;</span></a></li>
		</ul>
	</nav>
</div>