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
								<div class="card-block" style="overflow-x: scroll;">
									<?php if ($this->fungsi->user_login()->level_id == 1) { ?>
										<?php echo anchor(site_url('penyakit/create'), '<i class="fa fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-grd-info btn sm"'); ?>
									<?php } ?>
									<br><br>
									<table id="simpletable" class="table table-bordered table-hover table-td-valign-middle">
										<thead>
											<tr>
												<th>No</th>
												<th>Kode Penyakit</th>
												<th>Penyakit</th>
												<th>Deskripsi</th>
												<th>Solusi</th>
												<?php if ($this->fungsi->user_login()->level_id == 1) { ?>
													<th>Action</th>
												<?php } ?>
											</tr>
										</thead>
										<tbody><?php $no = 1;
												foreach ($penyakit_data as $penyakit) {
												?>
												<tr>
													<td><?= $no++ ?></td>
													<td><?php echo $penyakit->kd_penyakit ?></td>
													<td><?php echo $penyakit->penyakit ?></td>
													<td><?php echo $penyakit->deskripsi ?></td>
													<td><?php echo $penyakit->solusi ?></td>
													<?php if ($this->fungsi->user_login()->level_id == 1) { ?>
														<td style="text-align:center" width="200px">

															<?php
															echo anchor(site_url('penyakit/update/' . encrypt_url($penyakit->kd_penyakit)), '<i class="fa fa-pencil" aria-hidden="true"></i>', 'class="btn btn-primary btn-sm update_data"');
															echo '  ';
															echo anchor(site_url('penyakit/delete/' . encrypt_url($penyakit->kd_penyakit)), '<i class="fa fa-trash" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm delete_data" Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
															?>
														</td>
													<?php } ?>
												</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
