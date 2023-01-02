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
								<div class="card-block" style="overflow-x: scroll;">
									<div style="padding-bottom: 10px;"><?php echo anchor(site_url('diagnosa/excel'), '<i class="far fa-file-excel" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-xs export_data"'); ?></div>

									<table id="simpletable" class="table table-bordered table-hover table-td-valign-middle">
										<thead>
											<tr>
												<th>No</th>
												<th>Pasien</th>
												<th>Penyakit</th>
												<th>Gejala</th>
												<th>Presentase</th>
												<th>Tanggal</th>
											</tr>
										</thead>
										<tbody><?php $no = 1;
												foreach ($diagnosa_data as $diagnosa) {
												?>
												<tr>
													<td><?= $no++ ?></td>
													<td><?php echo $diagnosa->nama ?></td>
													<td><?php echo $diagnosa->penyakit ?></td>
													<td>
														<ul>
															<?php foreach (json_decode($diagnosa->kd_gejala) as $value) { ?>
																<li><?= namaGejala($value) ?></li>
															<?php } ?>
														</ul>


													</td>
													<td><?php echo $diagnosa->presentase ?> %</td>
													<td><?php echo $diagnosa->tanggal ?></td>
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
