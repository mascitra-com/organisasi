<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Detail Agenda</h3>
            </div>
            <div class="panel-body">
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
                        <td><?=date('d-m-Y', strtotime($agenda->agenda_date))?></td>
                    </tr>
                </table>
                <a href="<?=site_url('agenda')?>" class="btn btn-default">Kembali</a>
            </div>
        </div>
    </div>
</div>