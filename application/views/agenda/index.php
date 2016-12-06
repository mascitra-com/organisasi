<a href="<?=site_url('agenda/create')?>">Tambah Agenda Baru</a>
<table class="table">
    <thead>
    <th>No.</th>
    <th>Nama Agenda</th>
    <th>Isi Agenda</th>
    <th>Tanggal Pelaksanaan</th>
    <th>Aksi</th>
    </thead>
    <tbody>
    <?php if(!empty($agendas)): $no=1; foreach ($agendas as $agenda): ?>
        <tr>
            <td><?=$no++?></td>
            <td><?=$agenda->name?></td>
            <td><?=$agenda->body?></td>
            <td><?=$agenda->agenda_date?></td>
            <td>
                <a href="<?=site_url('agenda/show/'.$agenda->id)?>">Detail</a>
                <a href="<?=site_url('agenda/edit/'.$agenda->id)?>">Edit</a>
                <a href="<?=site_url('agenda/destroy/'.$agenda->id)?>">Hapus</a>
            </td>
        </tr>
    <?php endforeach; endif; ?>
    </tbody>
</table>