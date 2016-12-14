<div class="row">
  <div class="col-md-12">
    <div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title"><?=lang('edit_user_heading')?></h3>
        <p><?=lang('edit_user_subheading')?></p>
      </div>
      <div class="panel-body">
        <div id="infoMessage"><?php echo $message;?></div>
        <?php echo form_open(uri_string());?>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <?php echo lang('edit_user_fname_label', 'first_name');?> <br />
              <?php echo form_input($first_name);?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <?php echo lang('edit_user_lname_label', 'last_name');?> <br />
              <?php echo form_input($last_name);?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <?php echo lang('edit_user_company_label', 'company');?> <br />
              <?php echo form_input($company);?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <?php echo lang('edit_user_phone_label', 'phone');?> <br />
              <?php echo form_input($phone);?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <?php echo lang('edit_user_password_label', 'password');?> <br />
              <?php echo form_input($password);?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?><br />
              <?php echo form_input($password_confirm);?>
            </div>
          </div>
        </div>
        <div class="form-group form-inline">
          <?php if ($this->ion_auth->is_admin()): ?>
            <h3><?php echo lang('edit_user_groups_heading');?></h3>
            <?php foreach ($groups as $group):?>
              <div class="checkbox">
                <label>
                  <?php
                  $gID=$group['id'];
                  $checked = null;
                  $item = null;
                  foreach($currentGroups as $grp) {
                    if ($gID == $grp->id) {
                      $checked= ' checked="checked"';
                      break;
                    }
                  }
                  ?>
                  <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
                  <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
                </label>
              </div>
            <?php endforeach?>

          <?php endif ?>
        </div>
        <?php echo form_hidden('id', $user->id);?>
        <?php echo form_hidden($csrf); ?>

        <div class="form-group">
          <button class="btn btn-default" type="submit">Simpan</button>
          <button class="btn btn-default" type="reset">Batal</button>
        </div>

        <?php echo form_close();?>
      </div>
    </div>
  </div>
</div>
