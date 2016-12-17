<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Edit Menu</h3>
            </div>
            <div class="panel-body">
                <form action="<?=site_url('menu/update/'. $menu->id)?>" method="POST">
                    <div class="form-group">
                        <label for="name">Nama Menu</label>
                        <?php echo form_error('name'); ?>
                        <input type="text" class="form-control" id="name" name="nama_menu" value="<?= $menu->nama_menu ?>">
                    </div>
                    <div class="form-group">
                        <label for="link">Link Menu</label>
                        <?php echo form_error('link'); ?>
                        <div class="input-group">
                            <div class="input-group-addon"><?=site_url().'/'?></div>
                            <input type="text" class="form-control" id="link" name="link" value="<?= $menu->link ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="menu_date">Deskripsi Menu</label>
                        <?php echo form_error('deskripsi_menu'); ?>
                        <textarea class="form-control" name="deskripsi_menu" id="deskripsi_menu" placeholder="Deskripsi Menu" required><?= (isset($menu->deskripsi_menu)) ? $menu->deskripsi_menu : ''; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-default"><i class="fa fa-save"></i> Simpan</button>
                    <a href="<?=site_url('menu')?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>