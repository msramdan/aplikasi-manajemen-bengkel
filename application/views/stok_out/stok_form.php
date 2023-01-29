<div class="pcoded-content">
	<div class="pcoded-inner-content">
		<div class="main-body">
			<div class="page-wrapper">
				<div class="page-header">
					<div class="row align-items-end">
						<div class="col-lg-8">
							<div class="page-header-title">
								<div class="d-inline">
									<h4>Stok Out</h4>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="page-header-breadcrumb">
								<ul class="breadcrumb-title">
									<li class="breadcrumb-item">
										<a href="index-1.htm"> Home </a>
									</li>
									<li class="breadcrumb-item">Stok Out</li>
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
													<td>Barang<?php echo form_error('barang_id') ?></td>
													<td>
														<select name="barang_id" class="form-control theSelect">
															<option value="">-- Pilih -- </option>
															<?php foreach ($barang as $key => $data) { ?>
																<?php if ($barang_id == $data->barang_id) { ?>
																	<option value="<?php echo $data->barang_id ?>" selected><?php echo $data->nama_barang ?> </option>
																<?php } else { ?>
																	<option value="<?php echo $data->barang_id ?>"><?php echo $data->nama_barang ?> </option>
																<?php } ?>
															<?php } ?>
														</select>
													</td>
												</tr>

												<tr>
													<td>Detail <?php echo form_error('detail') ?></td>
													<td> <textarea class="form-control" rows="3" name="detail" id="detail" placeholder="Detail"><?php echo $detail; ?></textarea></td>
												</tr>
												<tr>
													<td>Qty <?php echo form_error('qty') ?></td>
													<td><input type="text" class="form-control" name="qty" id="qty" placeholder="Qty" value="<?php echo $qty; ?>" /></td>
												</tr>
												<tr>
													<td>Tanggal <?php echo form_error('tanggal') ?></td>
													<td><input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" /></td>
												</tr>
												<tr>
													<td></td>
													<td><input type="hidden" name="stok_id" value="<?php echo $stok_id; ?>" />
														<button type="submit" class="btn btn-grd-danger"><i class="fa fa-save"></i> <?php echo $button ?></button>
														<a href="<?php echo site_url('stok_out') ?>" class="btn btn-grd-info"><i class="fa fa-undo"></i> Kembali</a>
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
