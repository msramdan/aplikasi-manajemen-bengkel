<div class="pcoded-content">
	<div class="pcoded-inner-content">
		<div class="main-body">
			<div class="page-wrapper">
				<div class="page-header">
					<div class="row align-items-end">
						<div class="col-lg-8">
							<div class="page-header-title">
								<div class="d-inline">
									<h4>Penyakit</h4>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="page-header-breadcrumb">
								<ul class="breadcrumb-title">
									<li class="breadcrumb-item">
										<a href="index-1.htm"> Home </a>
									</li>
									<li class="breadcrumb-item">Penyakit</li>
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
												<tr>
													<td>Kode Penyakit <?php echo form_error('kd_penyakit') ?></td>
													<td><input type="text" readonly class="form-control" name="kd_penyakit" id="kd_penyakit" placeholder="kd_penyakit" value="<?php echo $kd_penyakit; ?>" /></td>
												</tr>
												<tr>
													<td>Penyakit <?php echo form_error('penyakit') ?></td>
													<td><input type="text" class="form-control" name="penyakit" id="penyakit" placeholder="Penyakit" value="<?php echo $penyakit; ?>" /></td>
												</tr>

												<tr>
													<td>Deskripsi <?php echo form_error('deskripsi') ?></td>
													<td> <textarea class="form-control" rows="3" name="deskripsi" id="deskripsi" placeholder="Deskripsi"><?php echo $deskripsi; ?></textarea></td>
												</tr>

												<tr>
													<td>Solusi <?php echo form_error('solusi') ?></td>
													<td> <textarea class="form-control" rows="3" name="solusi" id="solusi" placeholder="Solusi"><?php echo $solusi; ?></textarea></td>
												</tr>
												<tr>
													<td></td>
													<td>
														<button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> <?php echo $button ?></button>
														<a href="<?php echo site_url('penyakit') ?>" class="btn btn-info"><i class="fa fa-undo"></i> Kembali</a>
													</td>
												</tr>
										</thead>
										</table>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
