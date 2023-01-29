<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Faktur Invoice</title>

	<style>
		.invoice-box {
			max-width: 800px;
			margin: auto;
			padding: 30px;
			border: 1px solid #eee;
			box-shadow: 0 0 10px rgba(0, 0, 0, .15);
			font-size: 16px;
			line-height: 24px;
			font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			color: #555;
		}

		.invoice-box table {
			width: 100%;
			line-height: inherit;
			text-align: left;
		}

		.invoice-box table td {
			padding: 5px;
			vertical-align: top;
		}

		.invoice-box table tr td:nth-child(2) {
			text-align: right;
		}

		.invoice-box table tr.top table td {
			padding-bottom: 10px;
		}

		.invoice-box table tr.top table td.title {
			font-size: 45px;
			line-height: 45px;
			color: #333;
		}

		.invoice-box table tr.information table td {
			padding-bottom: 10px;
		}

		.invoice-box table tr.heading td {
			background: #eee;
			border-bottom: 1px solid #ddd;
			font-weight: bold;
		}

		.invoice-box table tr.details td {
			padding-bottom: 20px;
		}

		.invoice-box table tr.item td {
			border-bottom: 1px solid #eee;
		}

		.invoice-box table tr.item.last td {
			border-bottom: none;
		}

		.invoice-box table tr.total td:nth-child(2) {
			border-top: 2px solid #eee;
			font-weight: bold;
		}

		@media only screen and (max-width: 600px) {
			.invoice-box table tr.top table td {
				width: 100%;
				display: block;
				text-align: center;
			}

			.invoice-box table tr.information table td {
				width: 100%;
				display: block;
				text-align: center;
			}
		}

		/** RTL **/
		.rtl {
			direction: rtl;
			font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
		}

		.rtl table {
			text-align: right;
		}

		.rtl table tr td:nth-child(2) {
			text-align: left;
		}
	</style>
</head>

<body onload="window.print()">
	<div class="invoice-box">
		<table cellpadding="0" cellspacing="0" border="1">
			<tr class="top">
				<td colspan="2">
					<table>
						<tr>
							<td style="width: 55%">
								<b style="font-size: 28px">FAKTUR PENJUALAN</b><br>
								<b>Bengkel Motor Bersama Bojonggede</b><br>
								Motor Repair Service & Sparepart
							</td>
							<td>
								No.Invoice #: <?= $invoice ?><br>
								Tanggal: <?= $tanggal ?><br>
							</td>
						</tr>
					</table>
				</td>
			</tr>

			<tr class="information">
				<td colspan="2">
					<table>
						<tr>
							<td style="text-align: left;width: 65%">
								Jalan Jalu Tugu Pahlawan Rt 01 Rw 10 <br>
								Bojonggede, Kecamatan Bojonggede, <br>
								Kabupaten Bogor
							</td>

							<td style="text-align: left">
								Penginput : <?php echo ucfirst($user_id) ?><br>
								Customer : <?= $customer_id ?><br>
								Mekanik : <?= $mekanik_id ?><br>
							</td>
						</tr>
					</table> <br>
					<table border="1" cellpadding="0" cellspacing="0">
						<thead>
							<tr style="text-align: center;">
								<th>Barang / Jasa Service</th>
								<th>Harga</th>
								<th>Qty</th>
								<th>Subtotal</th>
							</tr>
						</thead>
						<?php
						foreach ($sale_detail as $value) { ?>
							<tr>
								<td><?= $value->nama_barang ?></td>
								<td><?= rupiah($value->harga) ?></td>
								<td><?= $value->qty ?></td>
								<td><?= rupiah($value->total) ?></td>
							</tr>

						<?php } ?>
						<?php
						foreach ($sale_detail_service as $value) { ?>
							<tr>
								<td><?= $value->nama_service ?></td>
								<td><?= rupiah($value->harga) ?></td>
								<td><?= $value->qty ?></td>
								<td><?= rupiah($value->total) ?></td>
							</tr>

						<?php } ?>

					</table> <br>
					<div>
						<span style="float: right;"><b>Total : </b> <?= rupiah($total) ?> </span><br>
						<span style="float: right;"><b>Bayar : </b> <?= rupiah($bayar) ?> </span><br>
						<span style="float: right;"> <b> Kembalian : </b><?= rupiah($kembalian) ?> </span><br> <br>
						<span> <b> *Catatan : </b><?= $note ?> </span><br>
					</div>


	</div>
</body>

</html>
