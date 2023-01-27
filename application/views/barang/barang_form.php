<div class="pcoded-content">
	<div class="pcoded-inner-content">
		<div class="main-body">
			<div class="page-wrapper">
				<div class="page-header">
					<div class="row align-items-end">
						<div class="col-lg-8">
							<div class="page-header-title">
								<div class="d-inline">
									<h4>Barang</h4>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="page-header-breadcrumb">
								<ul class="breadcrumb-title">
									<li class="breadcrumb-item">
										<a href="index-1.htm"> Home </a>
									</li>
									<li class="breadcrumb-item">Barang</li>
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
													<td>Kode Barang <?php echo form_error('kode_barang') ?></td>
													<td><input type="text" class="form-control" name="kode_barang" id="kode_barang" placeholder="Kode Barang" value="<?php echo $kode_barang; ?>" /></td>
												</tr>
												<tr>
													<td>Nama Barang <?php echo form_error('nama_barang') ?></td>
													<td><input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang" value="<?php echo $nama_barang; ?>" /></td>
												</tr>
												<tr>
													<td>Unit<?php echo form_error('unit_id') ?></td>
													<td>
														<select name="unit_id" class="form-control theSelect">
															<option value="">-- Pilih -- </option>
															<?php foreach ($unit as $key => $data) { ?>
																<?php if ($unit_id == $data->unit_id) { ?>
																	<option value="<?php echo $data->unit_id ?>" selected><?php echo $data->nama_unit ?> </option>
																<?php } else { ?>
																	<option value="<?php echo $data->unit_id ?>"><?php echo $data->nama_unit ?> </option>
																<?php } ?>
															<?php } ?>
														</select>
													</td>
												</tr>
												<tr>
													<td>Harga <?php echo form_error('harga') ?></td>
													<td><input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" /></td>
												</tr>
												<tr>
													<td>Keterangan <?php echo form_error('keterangan') ?></td>
													<td> <textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea></td>
												</tr>
												<tr>
													<td></td>
													<td><input type="hidden" name="barang_id" value="<?php echo $barang_id; ?>" />
														<button type="submit" class="btn btn-grd-danger"><i class="fa fa-save"></i> <?php echo $button ?></button>
														<a href="<?php echo site_url('barang') ?>" class="btn btn-grd-info"><i class="fa fa-undo"></i> Kembali</a>
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
