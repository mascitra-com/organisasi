<div class="row">
	<div class="col-md-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title">Full Banner</h3>
			</div>
			<div class="panel-body">
				<form action="<?=site_url('setting/update_banner/1')?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Upload Banner</label>
						<input type="file" name="file" accept="image/jpg, image/jpeg, image/png">
					</div>
					<div class="form-group">
						<button class="btn btn-default" type="submit"><i class="fa fa-save"></i></button>
						<a href="<?=site_url('setting/remove_image/1')?>" class="btn btn-default"><i class="fa fa-close"></i></a>
					</div>
				</form>
				<br>
				<img src="<?=$banners[0]?>" alt="banner-full" width="100%" height="200px">
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title">Half Banner 1</h3>
			</div>
			<div class="panel-body">
                <form action="<?=site_url('setting/update_banner/2')?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
						<label for="">Upload Banner</label>
						<input type="file" name="file" accept="image/jpg, image/jpeg, image/png">
					</div>
					<div class="form-group">
						<button class="btn btn-default" type="submit"><i class="fa fa-save"></i></button>
						<a href="<?=site_url('setting/remove_image/2')?>" class="btn btn-default"><i class="fa fa-close"></i></a>
					</div>
				</form>
				<br>
				<img src="<?=$banners[1]?>" alt="banner-half1" width="100%" height="200px">
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title">Half Banner 2</h3>
			</div>
			<div class="panel-body">
                <form action="<?=site_url('setting/update_banner/3')?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
						<label for="">Upload Banner</label>
						<input type="file" name="file" accept="image/jpg, image/jpeg, image/png">
					</div>
					<div class="form-group">
					<button class="btn btn-default" type="submit"><i class="fa fa-save"></i></button>
						<a href="<?=site_url('setting/remove_image/3')?>" class="btn btn-default"><i class="fa fa-close"></i></a>
					</div>
				</form>
				<br>
				<img src="<?=$banners[2]?>" alt="banner-half2" width="100%" height="200px">
			</div>
		</div>
	</div>
</div>