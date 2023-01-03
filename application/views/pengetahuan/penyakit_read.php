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
									<li class="breadcrumb-item"><a href="">Basic Initialization</a>
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
									<table id="data-table-default" class="table table-td-valign-middle">
										<tr>
											<th style="width: 20%;">Kode Kasus</th>
											<td style="width: 1%;">:</td>
											<td><?php echo $kd_kasus; ?></td>
										</tr>
										<tr>
											<th style="width: 20%;">Kode Penyakit</th>
											<td style="width: 1%;">:</td>
											<td><?php echo $kd_penyakit; ?></td>
										</tr>
										<tr>
											<th style="width: 20%;">Penyakit</th>
											<td style="width: 1%;">:</td>
											<td><?php echo $penyakit; ?></td>
										</tr>
										<tr>
											<th>Deskripsi</th>
											<td>:</td>
											<td><?php echo $deskripsi; ?></td>
										</tr>
										<tr>
											<th>Solusi</th>
											<td>:</td>
											<td><?php echo $solusi; ?></td>
										</tr>
									</table>
									<form action="<?= base_url() ?>pengetahuan/bobot" method="POST">

										<div class="form-row">
											<input type="hidden" readonly value="<?= $kd_penyakit ?>" name="kd_penyakit" class="form-control" id="" placeholder="">
											<input type="hidden" readonly value="<?= $kd_kasus ?>" name="kd_kasus" class="form-control" id="" placeholder="">
											<?php foreach ($gejala_data as $value) { ?>
												<div class="form-group col-md-6" style="margin-bottom: -10px;">
													<div class="input-group">
														<span class="input-group-addon">
															<input type="checkbox" <?= checked($kd_kasus, $kd_penyakit, $value->kd_gejala) ?> name="kd_gejala[]" value="<?= $value->kd_gejala ?>" aria-label="Checkbox for following text input">
														</span>
														<input type="text" readonly class="form-control" aria-label="Text input with dropdown button" placeholder="<?= $value->gejala ?>">
													</div>
												</div>
											<?php  } ?>
											<div class="form-group" style="margin-top: 5px;float:right">
												<a href="<?php echo site_url('pengetahuan') ?>" class="btn btn-info"><i class="fa fa-undo"></i> Kembali</a>
												<button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Save</button>
											</div>
										</div>
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
