<div class="pcoded-content">
	<div class="pcoded-inner-content">
		<div class="main-body">
			<div class="page-wrapper">
				<div class="page-body">
					<div class="row">
						<div class="col-xl-3 col-md-6">
							<div class="card bg-c-yellow text-white">
								<div class="card-block">
									<div class="row align-items-center">
										<div class="col">
											<p class="m-b-5">Data Customer</p>
											<?php
											$customer = $this->db->get('customer')->num_rows();
											?>
											<h4 class="m-b-0"><?= $customer ?> Data</h4>
										</div>
										<div class="col col-auto text-right">
											<i class="feather icon-users f-50 text-c-yellow"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="card bg-c-green text-white">
								<div class="card-block">
									<div class="row align-items-center">
										<div class="col">
											<p class="m-b-5">Data Barang</p>
											<?php
											$barang = $this->db->get('barang')->num_rows();
											?>
											<h4 class="m-b-0"><?= $barang ?> Data</h4>
										</div>
										<div class="col col-auto text-right">
											<i class="feather icon-box f-50 text-c-green"></i>

										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="card bg-c-pink text-white">
								<div class="card-block">
									<div class="row align-items-center">
										<div class="col">
											<p class="m-b-5">Data Service</p>
											<?php
											$service = $this->db->get('service')->num_rows();
											?>
											<h4 class="m-b-0"><?= $service ?> Data</h4>
										</div>
										<div class="col col-auto text-right">
											<i class="feather icon-box f-50 text-c-pink"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="card bg-c-blue text-white">
								<div class="card-block">
									<div class="row align-items-center">
										<div class="col">
											<p class="m-b-5">Data Sale</p>
											<?php
											$sale = $this->db->get('sale')->num_rows();
											?>
											<h4 class="m-b-0"><?= $sale ?> Data</h4>
										</div>
										<div class="col col-auto text-right">
											<i class="feather icon-shopping-cart f-50 text-c-blue"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<center>
						<img src="<?= base_url() ?>assets/img/logo.png" alt="" style="width: 30%;">
						<h4>Selamat Datang Di Aplikasi BENGKEL MOTOR BERSAMA BOJONGGEDE
						</h4>
					</center>
				</div>
			</div>
		</div>
	</div>
</div>
