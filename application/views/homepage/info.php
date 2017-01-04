<div class="container">
    <div class="row" style="margin-top: 1em">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h1 class="title">Informasi Website</h1>
                </div>
                <div class="content" style="margin-top:1em;">
                    <div class="row">
                        <div class="col-md-6">
                            <?php foreach ($infos as $info): ?>
                                <h3>Nama Website</h3>
                                <h4><?= $info->acronym ?></h4>
                                <h3>Deskripsi Website</h3>
                                <p><?= $info->description ?></p>
                                <h3>Alamat</h3>
                                <p><?= $info->office_address ?></p>
                                <h3>No. Telepon</h3>
                                <p><?= $info->phone ?></p>
                                <h3>No. Telepon (Alternatif)</h3>
                                <p><?= $info->phone_alt != NULL ? $info->phone_alt : '-' ?></p>
                                <h3>E-mail</h3>
                                <p><?= $info->email ?></p>
                                <h3>Kode Post</h3>
                                <p><?= $info->postal_code ?></p>
                            <?php endforeach; ?>
                        </div>
                        <div class="col-md-6">
                            <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1974.8394004952918!2d113.22383104087417!3d-8.134145351120482!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf0c8b740c98c4592!2sKantor+Bupati+Lumajang!5e0!3m2!1sid!2sid!4v1477998429134"
                                    width="550" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row section" id="banner-full">
            <div class="col-md-12">
                <img src="<?=$banners[0]?>" alt="banner">
            </div>
        </div>
    </div>
</div>