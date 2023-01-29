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
													<input readonly class="form-control" id="user_id" type="hidden" value="<?= $this->fungsi->user_login()->user_id ?>" placeholder="" name="user_id">
												</div>
												<div class="mb-3">
													<label for="kode">No Invoice</label>
													<input readonly class="form-control" id="invoice" type="text" value="<?= $invoice ?>" placeholder="" name="invoice">
												</div>

												<div class="mb-3">
													<label for="customer_id">Customer</label>
													<select name="customer_id" class="form-control" id="customer_id">
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
													<input class="form-control" id="tanggal" type="datetime-local" value="" placeholder="Tanggal" name="tanggal" autocomplete="off">
												</div>
												<div class="mb-3">
													<label for="mekanik_id">Mekanik <span style="color: red;">*Pilih jika ada mekanik yang mengerjakan</span> </label>
													<select name="mekanik_id" class="form-control" id="mekanik_id">
														<option value="">-- Pilih --</option>
														<?php foreach ($mekanik as $mekanik) { ?>
															<option value="<?= $mekanik->mekanik_id ?>"><?= $mekanik->nama_mekanik ?></option>
														<?php } ?>
													</select>
												</div>


												<input type="hidden" name="stok" id="stok">
												<input type="hidden" name="kode_produk" id="kode-produk">
												<input type="hidden" name="index_tr" id="index-tr">

												<div class="mb-3">
													<label for="produk">Barang / Jasa Service</label>
													<select name="produk" id="produk" class="form-control" id="produk">
														<option value="" disabled selected>-- Pilih --</option>
														<?php foreach ($barang as $barang) { ?>
															<option value="<?= $barang->kode_barang ?>"><?= $barang->nama_barang ?> - Stok <?= $barang->stok ?> </option>
														<?php } ?>
														<?php foreach ($service as $service) { ?>
															<option value="<?= $service->kode_service ?>"><?= $service->nama_service ?></option>
														<?php } ?>
													</select>

												</div>
											</div>
											<div class="col-md-3 offset-md-6">
												<div class="mb-3">
													<label for="harga">Harga</label>
													<input class="form-control" id="harga" type="number" value="" placeholder="" name="harga" autocomplete="off">
												</div>

											</div>
											<div class="col-md-3">
												<div class="mb-3">
													<label for="qty">QTY</label>
													<div class="input-group mb-3">

														<input class="form-control" id="qty" type="number" value="" placeholder="" name="qty" autocomplete="off">
														<div class="input-group-prepend">
															<button type="button" class="btn btn-info btn-sm" id="btn-update" style="display: none;">
																<i class="fa fa-save me-1"></i>
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
												<div class="table-responsive">
													<table class="table table-striped table-hover table-bordered table-sm mt-3" id="tbl-cart">
														<thead>
															<tr>
																<th>#</th>
																<th>Barang / Jasa Service</th>
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
											</div>
											<div class="col-md-12">
												<div class="row mt-4">
													<div class="col-md-4">
														<div class="form-group mb-2">
															<label class="form-label" for="total">Total</label>
															<input class="form-control disabled" type="text" id="total" name="total" placeholder="" value="" required="" disabled="">
														</div>

														<div class="form-group mb-2">
															<label class="form-label" for="bayar">Bayar</label>
															<input class="form-control" type="number" id="bayar" name="bayar" placeholder="" min="0" value="">
														</div>

														<div class="form-group mb-2">
															<label class="form-label" for="kembalian">Kembalian</label>
															<input class="form-control disabled" type="text" id="kembalian" name="grand_total" placeholder="" value="" required="" disabled="">

															<input type="hidden" id="kembalian-hidden" name="grand_total_hidden" value="">
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

