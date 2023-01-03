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
								<div class="card-block">
									<div class="row">
										<div class="form-column col-lg-6 col-md-12 col-sm-12">
											<center>
												<div class="alert alert-primary background-primary">IDENTITAS PASIEN
												</div>
												<table class="table table-sm">

													<tbody>
														<tr>
															<th style="width: 10%;">Username</th>
															<td style="width: 1%;">:</td>
															<td><?= $user->username  ?></td>
														</tr>
														<tr>
															<th scope="row">Nama</th>
															<td>:</td>
															<td><?= $user->nama  ?></td>
														</tr>
														<tr>
															<th scope="row">Alamat</th>
															<td>:</td>
															<td><?= $user->alamat  ?></td>
														</tr>
														<tr>
															<th scope="row">Email</th>
															<td>:</td>
															<td><?= $user->email  ?></td>
														</tr>
														<tr>
															<th scope="row">No Hp</th>
															<td>:</td>
															<td><?= $user->phone  ?></td>
														</tr>

													</tbody>
												</table>
											</center>
										</div>
										<div class="form-column col-lg-6 col-md-12 col-sm-12">
											<center>
												<div class="alert alert-primary background-primary">GEJALA YANG DIRASAKAN
												</div>

											</center>
											<ul style="margin-left: 20px;">
												<?php $no = 1;
												foreach ($data_gejala as $value) { ?>
													<li><?= $no++ ?> . <?= namaGejala($value) ?> </li>
												<?php } ?>
											</ul>
										</div>
										<div class="form-column col-lg-6 col-md-12 col-sm-12">
											<center>
												<div class="alert alert-primary background-primary">PERSENTASE NILAI PREDIKSI SETIA PENYAKIT
												</div>
												<table class="table table-sm">
													<tbody>
														<tr>
															<th scope="row">#</th>
															<td>Penyakit</td>
															<td>Persentase</td>
														</tr>
														<?php $no = 1;
														foreach ($data_persentase as $value) { ?>
															<tr>
																<th scope="row"><?= $no++ ?></th>
																<td><?= $value->kd_penyakit ?> - <?= $value->penyakit ?> </td>
																<td><?= $value->persentase ?> %</td>
															</tr>
														<?php } ?>

													</tbody>
												</table>
											</center>
										</div>
										<div class="form-column col-lg-6 col-md-12 col-sm-12">
											<center>
												<div class="alert alert-primary background-primary"> HASIL DIAGNOSA
												</div>
											</center>
											<p style="text-align: justify;">
												Jika dilihat dari hasil perhitungan persentase nilai prediksi, maka
												nilai prediksi tertinggi adalah <b><?= $top->kd_penyakit ?> sebesar <?= $top->persentase ?> %</b>. Hal ini berarti
												bahwa gejala gangguan penyakit yang dialami diprediksi sebagai <b><?= $top->penyakit ?></b>.
											</p>
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
