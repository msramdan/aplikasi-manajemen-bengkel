<div class="pcoded-content">
	<div class="pcoded-inner-content">
		<div class="main-body">
			<div class="page-wrapper">
				<div class="page-header">
					<div class="row align-items-end">
						<div class="col-lg-8">
							<div class="page-header-title">
								<div class="d-inline">
									<h4>Laporan</h4>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="page-header-breadcrumb">
								<ul class="breadcrumb-title">
									<li class="breadcrumb-item">
										<a href="index-1.htm"> Home </a>
									</li>
									<li class="breadcrumb-item">Laporan</li>
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
										<?php echo anchor(site_url('laporan/excel'), '<i class="far fa-file-excel" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-xs export_data"'); ?>
									</div>
									<table id="simpletable" class="table table-bordered table-hover nowrap">
										<thead>
											<tr class="table-active">
												<th>No</th>
												<th>Invoice</th>
												<th>Customer</th>
												<th>Mekanik</th>
												<th>Total</th>
												<th>Bayar</th>
												<th>Kembalian</th>
												<th>Note</th>
												<th>Tanggal</th>
												<th>Penginput</th>
											</tr>
										</thead>
										<tbody><?php $no = 1;
												foreach ($laporan_data as $laporan) {
												?>
												<tr>
													<td><?= $no++ ?></td>
													<td><?php echo $laporan->invoice ?></td>
													<td><?php echo $laporan->nama_customer ?></td>
													<td><?php echo $laporan->nama_mekanik ?></td>
													<td><?php echo rupiah($laporan->total)  ?></td>
													<td><?php echo rupiah($laporan->bayar)  ?></td>
													<td><?php echo rupiah($laporan->kembalian)  ?></td>
													<td><?php echo $laporan->note ?></td>
													<td><?php echo $laporan->tanggal ?></td>
													<td><?php echo $laporan->nama ?></td>
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
