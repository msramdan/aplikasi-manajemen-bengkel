<div class="pcoded-content">
	<div class="pcoded-inner-content">
		<div class="main-body">
			<div class="page-wrapper">
				<div class="page-header">
					<div class="row align-items-end">
						<div class="col-lg-8">
							<div class="page-header-title">
								<div class="d-inline">
									<h4>Customer</h4>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="page-header-breadcrumb">
								<ul class="breadcrumb-title">
									<li class="breadcrumb-item">
										<a href="index-1.htm"> Home </a>
									</li>
									<li class="breadcrumb-item">Customer</li>
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
													<td>Nama Customer <?php echo form_error('nama_customer') ?></td>
													<td><input type="text" class="form-control" name="nama_customer" id="nama_customer" placeholder="Nama Customer" value="<?php echo $nama_customer; ?>" /></td>
												</tr>
												<tr>
													<td>Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></td>
													<td><select name="jenis_kelamin" class="form-control theSelect" value="<?= $jenis_kelamin ?>">
															<option value="">-- Pilih --</option>
															<option value="Laki Laki" <?php echo $jenis_kelamin == 'Laki Laki' ? 'selected' : 'null' ?>>Laki Laki</option>
															<option value="Perempuan" <?php echo $jenis_kelamin == 'Perempuan' ? 'selected' : 'null' ?>>Perempuan</option>
														</select>
													</td>
												</tr>
												<tr>
													<td>No Hp <?php echo form_error('no_hp') ?></td>
													<td><input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No Hp" value="<?php echo $no_hp; ?>" /></td>
												</tr>

												<tr>
													<td>Alamat <?php echo form_error('alamat') ?></td>
													<td> <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea></td>
												</tr>
												<tr>
													<td></td>
													<td><input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>" />
														<button type="submit" class="btn btn-grd-danger"><i class="fa fa-save"></i> <?php echo $button ?></button>
														<a href="<?php echo site_url('customer') ?>" class="btn btn-grd-info"><i class="fa fa-undo"></i> Kembali</a>
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
