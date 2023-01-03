<div class="pcoded-content">
	<div class="pcoded-inner-content">
		<div class="main-body">
			<div class="page-wrapper">
				<div class="page-header">
					<div class="row align-items-end">
						<div class="col-lg-8">
							<div class="page-header-title">
								<div class="d-inline">
									<h4>Pengetahuan</h4>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="page-header-breadcrumb">
								<ul class="breadcrumb-title">
									<li class="breadcrumb-item">
										<a href="index-1.htm"> Home </a>
									</li>
									<li class="breadcrumb-item">Pengetahuan</li>
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
										<?php echo anchor(site_url('pengetahuan/create'), '<i class="fa fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-grd-info btn sm"'); ?></div>
									<table id="simpletable" class="table table-bordered table-hover table-td-valign-middle">
										<thead>
											<tr>
												<th>No</th>
												<th>Kode Kasus</th>
												<th>Penyakit</th>
												<th>Gejala - Bobot</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody><?php $no = 1;
												foreach ($pengetahuan_data as $pengetahuan) {
												?>
												<tr>
													<td><?= $no++ ?></td>
													<td><?php echo $pengetahuan->kd_kasus ?></td>
													<td><?php echo $pengetahuan->kd_penyakit ?> - <?php echo $pengetahuan->penyakit ?></td>
													<td>
														<?php $data = $this->db->query("SELECT * From pengetahuan join gejala on gejala.kd_gejala = pengetahuan.kd_gejala where kd_kasus='$pengetahuan->kd_kasus'")->result(); ?>
														<ul>
															<?php foreach ($data as $value) { ?>
																<li> - <?= $value->gejala ?></li>
															<?php } ?>
														</ul>
													</td>
													<td style="text-align:center" width="200px">
														<a href="<?= base_Url() ?>pengetahuan/read/<?= encrypt_url($pengetahuan->kd_kasus) ?>" class="btn btn-warning btn-sm "><i class="fa fa-list" aria-hidden="true"></i></a>
														<?php
														echo anchor(site_url('pengetahuan/delete/' . encrypt_url($pengetahuan->kd_kasus)), '<i class="fa fa-trash" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm delete_data" Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
