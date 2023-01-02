<div class="pcoded-content">
	<div class="pcoded-inner-content">
		<div class="main-body">
			<div class="page-wrapper">
				<div class="page-header">
					<div class="row align-items-end">
						<div class="col-lg-8">
							<div class="page-header-title">
								<div class="d-inline">
									<h4>User</h4>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="page-header-breadcrumb">
								<ul class="breadcrumb-title">
									<li class="breadcrumb-item">
										<a href="index-1.htm"> Home </a>
									</li>
									<li class="breadcrumb-item">User</li>
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
										<?php echo anchor(site_url('user/create'), '<i class="fa fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-grd-info btn sm"'); ?></div>
									<table id="simpletable" class="table table-bordered table-hover nowrap">
										<thead>
											<tr class="table-active">
												<th>No</th>
												<th>Username</th>
												<th>Nama</th>
												<th>Alamat</th>
												<th>Email</th>
												<th>Phone</th>
												<th>Gambar</th>
												<th>Level</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody><?php $no = 1;
												foreach ($user_data as $user) {
												?>
												<tr>
													<td><?= $no++ ?></td>
													<td><?php echo $user->username ?></td>
													<td><?php echo $user->nama ?></td>
													<td><?php echo $user->alamat ?></td>
													<td><?php echo $user->email ?></td>
													<td><?php echo $user->phone ?></td>
													<td><a href="<?php echo base_url(); ?>user/download/<?php echo $user->gambar ?>"><i class="ace-icon fa fa-download"></i> Download</td>
													<?php if ($user->level_id == 1) { ?>
														<td>Admin Aplikasi</td>
													<?php } else { ?>
														<td>User</td>
													<?php } ?>

													<td>
														<?php
														echo anchor(site_url('user/update/' . encrypt_url($user->user_id)), '<i class="fa fa-pencil" aria-hidden="true"></i>', 'class="btn btn-grd-primary btn-sm"');
														echo '  ';
														echo anchor(site_url('user/delete/' . encrypt_url($user->user_id)), '<i class="fa fa-trash" aria-hidden="true"></i>', 'class="btn btn-grd-danger btn-sm" Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
