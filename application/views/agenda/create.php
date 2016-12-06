<form action="<?=site_url('agenda/store')?>" method="POST">
    <div class="form-group">
        <label for="name">Nama Agenda</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="">
    </div>
    <div class="form-group">
        <label for="body">Isi Agenda</label>
        <textarea class="form-control" id="body" name="body"></textarea>
    </div>
    <div class="form-group">
        <label for="agenda_date">Isi Agenda</label>
        <input type="date" class="form-control" id="agenda_date" name="agenda_date" placeholder="">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>