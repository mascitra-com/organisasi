<div class="jumbotron">
	<div class="container">
		<h1>Selamat Datang!</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, accusantium. Sunt recusandae fugiat optio eligendi, et veniam obcaecati fugit cumque, odio eaque magni sit deleniti dolores nisi possimus quasi! Temporibus nobis velit magni, quas omnis quidem error, ab sint, distinctio, esse voluptatibus accusantium ratione ducimus.</p>
		<p><a class="btn btn-warning btn-lg" href="#" role="button">Learn more</a></p>
	</div>
</div>
<div class="container-fluid" id="sejarah">
	<div class="row section">
		<div class="col-sm-12 col-md-6">
			<img src="http://cdn.betakit.com/wp-content/uploads/2015/11/toronto.jpg" class="img-responsive" alt="">
		</div>
		<div class="col-sm-12 col-md-6">
			<h1 class="title">Sejarah singkat</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea earum sapiente aut maiores alias, corrupti quo molestias! Corporis consequuntur eius adipisci animi quisquam minima esse eveniet laudantium quam. Quod, culpa nobis, quia sapiente tempore praesentium fuga pariatur quisquam, earum eligendi distinctio! Saepe expedita, magni! Voluptatem dolorum aliquam, quae neque earum quo laborum ipsa. Debitis excepturi vel corporis labore, illum iusto.</p>
		</div>
	</div>
</div>
<div class="container-fluid" id="news">
	<div class="page-header">
		<h3>Berita terbaru</h3>
	</div>
	<div class="row section">
		<?php for($i=0; $i<4; $i++): ?>
			<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
				<div class="thumbnail">
					<img src="https://s3.amazonaws.com/eb-blog-bloguk/wp-content/uploads/shutterstock_193539209-1.jpg" alt="gambar" class="news-thumbnail">
					<div class="caption">
						<span class="date"><span class="glyphicon glyphicon-bookmark"></span> <?=date('l, d M Y')?></span>
						<h3 class="title">Judul Berita</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae, nulla ullam laborum ipsa?</p>
						<p><a href="#" role="button">Selengkapnya...</a></p>
					</div>
				</div>
			</div>
		<?php endfor;?>
	</div>
</div>