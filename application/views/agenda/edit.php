<form action="<?=site_url('agenda/update/'. $agenda->id)?>" method="POST">
    <div class="form-group">
        <label for="name">Nama Agenda</label>
        <?php echo form_error('name'); ?>
        <input type="text" class="form-control" id="name" name="name" value="<?= $agenda->name ?>">
    </div>
    <div class="form-group">
        <label for="body">Isi Agenda</label>
        <?php echo form_error('body'); ?>
        <input type="text" class="form-control" id="body" name="body" value="<?= $agenda->body ?>">
    </div>
    <div class="form-group">
        <label for="agenda_date">Isi Profil</label>
        <?php echo form_error('agenda_date'); ?>
        <input type="date" class="form-control" id="agenda_date" name="agenda_date" value="<?= date('Y-m-d', strtotime($agenda->agenda_date)) ?>">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
    <a href="<?=site_url('agenda')?>" class="btn btn-default">Kembali</a>
</form>