<script>
	const btnAdd = $('#btn-add')
	const user_id = $('#user_id')
	const invoice = $('#invoice')
	const produk = $('#produk')
	const harga = $('#harga')
	const qty = $('#qty')
	const stok = $('#stok')
	const kodeProduk = $('#kode-produk')
	const tblCart = $('#tbl-cart')
	const btnSave = $('#btn-save')
	const btnUpdate = $('#btn-update')
	const kembalian = $('#kembalian')
	const bayar = $('#bayar')
	const tanggal = $('#tanggal')
	const customer_id = $('#customer_id')
	const mekanik_id = $('#mekanik_id')
	const catatan = $('#catatan')
	produk.change(function() {
		harga.prop('type', 'text')
		harga.prop('disabled', true)
		harga.val('Loading...')

		qty.prop('type', 'text')
		qty.prop('disabled', true)
		qty.val('Loading...')
		$.ajax({
			url: '<?= base_url() ?>sale/getItem/' + $(this).val(),
			method: 'GET',
			dataType: "json",
			success: function(res) {
				if (res.type == 'B') {
					stok.val(res.data.stok)
					kodeProduk.val(res.data.kode_barang)
				} else {
					stok.val(99999999)
					kodeProduk.val(res.data.kode_service)
				}
				setTimeout(() => {
					harga.prop('type', 'number')
					harga.prop('disabled', false)
					harga.val(res.data.harga)
					qty.prop('type', 'number')
					qty.prop('disabled', false)
					qty.val('')
					qty.focus()
				}, 500)

			}
		})
	})



	btnAdd.click(function() {
		if (!produk.val()) {
			produk.focus()
			Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'Barang / Jasa tidak boleh kosong'
			})

		} else if (!harga.val() || harga.val() < 1) {
			harga.focus()
			Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'Harga tidak boleh kosong dan minimal 1'
			})

		} else if (!qty.val() || qty.val() < 1) {
			qty.focus()
			qty.val('')

			Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'Qty tidak boleh kosong dan minimal 1'
			})

		} else if (parseInt(stok.val()) < qty.val()) {
			produk.focus()
			produk.val('')
			Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'Stok Tidak Mencukupi'
			})
			clearForm()

		} else {

			// cek duplikasi produk
			$('input[name="produk[]"]').each(function() {
				let index = $(this).parent().parent().index()
				if ($(this).val() == produk.val()) {
					tblCart.find('tbody tr:eq(' + index + ')').remove()
					generateNo()
				}
			})

			let subtotal = harga.val() * qty.val()

			tblCart.find('tbody').append(`
                    <tr>
                        <td>${tblCart.find('tbody tr').length + 1}</td>
                        <td>
                            ${produk.find('option:selected').text()}
                            <input type="hidden" class="produk-hidden" name="produk[]" value="${produk.val()}">
                        </td>
                        <td>
                            ${formatRibuan(harga.val())}
                            <input type="hidden" class="harga-hidden" name="harga[]" value="${harga.val()}">
                        </td>
                        <td>
                            ${qty.val()}
                            <input type="hidden" class="qty-hidden" name="qty[]" value="${qty.val()}">
                            <input type="hidden" class="stok-hidden" name="stok[]" value="${stok.val()}">
                        </td>
                        <td>
                            ${formatRibuan(subtotal)}
                            <input type="hidden" class="subtotal-hidden" name="subtotal[]" value="${subtotal}">
                        </td>
                        <td>
                            <button class="btn btn-warning btn-sm me-1 btn-edit" type="button">
                                <i class="fa fa-edit"></i>
                            </button>

                            <button class="btn btn-danger btn-sm btn-delete" type="button">
                                <i class="fa fa-times"></i>
                            </button>
                        </td>
                    </tr>
                `)

			generateNo()
			hitungTotal()
			hitungKembalian()
			clearForm()
			cekTableLength()
			produk.focus()
		}
	})

	btnUpdate.click(function() {
		let index = $('#index-tr').val()

		if (!produk.val()) {
			produk.focus()

			Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'Produk tidak boleh kosong'
			})

		} else if (!harga.val() || harga.val() < 1) {
			harga.focus()

			Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'Harga tidak boleh kosong dan minimal 1'
			})

		} else if (!qty.val() || qty.val() < 1) {
			qty.focus()
			qty.val('')

			Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'Qty tidak boleh kosong dan minimal 1'
			})

		} else if (parseInt(stok.val()) < qty.val()) {
			produk.focus()
			produk.val('')
			Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'Stok Tidak Mencukupi'
			})
			clearForm()
			btnUpdate.hide()
			btnAdd.show()

		} else {
			// cek duplikasi pas update
			$('input[name="produk[]"]').each(function(i) {
				// i = index each
				if ($(this).val() == produk.val() && i != index) {
					tblCart.find('tbody tr:eq(' + i + ')').remove()
				}
			})

			let subtotal = harga.val() * qty.val()

			$('#tbl-cart tbody tr:eq(' + index + ')').html(`
                    <td></td>
                    <td>
                        ${produk.find('option:selected').text()}
                        <input type="hidden" class="produk-hidden" name="produk[]" value="${produk.val()}">
                    </td>
                    <td>
                        ${formatRibuan(harga.val())}
                        <input type="hidden" class="harga-hidden" name="harga[]" value="${harga.val()}">
                    </td>
                    <td>
                        ${qty.val()}
                        <input type="hidden" class="qty-hidden" name="qty[]" value="${qty.val()}">
                        <input type="hidden" class="stok-hidden" name="stok[]" value="${stok.val()}">
                    </td>
                    <td>
                        ${formatRibuan(subtotal)}
                        <input type="hidden" class="subtotal-hidden" name="subtotal[]" value="${subtotal}">
                    </td>
                    <td>
                        <button class="btn btn-warning btn-sm me-1 btn-edit" type="button">
                            <i class="fa fa-edit"></i>
                        </button>

                        <button class="btn btn-danger btn-sm btn-delete" type="button">
                            <i class="fa fa-times"></i>
                        </button>
                    </td>
                `)

			clearForm()
			hitungTotal()
			hitungKembalian()
			generateNo()
			btnUpdate.hide()
			btnAdd.show()
		}
	})

	$(document).on('click', '.btn-delete', function(e) {
		$(this).parent().parent().remove()
		generateNo()
		hitungTotal()
		hitungKembalian()
		cekTableLength()
	})

	$(document).on('click', '.btn-edit', function(e) {
		e.preventDefault()
		let index = $(this).parent().parent().index()
		btnAdd.hide()
		btnUpdate.show()
		produk.val($('.produk-hidden:eq(' + index + ')').val())
		harga.val($('.harga-hidden:eq(' + index + ')').val())
		qty.val($('.qty-hidden:eq(' + index + ')').val())
		stok.val($('.stok-hidden:eq(' + index + ')').val())
		$('#index-tr').val(index)
	})

	bayar.on('change keyup', function() {
		hitungKembalian()
	})


	function hitungTotal() {
		let xTotal = 0

		$('input[name="subtotal[]"]').map(function() {
			xTotal += parseInt($(this).val())
		}).get()

		$('#total').val(formatRibuan(xTotal))
		$('#total-hidden').val(xTotal)
	}

	function hitungKembalian() {
		xTotal = parseInt($('#total-hidden').val())
		XKembalian = (parseInt($('#bayar').val()) - xTotal)

		if (Number.isNaN(XKembalian)) {
			$('#bayar').val('')
			kembalian.val('')
			$('#kembalian-hidden').val('')
		} else {
			kembalian.val(formatRibuan(XKembalian))
			$('#kembalian-hidden').val(XKembalian)
		}


	}

	function formatRibuan(number) {
		return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
	}

	function generateNo() {
		let no = 1
		tblCart.find('tbody tr').each(function() {
			$(this).find('td:nth-child(1)').html(no)
			no++
		})
	}

	function clearForm() {
		kodeProduk.val('')
		produk.val('')
		harga.val('')
		qty.val('')
		stok.val('')
	}

	function cekTableLength() {
		let cek = tblCart.find('tbody tr').length

		if (cek > 0) {
			btnSave.prop('disabled', false)
		} else {
			btnSave.prop('disabled', true)
		}
	}

	$('#form-purchase').submit(function(e) {
		e.preventDefault()
		let pembelian = {
			tanggal: tanggal.val(),
			invoice: invoice.val(),
			mekanik_id: mekanik_id.val(),
			customer_id: customer_id.val(),
			catatan: catatan.val(),
			total: $('#total-hidden').val(),
			bayar: $('#bayar').val(),
			user_id: $('#user_id').val(),
			kembalian: $('#kembalian-hidden').val(),
			produk: $('input[name="produk[]"]').map(function() {
				return $(this).val()
			}).get(),
			harga: $('input[name="harga[]"]').map(function() {
				return $(this).val()
			}).get(),
			qty: $('input[name="qty[]"]').map(function() {
				return $(this).val()
			}).get(),
			subtotal: $('input[name="subtotal[]"]').map(function() {
				return $(this).val()
			}).get(),
		}
		yTotal = parseInt($('#total-hidden').val())
		yBayar = parseInt($('#bayar').val())

		console.log(pembelian)

		if (!customer_id.val()) {
			customer_id.focus()
			Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'Customer tidak boleh kosong'
			})
		} else if (!tanggal.val()) {
			tanggal.focus()
			Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'Tanggal tidak boleh kosong'
			})
		} else if (yBayar < yTotal || Number.isNaN(yBayar)) {
			bayar.focus()
			Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'Pembayaran Kurang'
			})
		} else {
			$.ajax({
				type: 'POST',
				url: '<?= base_url() ?>sale/create_action',
				data: pembelian,
				dataType: "json",
				success: function(res) {
					if (res.success) {
						Swal.fire({
							icon: 'success',
							title: 'Simpan data',
							text: 'Berhasil'
						}).then(function() {
							window.location = '<?= base_url() ?>sale'
						})
					}
				},
				error: function(xhr, status, error) {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Something went wrong!'
					})
				}
			})

		}


	})
</script>
