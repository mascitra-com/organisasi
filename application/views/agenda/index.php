<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title pull-left">Agenda</h3>
                <a class="btn btn-default btn-sm pull-right" href="<?=site_url('agenda/create')?>"><i class="fa fa-plus-circle"></i> agenda baru</a>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body table-responsive table-full-width">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>Nama Agenda</td>
                            <td>Isi Agenda</td>
                            <td class="text-center">Tanggal Pelaksanaan</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($agendas)): $no=1; foreach ($agendas as $agenda): ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$agenda->name?></td>
                                <td><?=$agenda->body?></td>
                                <td class="text-center"><?=date('d-m-Y', strtotime($agenda->agenda_date))?></td>
                                <td class="text-nowrap">
                                    <a class="btn btn-xs btn-default" href="<?=site_url('agenda/show/'.$agenda->id)?>"><i class="fa fa-info-circle"></i></a>
                                    <a class="btn btn-xs btn-success" href="<?=site_url('agenda/edit/'.$agenda->id)?>"><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-xs btn-danger" href="<?=site_url('agenda/destroy/'.$agenda->id)?>" onclick="return confirm('Apakah anda yakin?')"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>