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
								<div class="card-block" style="overflow-x: scroll;">
									<div style="padding-bottom: 10px;">
										<?php echo anchor(site_url('barang/create'), '<i class="fa fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-grd-info btn sm"'); ?></div>
									<table id="simpletable" class="table table-bordered table-hover nowrap">
										<thead>
											<tr class="table-active">
												<th>No</th>
												<th>Kode Barang</th>
												<th>Nama Barang</th>
												<th>Unit</th>
												<th>Harga</th>
												<th>Stok</th>
												<th>Keterangan</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody><?php $no = 1;
												foreach ($barang_data as $barang) {
												?>
												<tr>
													<td><?= $no++ ?></td>
													<td><?php echo $barang->kode_barang ?></td>
													<td><?php echo $barang->nama_barang ?></td>
													<td><?php echo $barang->nama_unit ?></td>
													<td><?php echo $barang->harga ?></td>
													<td><?php echo $barang->stok ?></td>
													<td><?php echo $barang->keterangan ?></td>
													<td>
														<?php

														echo anchor(site_url('barang/update/' . encrypt_url($barang->barang_id)), '<i class="fa fa-pencil" aria-hidden="true"></i>', 'class="btn btn-grd-primary btn-sm"');
														echo '  ';
														echo anchor(site_url('barang/delete/' . encrypt_url($barang->barang_id)), '<i class="fa fa-trash" aria-hidden="true"></i>', 'class="btn btn-grd-danger btn-sm" Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
