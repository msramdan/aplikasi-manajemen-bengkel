<div class="pcoded-content">
<div class="pcoded-inner-content">
	<div class="main-body">
		<div class="page-wrapper">
			<div class="page-header">
				<div class="row align-items-end">
					<div class="col-lg-8">
						<div class="page-header-title">
							<div class="d-inline">
								<h4>Sale</h4>
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
							<div class="card-block">
            <form action="<?php echo $action; ?>" method="post">
            <thead>
            <table id="data-table-default" class="table  table-bordered table-hover table-td-valign-middle">
	    <tr><td>Invoice <?php echo form_error('invoice') ?></td><td><input type="text" class="form-control" name="invoice" id="invoice" placeholder="Invoice" value="<?php echo $invoice; ?>" /></td></tr>
	    <tr><td>Customer Id <?php echo form_error('customer_id') ?></td><td><input type="text" class="form-control" name="customer_id" id="customer_id" placeholder="Customer Id" value="<?php echo $customer_id; ?>" /></td></tr>
	    <tr><td>Total <?php echo form_error('total') ?></td><td><input type="text" class="form-control" name="total" id="total" placeholder="Total" value="<?php echo $total; ?>" /></td></tr>
	    <tr><td>Bayar <?php echo form_error('bayar') ?></td><td><input type="text" class="form-control" name="bayar" id="bayar" placeholder="Bayar" value="<?php echo $bayar; ?>" /></td></tr>
	    <tr><td>Kembalian <?php echo form_error('kembalian') ?></td><td><input type="text" class="form-control" name="kembalian" id="kembalian" placeholder="Kembalian" value="<?php echo $kembalian; ?>" /></td></tr>
	    
        <tr><td>Note <?php echo form_error('note') ?></td><td> <textarea class="form-control" rows="3" name="note" id="note" placeholder="Note"><?php echo $note; ?></textarea></td></tr>
	    <tr><td>Tanggal <?php echo form_error('tanggal') ?></td><td><input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" /></td></tr>
	    <tr><td>User Id <?php echo form_error('user_id') ?></td><td><input type="text" class="form-control" name="user_id" id="user_id" placeholder="User Id" value="<?php echo $user_id; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="sale_id" value="<?php echo $sale_id; ?>" /> 
	    <button type="submit" class="btn btn-grd-danger"><i class="fa fa-save"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('sale') ?>" class="btn btn-grd-info"><i class="fa fa-undo"></i> Kembali</a></td></tr>
</thead>
	</table></form>        </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>