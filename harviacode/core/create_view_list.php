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
							<div class=\"card-block\" style=\"overflow-x: scroll;\">
							<div style=\"padding-bottom: 10px;\">
        <?php echo anchor(site_url('" . $c_url . "/create'), '<i class=\"fa fa-plus-square\" aria-hidden=\"true\"></i> Tambah Data', 'class=\"btn btn-grd-info btn sm\"'); ?></div>";

if ($export_excel == '1') {
	$string .= "\n\t\t<?php echo anchor(site_url('" . $c_url . "/excel'), '<i class=\"far fa-file-excel\" aria-hidden=\"true\"></i> Export Ms Excel', 'class=\"btn btn-success btn-xs export_data\"'); ?>";
}
if ($export_word == '1') {
	$string .= "\n\t\t<?php echo anchor(site_url('" . $c_url . "/word'), '<i class=\"fa fa-file-word-o\" aria-hidden=\"true\"></i> Export Ms Word', 'class=\"btn btn-primary btn-xs\"'); ?>";
}
if ($export_pdf == '1') {
	$string .= "\n\t\t<?php echo anchor(site_url('" . $c_url . "/pdf'), 'PDF', 'class=\"btn btn-primary btn-xs\"'); ?>";
}



$string .= "<table id=\"simpletable\" class=\"table table-bordered table-hover nowrap\">
         <thead>
            <tr class=\"table-active\">
                <th>No</th>";
foreach ($non_pk as $row) {
	$string .= "\n\t\t<th>" . label($row['column_name']) . "</th>";
}
$string .= "\n\t\t<th>Action</th>
            </tr></thead><tbody>";
$string .= "<?php \$no = 1;
            foreach ($" . $c_url . "_data as \$$c_url)
            {
                ?>
                <tr>";

$string .= "\n\t\t\t<td><?= \$no++?></td>";
foreach ($non_pk as $row) {
	$string .= "\n\t\t\t<td><?php echo $" . $c_url . "->" . $row['column_name'] . " ?></td>";
}


$string .= "\n\t\t\t<td>"
	. "\n\t\t\t\t<?php "
	. "\n\t\t\t\techo anchor(site_url('" . $c_url . "/read/'.encrypt_url($" . $c_url . "->" . $pk . ")),'<i class=\"fa fa-eye\" aria-hidden=\"true\"></i>','class=\"btn btn-grd-success btn-sm read_data\"'); "
	. "\n\t\t\t\techo '  '; "
	. "\n\t\t\t\techo anchor(site_url('" . $c_url . "/update/'.encrypt_url($" . $c_url . "->" . $pk . ")),'<i class=\"fa fa-pencil\" aria-hidden=\"true\"></i>','class=\"btn btn-grd-primary btn-sm\"'); "
	. "\n\t\t\t\techo '  '; "
	. "\n\t\t\t\techo anchor(site_url('" . $c_url . "/delete/'.encrypt_url($" . $c_url . "->" . $pk . ")),'<i class=\"fa fa-trash\" aria-hidden=\"true\"></i>','class=\"btn btn-grd-danger btn-sm\" Delete','onclick=\"javasciprt: return confirm(\\'Are You Sure ?\\')\"'); "
	. "\n\t\t\t\t?>"
	. "\n\t\t\t</td>";

$string .=  "\n\t\t</tr>
                <?php } ?>
            </tbody>
        </table>
                ";

$string .= "\n\t  </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
		</div>
		</div>";



$hasil_view_list = createFile($string, $target . "views/" . $c_url . "/" . $v_list_file);
