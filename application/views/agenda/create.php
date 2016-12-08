<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Tambah Agenda</h3>
            </div>
            <div class="panel-body">
                <form action="<?=site_url('agenda/store')?>" method="POST">
                    <div class="form-group">
                        <label for="name">Nama Agenda</label>
                        <?php echo form_error('name'); ?>
                        <input type="text" class="form-control" id="name" name="name" placeholder="nama agenda" value="<?= (isset($agenda['name'])) ? $agenda['name'] : ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="body">Isi Agenda</label>
                        <?php echo form_error('body'); ?>
                        <textarea class="form-control" id="body" name="body" placeholder="isi agenda" required><?= (isset($agenda['body'])) ? $agenda['body'] : ''; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="agenda_date">Tanggal Agenda</label>
                        <?php echo form_error('agenda_date'); ?>
                        <input type="date" class="form-control" id="agenda_date" name="agenda_date" placeholder="waktu agenda" value="<?= (isset($agenda['agenda_date'])) ? $agenda['agenda_date'] : ''; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                    <button type="reset" class="btn btn-default">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>