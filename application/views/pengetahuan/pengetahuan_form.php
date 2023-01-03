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
								<div class="card-block">
									<form action="<?php echo $action; ?>" method="post">
										<thead>
											<table id="data-table-default" class="table  table-bordered table-hover table-td-valign-middle">
												<tr>
													<td>Kode Kasus <?php echo form_error('kd_kasus') ?></td>
													<td><input required readonly type="text" class="form-control" name="kd_kasus" id="kd_kasus" placeholder="Kd Kasus" value="<?php echo $kd_kasus; ?>" /></td>
												</tr>
												<tr>
													<td>Penyakit <?php echo form_error('kd_penyakit') ?></td>
													<td>
														<select name="kd_penyakit" class="form-control" required>
															<option value="">-- Pilih --</option>
															<?php foreach ($kd_penyakit as $data) { ?>
																<option value="<?= $data->kode ?>"><?= $data->kode ?> - <?= $data->penyakit ?></option>
															<?php } ?>
														</select>
													</td>
												</tr>
										</thead>
										</table>
										<div class="form-row">
											<?php foreach ($gejala_data as $value) { ?>
												<div class="form-group col-md-6" style="margin-bottom: -10px;">
													<div class="input-group">
														<span class="input-group-addon">
															<input type="checkbox" name="kd_gejala[]" value="<?= $value->kd_gejala ?>" aria-label="Checkbox for following text input">
														</span>
														<input type="text" readonly class="form-control" aria-label="Text input with dropdown button" placeholder="<?= $value->kd_gejala ?> - <?= $value->gejala ?>">
													</div>
												</div>
											<?php  } ?>
											<div class="form-group" style="margin-top: 5px;float:right">
												<a href="<?php echo site_url('pengetahuan') ?>" class="btn btn-info"><i class="fa fa-undo"></i> Kembali</a>
												<button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Save</button>
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
