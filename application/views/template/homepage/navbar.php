<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?=site_url('homepage')?>">ORGANISASI</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="<?=site_url('homepage') ?>">Beranda</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profil <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <?php if(!empty($profiles)): $no=1; foreach ($profiles as $profile): ?>
              <li><a href="<?=site_url('homepage/profile_show/'.$profile->slug)?>"><?=$profile->name?></a></li>
            <?php endforeach; endif;?>
          </ul>
        </li>
        <li><a href="<?=site_url('homepage/news')?>">Berita</a></li>
        <li><a href="<?=site_url('homepage/agenda')?>">Agenda</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Galeri <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Galeri Foto</a></li>
            <li><a href="#">Galeri Video</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Buku Tamu</a></li>
          </ul>
        </li>
        <li><a href="<?=site_url('homepage/regulation')?>">Regulasi</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>