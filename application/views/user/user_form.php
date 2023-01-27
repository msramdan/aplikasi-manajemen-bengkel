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
								<div class="card-block">
									<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
										<thead>
											<table id="data-table-default" class="table  table-bordered table-hover table-td-valign-middle">
												<tr>
													<td>Username <?php echo form_error('username') ?></td>
													<td><input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" /></td>
												</tr>
												<?php if ($this->uri->segment(2) == "create" || $this->uri->segment(2) == "create_action") { ?>
													<tr>
														<td>Password <?php echo form_error('password') ?></td>
														<td><input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" /></td>
													</tr>
												<?php } else { ?>
													<tr>
														<td>Password <?php echo form_error('password') ?></td>
														<td><input type="password" class="form-control" name="password" id="password" placeholder="Password" value="" />
															<small style="color: red">(Biarkan kosong jika tidak diganti)</small>
														</td>
													</tr>
												<?php } ?>
												<tr>
													<td>Nama <?php echo form_error('nama') ?></td>
													<td><input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" /></td>
												</tr>

												<tr>
													<td>Alamat <?php echo form_error('alamat') ?></td>
													<td> <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea></td>
												</tr>
												<tr>
													<td>Email <?php echo form_error('email') ?></td>
													<td><input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" /></td>
												</tr>
												<tr>
													<td>Phone <?php echo form_error('phone') ?></td>
													<td><input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php echo $phone; ?>" /></td>
												</tr>

												<?php if ($this->uri->segment(2) == 'create' || $this->uri->segment(2) == 'create_action') { ?>
													<tr>
														<td>Gambar <?php echo form_error('gambar') ?></td>
														<td><input type="file" class="form-control" name="gambar" id="gambar" placeholder="gambar" required="" value="" onchange="return validasiEkstensi()" />
														</td>
													</tr>
												<?php } else { ?>
													<div class="form-group">
														<tr>
															<td>Gambar <?php echo form_error('gambar') ?></td>
															<td>
																<a href="#modal-dialog" data-bs-toggle="modal"><img src="<?php echo base_url(); ?>assets/img/<?= $gambar ?>" style="width: 150px;height: 150px;border-radius: 5%;"></img></a>
																<input type="hidden" name="gambar_lama" value="<?= $gambar ?>">
																<p style="color: red">Note :Pilih gambar Jika Ingin Merubah gambar</p>
																<input type="file" class="form-control" name="gambar" id="gambar" placeholder="gambar" value="" onchange="return validasiEkstensi()" />
															</td>
														</tr>
													</div>
												<?php } ?>


												<tr>
													<td>Level<?php echo form_error('level_id') ?></td>
													<td><select name="level_id" class="form-control theSelect" value="<?= $level_id ?>">
															<option value="">-- Pilih --</option>
															<option value="1" <?php echo $level_id == 1 ? 'selected' : 'null' ?>>Admin Aplikasi</option>
															<option value="2" <?php echo $level_id == 2 ? 'selected' : 'null' ?>>Kasir</option>
														</select>
													</td>
												</tr>
												<tr>
													<td></td>
													<td><input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
														<button type="submit" class="btn btn-grd-danger"><i class="fa fa-save"></i> <?php echo $button ?></button>
														<a href="<?php echo site_url('user') ?>" class="btn btn-grd-info"><i class="fa fa-undo"></i> Kembali</a>
													</td>
												</tr>
										</thead>
										</table>
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

<script type="text/javascript">
	function validasiEkstensi() {
		var inputFile = document.getElementById('gambar');
		var pathFile = inputFile.value;
		var ekstensiOk = /(\.jpg|\.jpeg|\.png)$/i;
		if (!ekstensiOk.exec(pathFile)) {
			alert('Silakan upload photo yang memiliki ekstensi .jpeg/.jpg/.png');
			inputFile.value = '';
			return false;
		} else {
			// Preview gambar
			if (inputFile.files && inputFile.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					document.getElementById('preview').innerHTML = '<iframe src="' + e.target.result +
						'" style="height:400px; width:600px"/>';
				};
				reader.readAsDataURL(inputFile.files[0]);
			}
		}
	}
</script>
