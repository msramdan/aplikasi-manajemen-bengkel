<div class="pcoded-content">
	<div class="pcoded-inner-content">
		<div class="main-body">
			<div class="page-wrapper">
				<div class="page-header">
					<div class="row align-items-end">
						<div class="col-lg-8">
							<div class="page-header-title">
								<div class="d-inline">
									<h4>Transaksi Penjualan</h4>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="page-header-breadcrumb">
								<ul class="breadcrumb-title">
									<li class="breadcrumb-item">
										<a href="index-1.htm"> Home </a>
									</li>
									<li class="breadcrumb-item">Sale</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="page-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<form action="" method="POST" id="form-purchase">
										<div class="row">
											<div class="col-md-12">
												<a href="<?= base_url() ?>sale" class="btn btn-warning" style="float: right"><i class="fa fa-arrow-left"></i> Back</a>
											</div>
											<div class="col-md-6">
												<div class="mb-3">
													<label for="kode">Penginput</label>
													<input readonly class="form-control" id="kode" type="text" value="<?= ucfirst($this->fungsi->user_login()->nama) ?>" placeholder="" name="kode" autocomplete="off">
												</div>
												<div class="mb-3">
													<label for="kode">No Invoice</label>
													<input readonly class="form-control" id="invoice" type="text" value="<?= $invoice ?>" placeholder="" name="invoice">
												</div>

												<div class="mb-3">
													<label for="supplier_id">Customer</label>
													<select name="supplier_id" class="form-control" id="supplier">
														<option value="">-- Pilih --</option>
														<?php foreach ($customer as $customer) { ?>
															<option value="<?= $customer->customer_id ?>"><?= $customer->nama_customer ?></option>
														<?php } ?>

													</select>
												</div>
											</div>

											<div class="col-md-6">
												<div class="mb-3">
													<label for="tanggal">Tanggal Transaksi</label>
													<input class="form-control" id="tanggal" type="date" value="{{ old('tanggal') }}" placeholder="Tanggal" name="tanggal" autocomplete="off">
												</div>
												<div class="mb-3">
													<label for="supplier_id">Mekanik <span style="color: red;">*Pilih jika ada mekanik yang mengerjakan</span> </label>
													<select name="supplier_id" class="form-control" id="supplier">
														<option value="">-- Pilih --</option>
														<?php foreach ($mekanik as $mekanik) { ?>
															<option value="<?= $mekanik->mekanik_id ?>"><?= $mekanik->nama_mekanik ?></option>
														<?php } ?>
													</select>
												</div>


												<input type="hidden" name="stok" id="stok">
												<input type="hidden" name="kode_produk" id="kode-produk">
												<input type="hidden" name="unit_produk" id="unit-produk">
												<input type="hidden" name="index_tr" id="index-tr">

												<div class="mb-3">
													<label for="produk">Barang / Jasa Service</label>
													<select name="produk" id="produk" class="form-control" id="produk">
														<option value="" disabled selected>-- Pilih --</option>
														<?php foreach ($barang as $barang) { ?>
															<option value="<?= $barang->barang_id ?>"><?= $barang->nama_barang ?></option>
														<?php } ?>
														<?php foreach ($service as $service) { ?>
															<option value="<?= $service->service_id ?>"><?= $service->nama_service ?></option>
														<?php } ?>
													</select>

												</div>
											</div>
											<div class="col-md-3 offset-md-6">
												<div class="mb-3">
													<label for="harga">Harga</label>
													<input class="form-control" id="harga" type="number" value="" placeholder="" name="kode_pembelian" autocomplete="off">
												</div>

											</div>
											<div class="col-md-3">
												<div class="mb-3">
													<label for="kode_pembelian">QTY</label>
													<div class="input-group mb-3">

														<input class="form-control" id="qty" type="number" value="" placeholder="" name="qty" autocomplete="off">
														<div class="input-group-prepend">
															<button type="button" class="btn btn-info" id="btn-update" style="display: none;">
																<i class="fas fa-save me-1"></i>
																Update
															</button>
															<button type="button" id="btn-add" class="btn btn-primary btn-sm" id="btn-add">
																<i class="fa fa-cart-plus me-1"></i>
																Add
															</button>
														</div>
													</div>
												</div>
											</div>


											<div class="col-md-12">
												<table class="table table-striped table-hover table-bordered table-sm mt-3" id="tbl-cart">
													<thead>
														<tr>
															<th>#</th>
															<th>Barang / Jasa Service</th>
															<th>Type</th>
															<th>Harga</th>
															<th>Qty</th>
															<th>Subtotal</th>
															<th>Action</th>
														</tr>
													</thead>
													<tbody>
													</tbody>
												</table>
											</div>
											<div class="col-md-12">
												<div class="row mt-4">
													<div class="col-md-4">
														<div class="form-group mb-2">
															<label class="form-label" for="total">Total</label>
															<input class="form-control disabled" type="text" id="total" name="total" placeholder="" value="" required="" disabled="">
														</div>

														<div class="form-group mb-2">
															<label class="form-label" for="diskon">Bayar</label>
															<input class="form-control" type="number" id="diskon" name="diskon" placeholder="" min="1" value="">
														</div>

														<div class="form-group mb-2">
															<label class="form-label" for="grand-total">Kembalian</label>
															<input class="form-control disabled" type="text" id="grand-total" name="grand_total" placeholder="" value="" required="" disabled="">

															<input type="hidden" id="grand-total-hidden" name="grand_total_hidden" value="">
															<input type="hidden" id="total-hidden" name="total_hidden" value="">
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group mb-2">
															<label class="form-label" for="catatan">Catatan</label>
															<textarea class="form-control" id="catatan" name="catatan" placeholder="" rows="8"></textarea>
														</div>
													</div>

													<div class="col-md-2">
														<div class="form-group mt-4">
															<button type="submit" class="btn btn-primary d-block w-100 mb-2" id="btn-save" disabled="">
																Prosess
															</button>
														</div>
													</div>
												</div>
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
