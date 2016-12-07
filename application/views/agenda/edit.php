<form action="<?=site_url('agenda/update')?>" method="POST">
    <input type="text" value="<?= $agenda->id ?>" name="id" hidden>
    <div class="form-group">
        <label for="name">Nama Agenda</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $agenda->name ?>">
    </div>
    <div class="form-group">
        <label for="body">Isi Agenda</label>
        <input type="text" class="form-control" id="body" name="body" value="<?= $agenda->body ?>">
    </div>
    <div class="form-group">
        <label for="agenda_date">Isi Profil</label>
        <input type="date" class="form-control" id="agenda_date" name="agenda_date" value="<?= $agenda->agenda_date ?>">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
    <a href="<?=site_url('agenda')?>" class="btn btn-default">Kembali</a>
</form>