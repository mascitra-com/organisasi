<div class="row">
	<div class="col-md-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title"><?=lang('deactivate_heading')?></h3>
				<p><?=sprintf(lang('deactivate_subheading'), $user->username)?></p>
			</div>
			<div class="panel-body">
				<?php echo form_open('auth/deactivate/' . $user->id); ?>
				<div class="form-group">
					<label>
						<input type="radio" name="confirm" value="yes" checked="checked" /> Ya
					</label>
					<label>
						<input type="radio" name="confirm" value="no" /> Tidak
					</label>
				</div>

				<?php echo form_hidden($csrf); ?>
				<?php echo form_hidden(array('id'=>$user->id)); ?>

				<div class="form-group"><button class="btn btn-default" type="submit">Simpan</button></div>

				<?php echo form_close();?>
			</div>
		</div>
	</div>
</div>