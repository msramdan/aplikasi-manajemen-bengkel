<div class="pcoded-content">
	<div class="pcoded-inner-content">
		<div class="main-body">
			<div class="page-wrapper">
				<div class="page-header">
					<div class="row align-items-end">
						<div class="col-lg-8">
							<div class="page-header-title">
								<div class="d-inline">
									<h4>Gejala</h4>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="page-header-breadcrumb">
								<ul class="breadcrumb-title">
									<li class="breadcrumb-item">
										<a href="index-1.htm"> Home </a>
									</li>
									<li class="breadcrumb-item"><a href="">Gejala</a>
									</li>
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
													<td>Kode Gejala <?php echo form_error('kd_gejala') ?></td>
													<td><input type="text" class="form-control" name="kd_gejala" readonly id="gejala" placeholder="Gejala" value="<?php echo $kd_gejala; ?>" /></td>
												</tr>
												<tr>
													<td>Gejala <?php echo form_error('gejala') ?></td>
													<td><input type="text" class="form-control" name="gejala" id="gejala" placeholder="Gejala" value="<?php echo $gejala; ?>" /></td>
												</tr>
												<tr>
													<td></td>
													<td>
														<button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> <?php echo $button ?></button>
														<a href="<?php echo site_url('gejala') ?>" class="btn btn-info"><i class="fa fa-undo"></i> Kembali</a>
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
