<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Tambah Pengumuman</h3>
            </div>
            <div class="panel-body">
                <form action="<?=site_url('announcement/update')?>" method="POST">
                    <div class="form-group">
                        <label for="">Judul Penguman</label>
                        <input type="text" name="judul" class="form-control" placeholder="judul pengumuman">
                    </div>
                    <div class="form-group">
                        <label for="">Judul Penguman</label>
                        <textarea name="isi" class="form-control" placeholder="isi pengumuman"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="">Masa aktif sampai dengan...</label>
                                <input type="date" name="masa_aktif" class="form-control" placeholder="masa aktif pengumuman">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="">Prioritas</label>
                                <div class="checkbox">
                                    <label>
                                    <input type="checkbox" name="prioritas" value="1"> Pengumuman Penting!
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