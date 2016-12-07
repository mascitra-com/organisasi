<form action="<?=site_url('agenda/store')?>" method="POST">
    <div class="form-group">
        <label for="name">Nama Agenda</label>
        <?php echo form_error('name'); ?>
        <input type="text" class="form-control" id="name" name="name" placeholder="" value="<?= (isset($agenda['name'])) ? $agenda['name'] : ''; ?>">
    </div>
    <div class="form-group">
        <label for="body">Isi Agenda</label>
        <?php echo form_error('body'); ?>
        <textarea class="form-control" id="body" name="body"><?= (isset($agenda['body'])) ? $agenda['body'] : ''; ?></textarea>
    </div>
    <div class="form-group">
        <label for="agenda_date">Tanggal Agenda</label>
        <?php echo form_error('agenda_date'); ?>
        <input type="date" class="form-control" id="agenda_date" name="agenda_date" placeholder="" value="<?= (isset($agenda['agenda_date'])) ? $agenda['agenda_date'] : ''; ?>"">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>