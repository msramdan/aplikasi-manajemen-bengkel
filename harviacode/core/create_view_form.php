<?php

$string = "<div class=\"pcoded-content\">
<div class=\"pcoded-inner-content\">
	<div class=\"main-body\">
		<div class=\"page-wrapper\">
			<div class=\"page-header\">
				<div class=\"row align-items-end\">
					<div class=\"col-lg-8\">
						<div class=\"page-header-title\">
							<div class=\"d-inline\">
								<h4>" .  ucfirst($table_name) . "</h4>
							</div>
						</div>
					</div>
					<div class=\"col-lg-4\">
						<div class=\"page-header-breadcrumb\">
							<ul class=\"breadcrumb-title\">
								<li class=\"breadcrumb-item\">
									<a href=\"index-1.htm\"> Home </a>
								</li>
								<li class=\"breadcrumb-item\">" .  ucfirst($table_name) . "</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class=\"page-body\">
				<div class=\"row\">
					<div class=\"col-sm-12\">
						<div class=\"card\">
							<div class=\"card-block\">
            <form action=\"<?php echo \$action; ?>\" method=\"post\">
            <thead>
            <table id=\"data-table-default\" class=\"table  table-bordered table-hover table-td-valign-middle\">";
foreach ($non_pk as $row) {
	if ($row["data_type"] == 'text') {
		$string .= "\n\t    
        <tr><td>" . label($row["column_name"]) . " <?php echo form_error('" . $row["column_name"] . "') ?></td><td> <textarea class=\"form-control\" rows=\"3\" name=\"" . $row["column_name"] . "\" id=\"" . $row["column_name"] . "\" placeholder=\"" . label($row["column_name"]) . "\"><?php echo $" . $row["column_name"] . "; ?></textarea></td></tr>";
	} elseif ($row["data_type"] == 'email') {
		$string .= "\n\t    <tr><td>" . label($row["column_name"]) . " <?php echo form_error('" . $row["column_name"] . "') ?></td><td><input type=\"email\" class=\"form-control\" name=\"" . $row["column_name"] . "\" id=\"" . $row["column_name"] . "\" placeholder=\"" . label($row["column_name"]) . "\" value=\"<?php echo $" . $row["column_name"] . "; ?>\" /></td></tr>";
	} elseif ($row["data_type"] == 'date') {
		$string .= "\n\t    <tr><td>" . label($row["column_name"]) . " <?php echo form_error('" . $row["column_name"] . "') ?></td><td><input type=\"date\" class=\"form-control\" name=\"" . $row["column_name"] . "\" id=\"" . $row["column_name"] . "\" placeholder=\"" . label($row["column_name"]) . "\" value=\"<?php echo $" . $row["column_name"] . "; ?>\" /></td></tr>";
	} else {
		$string .= "\n\t    <tr><td>" . label($row["column_name"]) . " <?php echo form_error('" . $row["column_name"] . "') ?></td><td><input type=\"text\" class=\"form-control\" name=\"" . $row["column_name"] . "\" id=\"" . $row["column_name"] . "\" placeholder=\"" . label($row["column_name"]) . "\" value=\"<?php echo $" . $row["column_name"] . "; ?>\" /></td></tr>";
	}
}
$string .= "\n\t    <tr><td></td><td><input type=\"hidden\" name=\"" . $pk . "\" value=\"<?php echo $" . $pk . "; ?>\" /> ";
$string .= "\n\t    <button type=\"submit\" class=\"btn btn-grd-danger\"><i class=\"fa fa-save\"></i> <?php echo \$button ?></button> ";
$string .= "\n\t    <a href=\"<?php echo site_url('" . $c_url . "') ?>\" class=\"btn btn-grd-info\"><i class=\"fa fa-undo\"></i> Kembali</a></td></tr>
</thead>";
$string .= "\n\t</table></form>        </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>";

$hasil_view_form = createFile($string, $target . "views/" . $c_url . "/" . $v_form_file);
