<table class="table">
    <tr>
        <th>Nama Agenda</th>
        <td><?= $agenda->name ?></td>
    </tr>
    <tr>
        <th>Isi Agenda</th>
        <td><?= $agenda->body ?></td>
    </tr>
    <tr>
        <th>Tanggal Pelaksanaan</th>
        <td><?= $agenda->agenda_date ?></td>
    </tr>
</table>
<a href="<?=site_url('agenda')?>" class="btn btn-default">Kembali</a>
