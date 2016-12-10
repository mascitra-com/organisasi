<div class="row">
  <div class="col-md-12">
    <div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title">Tambah User</h3>
      </div>
      <div class="panel-body">
        <form action="<?=site_url('auth/create_user')?>" method="post">
          <div id="infoMessage"><?=$message?></div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Nama Depan</label>
                <?=form_input($first_name)?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Nama Belakang</label>
                <?=form_input($last_name)?>
              </div>
            </div>
          </div>
          <?php
          if($identity_column!=='email') {
            echo "<div class='form-group'>";
            echo "<label>Identitas</label>";
            echo form_error('identity');
            echo form_input($identity);
            echo '</div>';
          }
          ?>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Nama Perusahaan</label>
                <?=form_input($company)?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Email</label>
                <?=form_input($email)?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Telpon</label>
                <?=form_input($phone)?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Password</label>
                <?=form_input($password)?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Tulis Ulang Password</label>
                <?=form_input($password_confirm)?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-default">Simpan</button>
            <button type="reset" class="btn btn-default">Batal</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>