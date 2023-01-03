<div class="pcoded-content">
	<div class="pcoded-inner-content">
		<div class="main-body">
			<div class="page-wrapper">
				<div class="page-header">
					<div class="row align-items-end">
						<div class="col-lg-8">
							<div class="page-header-title">
								<div class="d-inline">
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="page-header-breadcrumb">
								<ul class="breadcrumb-title">
									<li class="breadcrumb-item">
										<a href="index-1.htm"> Home </a>
									</li>
									<li class="breadcrumb-item">Konsultasi</li>
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
									<div class="row">
										<div class="form-column col-lg-6 col-md-12 col-sm-12 offset-md-3">
											<center>
												<img src=" <?= base_url() ?>assets/img/logo.png" alt=""> <br> <br>
												<div class="alert alert-primary background-primary">
													SISTEM PAKAR DIAGNOSA PENYAKIT PADA IBU HAMIL DENGAN
													METODE FORWARD CHAINING DAN NAIVE BAYES
												</div>
											</center>
										</div>
										<div class="form-column col-lg-12 col-md-12 col-sm-12">
											<form action="<?= base_url() ?>konsultasi/proses" method="POST">
												<?php if ($this->fungsi->user_login()->level_id == 1) { ?>
													<div class="form-group col-md-6  offset-md-3">
														<div class=" form-group">
															<select name="user_id" class="form-control" required>
																<option value=""> <b>-- Pilih User --</b> </option>
																<?php foreach ($user_data as  $value) { ?>
																	<option value="<?= $value->user_id ?>"><?= $value->nama ?> </option>
																<?php } ?>
															</select>
														</div>
													</div>
												<?php } else { ?>
													<input type="hidden" readonly class="form-control" name="user_id" value="<?= $this->fungsi->user_login()->user_id ?>">
												<?php } ?>

												<div class="form-row">
													<?php foreach ($gejala_data as $value) { ?>
														<div class="form-group col-md-6" style="margin-bottom: -10px;">
															<div class="input-group">
																<span class="input-group-addon">
																	<input type="checkbox" aria-label="Checkbox for following text input" name="kd_gejala[]" value="<?= $value->kd_gejala ?>">
																</span>
																<input type="text" readonly class="form-control" aria-label="Text input with dropdown button" placeholder="<?= $value->kd_gejala ?> - <?= $value->gejala ?>">
															</div>
														</div>
													<?php  } ?>
												</div>
												<div class="form-group" style="margin-top: 5px;float:right">
													<button type="submit" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Proses</button>
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
	</div>
