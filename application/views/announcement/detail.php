<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Sunting Pengumuman</h3>
            </div>
            <div class="panel-body">
                <form action="<?=site_url('announcement/update/'.$announcement['slug'])?>" method="POST">
                    <div class="form-group">
                        <label for="">Judul Pengumuman</label>
                        <?php echo form_error('name'); ?>
                        <input type="text" name="name" class="form-control" placeholder="judul pengumuman" value="<?= (isset($announcement['name'])) ? $announcement['name'] : ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="">Isi Pengumuman</label>
                        <?php echo form_error('body'); ?>
                        <textarea name="body" class="form-control" placeholder="isi pengumuman" required><?= (isset($announcement['body'])) ? $announcement['body'] : ''; ?></textarea>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="">Masa aktif sampai dengan...</label>
                                <?php echo form_error('expiration_date'); ?>
                                <input type="date" min="<?=date('Y-m-d');?>" name="expiration_date" class="form-control" placeholder="masa aktif pengumuman" value="<?= (isset($announcement['expiration_date'])) ? $announcement['expiration_date'] : ''; ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="">Prioritas</label>
                                <?php echo form_error('priority'); ?>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="priority" value="1"
                                        <?php
                                            if (isset($announcement['priority'])) {
                                                if ($announcement['priority'] === '1') {
                                                    echo 'checked';
                                                }else{
                                                    echo '';
                                                }
                                            }else{
                                                echo '';
                                            }
                                        ?>
                                        > Pengumuman Penting!
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default"><i class="fa fa-save"></i><span class="icon-label">Submit</span></button>
                        <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i><span class="icon-label">Batal</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>