<?php
$msg = $this->session->flashdata('message');
if(!empty($msg)): 
?>

<div class="alert alert-<?=$msg[1]?>">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>Pesan!</strong>
	<?=$msg[0]?>
</div>

<?php endif; ?>