<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Tambah Menu</h3>
            </div>
            <div class="panel-body">
                <form action="<?=site_url('menu/store')?>" method="POST">
                    <div class="form-group">
                        <label for="name">Nama Menu</label>
                        <?php echo form_error('nama_menu'); ?>
                        <input type="text" class="form-control" id="name" name="nama_menu" placeholder="Nama Menu" value="<?= (isset($menu['nama_menu'])) ? $menu['nama_menu'] : ''; ?>" required >
                    </div>
                    <div class="form-group">
                        <label for="body">Link menu</label>
                        <?php echo form_error('link'); ?>
                        <div class="input-group">
                            <div class="input-group-addon"><?=site_url().'/'?></div>
                            <input type="text" class="form-control" id="name" name="link" placeholder="Link Menu" value="<?= (isset($menu['link'])) ? $menu['link'] : ''; ?>" required >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_menu">Deskripsi menu</label>
                        <?php echo form_error('link'); ?>
                        <textarea class="form-control" name="deskripsi_menu" id="deskripsi_menu" placeholder="Deskripsi Menu" required><?= (isset($menu['deskripsi_menu'])) ? $menu['deskripsi_menu'] : ''; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                    <button type="reset" class="btn btn-default">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>