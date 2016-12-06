<div class="jumbotron">
	<div class="container">
		<h1>Selamat Datang!</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, accusantium. Sunt recusandae fugiat optio eligendi, et veniam obcaecati fugit cumque, odio eaque magni sit deleniti dolores nisi possimus quasi! Temporibus nobis velit magni, quas omnis quidem error, ab sint, distinctio, esse voluptatibus accusantium ratione ducimus.</p>
		<p><a class="btn btn-warning btn-lg" href="#" role="button">Learn more</a></p>
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
<div class="container-fluid">
	<div class="row section">
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
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
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
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
	</div>
</div>