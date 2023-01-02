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
								<h4>".  ucfirst($table_name)."</h4>
							</div>
						</div>
					</div>
					<div class=\"col-lg-4\">
						<div class=\"page-header-breadcrumb\">
							<ul class=\"breadcrumb-title\">
								<li class=\"breadcrumb-item\">
									<a href=\"index-1.htm\"> Home </a>
								</li>
								<li class=\"breadcrumb-item\"><a href=\"\">Basic Initialization</a>
								</li>
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
<table id=\"data-table-default\" class=\"table table-hover table-bordered table-td-valign-middle\">";
foreach ($non_pk as $row) {
    $string .= "\n\t    <tr><td>".label($row["column_name"])."</td><td><?php echo $".$row["column_name"]."; ?></td></tr>";
}
$string .= "\n\t    <tr><td></td><td><a href=\"<?php echo site_url('".$c_url."') ?>\" class=\"btn btn-grd-disabled\">Cancel</a></td></tr>";
$string .= "\n\t</table>
			</div>
        </div>
    </div>
	</div>
</div>
</div>
</div>
</div>
</div>";



$hasil_view_read = createFile($string, $target."views/" . $c_url . "/" . $v_read_file);

?>
