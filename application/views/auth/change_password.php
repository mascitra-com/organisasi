<div class="row">
      <div class="col-md-12">
            <div class="panel panel-success">
                  <div class="panel-heading">
                        <h3 class="panel-title">Ubah Password</h3>
                  </div>
                  <div class="panel-body">
                        <form action="<?=site_url('auth/change_password')?>">
                              <div id="infoMessage"><?php echo $message;?></div>
                              <div class="form-group">
                                    <label for="">Password Lama</label>
                                    <?php echo form_input($old_password);?>
                              </div>

                              <div class="form-group">
                                    <label for="new_password"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?></label>
                                    <?php echo form_input($new_password);?>
                              </div>

                              <div class="form-group">
                                    <label for="">Tulis ulang password</label>
                                    <?php echo form_input($new_password_confirm);?>
                              </div>

                              <?php echo form_input($user_id);?>
                              <div class="form-group">
                                    <button class="btn btn-default" type="submit">Simpan</button>
                                    <button class="btn btn-default" type="reset">Batal</button>
                              </div>  
                        </form>
                  </div>
            </div>
      </div>
</div>