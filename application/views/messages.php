<?php if ($this->session->has_userdata('gagal')) { ?>
	<div class="alert alert-danger background-danger">
		<?= $this->session->flashdata('gagal'); ?>
	</div>

<?php } ?>
