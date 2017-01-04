<div class="container">
    <div class="row" style="margin-top: 1em">
        <div class="col-sm-12 col-md-5">
            <?php foreach ($infos as $info): ?>
                <div class="info">
                    <h1><?= $info->acronym ?></h1>
                    <p><?= $info->description ?></p>
                </div>
                <div class="info">
                    <h3>Alamat</h3>
                    <p><?= $info->office_address ?></p>
                    <span class="text-bold"><?= $info->postal_code ?></span>
                </div>
                <div class="info">
                    <h3>Kontak</h3>
                    <span><?= $info->phone ?></span>
                    <span><?= $info->phone_alt != NULL ? $info->phone_alt : '-' ?></span>
                    <span><?= $info->email ?></span>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="col-sm-12 col-md-7">
            <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1974.8394004952918!2d113.22383104087417!3d-8.134145351120482!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf0c8b740c98c4592!2sKantor+Bupati+Lumajang!5e0!3m2!1sid!2sid!4v1477998429134"
            width="100%" height="550px" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>
</div>