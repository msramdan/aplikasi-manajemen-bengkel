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
								<div class="card-block" style="overflow-x: scroll;">
									<div style="padding-bottom: 10px;">
										<?php echo anchor(site_url('gejala/create'), '<i class="fa fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-grd-info btn sm"'); ?></div>
									<table id="simpletable" class="table table-bordered table-hover table-td-valign-middle">
										<thead>
											<tr>
												<th>No</th>
												<th>Kode Gejala</th>
												<th>Gejala</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody><?php $no = 1;
												foreach ($gejala_data as $gejala) {
												?>
												<tr>
													<td><?= $no++ ?></td>
													<td><?php echo $gejala->kd_gejala ?></td>
													<td><?php echo $gejala->gejala ?></td>
													<td style="text-align:center" width="200px">
														<?php
														echo anchor(site_url('gejala/update/' . encrypt_url($gejala->kd_gejala)), '<i class="fa fa-pencil" aria-hidden="true"></i>', 'class="btn btn-primary btn-sm update_data"');
														echo '  ';
														echo anchor(site_url('gejala/delete/' . encrypt_url($gejala->kd_gejala)), '<i class="fa fa-trash" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm delete_data" Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
														?>
													</td>
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
