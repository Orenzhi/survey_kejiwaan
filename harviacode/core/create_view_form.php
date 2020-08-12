<?php 

$string = "<!--!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel=\"stylesheet\" href=\"<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>\"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body-->

    <div class=\"notika-status-area\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-lg-12 col-md-12\">
                    <div class=\"box timer btn btn-success btn-sm\" id='timer'></div>
                </div>
            </div>
        </div>
        
        <div class=\"breadcomb-area zhien-profil-bread\">
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12\">
                        <div class=\"breadcomb-list zhien-breadcomb-list\">
                            <div class=\"row\">
                                <div class=\"col-lg-6 col-md-6 col-sm-6 col-xs-12\">
                                    <div class=\"breadcomb-wp\">
                                        <div class=\"breadcomb-icon\">
                                            <i class=\"notika-icon notika-support\"></i>
                                        </div>
                                        <div class=\"breadcomb-ctn\">
                                            <h2>Data ".ucfirst($table_name)."</h2>
                                            <p>Selamat Datang di Survey Kejiwaan </p>
                                        </div>
                                    </div>
                                </div>
                                <div class=\"col-lg-6 col-md-6 col-sm-6 col-xs-3\">
                                    <div class=\"breadcomb-report\">
                                        <button data-toggle=\"tooltip\" data-placement=\"left\" title=\"Download Report\" class=\"btn\"><i class=\"notika-icon notika-sent\"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class=\"tabs-info-area\">
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12\">
                        <div class=\"widget-tabs-int\">
                            <div class=\"tab-hd\">
                                <h2>Tambah Data ".ucfirst($table_name)."</h2>
                                <p>Ini merupakan form inputan Data ".ucfirst($table_name).".</p>
                            </div>
                            <!--div class=\"box pull-right\">
                                <?php echo anchor(site_url('".$c_url."/create'),'Tambah Data', 'class=\"btn btn-primary fa fa-plus btn-sm\"'); ?>
                            </div-->
                            <div class=\"widget-tabs-list\">
                                <ul class=\"nav nav-tabs\">
                                    <li class=\"active\"><a data-toggle=\"tab\" href=\"#home\">List ".ucfirst($table_name)."</a></li>
                                </ul>
                                <div class=\"tab-content tab-custom-st\">
                                    <div id=\"home\" class=\"tab-pane fade in active\">
                                        <div class=\"tab-ctn\">
                                            
                                            <form action=\"<?php echo \$action; ?>\" method=\"post\">";
foreach ($non_pk as $row) {
    if ($row["data_type"] == 'text')
    {
    $string .= "\n\t    <div class=\"form-group\">
            <label for=\"".$row["column_name"]."\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></label>
            <textarea class=\"form-control\" rows=\"3\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\"><?php echo $".$row["column_name"]."; ?></textarea>
        </div>";
    } else
    {
    $string .= "\n\t    <div class=\"form-group\">
            <label for=\"".$row["data_type"]."\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></label>
            <input type=\"text\" class=\"form-control\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\" value=\"<?php echo $".$row["column_name"]."; ?>\" />
        </div>";
    }
}
$string .= "\n\t    <input type=\"hidden\" name=\"".$pk."\" value=\"<?php echo $".$pk."; ?>\" /> ";
$string .= "\n\t    <button type=\"submit\" class=\"btn btn-primary\"><?php echo \$button ?></button> ";
$string .= "\n\t    <a href=\"<?php echo site_url('".$c_url."') ?>\" class=\"btn btn-default\">Cancel</a>";
$string .= "\n\t</form>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <!--h2 style=\"margin-top:0px\">".ucfirst($table_name)." <?php echo \$button ?></h2-->
        
    <!--/body>
</html-->";

$hasil_view_form = createFile($string, $target."views/" . $c_url . "/" . $v_form_file);

?>