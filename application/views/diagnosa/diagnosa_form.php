<div class="pcoded-content">
<div class="pcoded-inner-content">
	<div class="main-body">
		<div class="page-wrapper">
			<div class="page-header">
				<div class="row align-items-end">
					<div class="col-lg-8">
						<div class="page-header-title">
							<div class="d-inline">
								<h4>Diagnosa</h4>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="page-header-breadcrumb">
							<ul class="breadcrumb-title">
								<li class="breadcrumb-item">
									<a href="index-1.htm"> Home </a>
								</li>
								<li class="breadcrumb-item">Diagnosa</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="page-body">
				<div class="row">
					<div class="col-sm-12">
						<div class="card">
							<div class="card-block">
            <form action="<?php echo $action; ?>" method="post">
            <thead>
            <table id="data-table-default" class="table  table-bordered table-hover table-td-valign-middle">
	    <tr><td>Id Pasien <?php echo form_error('id_pasien') ?></td><td><input type="text" class="form-control" name="id_pasien" id="id_pasien" placeholder="Id Pasien" value="<?php echo $id_pasien; ?>" /></td></tr>
	    <tr><td>Kd Penyakit <?php echo form_error('kd_penyakit') ?></td><td><input type="text" class="form-control" name="kd_penyakit" id="kd_penyakit" placeholder="Kd Penyakit" value="<?php echo $kd_penyakit; ?>" /></td></tr>
	    
        <tr><td>Kd Gejala <?php echo form_error('kd_gejala') ?></td><td> <textarea class="form-control" rows="3" name="kd_gejala" id="kd_gejala" placeholder="Kd Gejala"><?php echo $kd_gejala; ?></textarea></td></tr>
	    <tr><td>Presentase <?php echo form_error('presentase') ?></td><td><input type="text" class="form-control" name="presentase" id="presentase" placeholder="Presentase" value="<?php echo $presentase; ?>" /></td></tr>
	    <tr><td>Tanggal <?php echo form_error('tanggal') ?></td><td><input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_diagnosa" value="<?php echo $id_diagnosa; ?>" /> 
	    <button type="submit" class="btn btn-grd-danger"><i class="fa fa-save"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('diagnosa') ?>" class="btn btn-grd-info"><i class="fa fa-undo"></i> Kembali</a></td></tr>
</thead>
	</table></form>        </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>