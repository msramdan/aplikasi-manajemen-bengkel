<div class="pcoded-content">
	<div class="pcoded-inner-content">
		<div class="main-body">
			<div class="page-wrapper">
				<div class="page-header">
					<div class="row align-items-end">
						<div class="col-lg-8">
							<div class="page-header-title">
								<div class="d-inline">
									<h4>Service</h4>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="page-header-breadcrumb">
								<ul class="breadcrumb-title">
									<li class="breadcrumb-item">
										<a href="index-1.htm"> Home </a>
									</li>
									<li class="breadcrumb-item">Service</li>
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
										<?php echo anchor(site_url('service/create'), '<i class="fa fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-grd-info btn sm"'); ?></div>
									<table id="simpletable" class="table table-bordered table-hover nowrap">
										<thead>
											<tr class="table-active">
												<th>No</th>
												<th>Kode Service</th>
												<th>Nama Service</th>
												<th>Harga</th>
												<th>Keterangan</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody><?php $no = 1;
												foreach ($service_data as $service) {
												?>
												<tr>
													<td><?= $no++ ?></td>
													<td><?php echo $service->kode_service ?></td>
													<td><?php echo $service->nama_service ?></td>
													<td><?php echo rupiah($service->harga) ?></td>
													<td><?php echo $service->keterangan ?></td>
													<td>
														<?php
														echo anchor(site_url('service/update/' . encrypt_url($service->service_id)), '<i class="fa fa-pencil" aria-hidden="true"></i>', 'class="btn btn-grd-primary btn-sm"');
														echo '  ';
														echo anchor(site_url('service/delete/' . encrypt_url($service->service_id)), '<i class="fa fa-trash" aria-hidden="true"></i>', 'class="btn btn-grd-danger btn-sm" Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
