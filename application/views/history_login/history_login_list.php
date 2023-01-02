<div class="pcoded-content">
	<div class="pcoded-inner-content">
		<div class="main-body">
			<div class="page-wrapper">
				<div class="page-header">
					<div class="row align-items-end">
						<div class="col-lg-8">
							<div class="page-header-title">
								<div class="d-inline">
									<h4>History Login</h4>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="page-header-breadcrumb">
								<ul class="breadcrumb-title">
									<li class="breadcrumb-item">
										<a href="<?= base_url() ?>dashboard"> Home </a>
									</li>
									<li class="breadcrumb-item"><a href="<?= base_url() ?>history_login">History Login</a>
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
									<table id="simpletable" class="table table-bordered table-hover nowrap">
										<thead>
											<tr class="table-active">
												<th>No</th>
												<th>Info</th>
												<th>User Agent</th>
												<th>Tanggal</th>
											</tr>
										</thead>
										<tbody><?php $no = 1;
												foreach ($history_login_data as $history_login) {
												?>
												<tr>
													<td><?= $no++ ?></td>
													<td><?php echo $history_login->info ?></td>
													<td><?php echo $history_login->user_agent ?></td>
													<td><?php echo $history_login->tanggal ?></td>
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
