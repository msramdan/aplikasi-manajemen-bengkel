<div class="pcoded-content">
<div class="pcoded-inner-content">
	<div class="main-body">
		<div class="page-wrapper">
			<div class="page-header">
				<div class="row align-items-end">
					<div class="col-lg-8">
						<div class="page-header-title">
							<div class="d-inline">
								<h4>Diagnosa</h4>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="page-header-breadcrumb">
							<ul class="breadcrumb-title">
								<li class="breadcrumb-item">
									<a href="index-1.htm"> Home </a>
								</li>
								<li class="breadcrumb-item">Diagnosa</li>
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
        <?php echo anchor(site_url('diagnosa/create'), '<i class="fa fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-grd-info btn sm"'); ?></div>
		<?php echo anchor(site_url('diagnosa/excel'), '<i class="far fa-file-excel" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-xs export_data"'); ?><table id="simpletable" class="table table-bordered table-hover nowrap">
         <thead>
            <tr class="table-active">
                <th>No</th>
		<th>Id User</th>
		<th>Kd Penyakit</th>
		<th>Kd Gejala</th>
		<th>Presentase</th>
		<th>Tanggal</th>
		<th>Action</th>
            </tr></thead><tbody><?php $no = 1;
            foreach ($diagnosa_data as $diagnosa)
            {
                ?>
                <tr>
			<td><?= $no++?></td>
			<td><?php echo $diagnosa->id_user ?></td>
			<td><?php echo $diagnosa->kd_penyakit ?></td>
			<td><?php echo $diagnosa->kd_gejala ?></td>
			<td><?php echo $diagnosa->presentase ?></td>
			<td><?php echo $diagnosa->tanggal ?></td>
			<td>
				<?php 
				echo anchor(site_url('diagnosa/read/'.encrypt_url($diagnosa->id_diagnosa)),'<i class="fa fa-eye" aria-hidden="true"></i>','class="btn btn-grd-success btn-sm read_data"'); 
				echo '  '; 
				echo anchor(site_url('diagnosa/update/'.encrypt_url($diagnosa->id_diagnosa)),'<i class="fa fa-pencil" aria-hidden="true"></i>','class="btn btn-grd-primary btn-sm"'); 
				echo '  '; 
				echo anchor(site_url('diagnosa/delete/'.encrypt_url($diagnosa->id_diagnosa)),'<i class="fa fa-trash" aria-hidden="true"></i>','class="btn btn-grd-danger btn-sm" Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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