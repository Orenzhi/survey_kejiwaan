<!--doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body-->
        <div id="loader">Loading...</div>
        <div class="notika-status-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="box timer btn btn-success btn-sm" id='timer'></div>
                    <div class="box timer btn btn-warning btn-sm"> Pengembangan 2 </div>
                </div>
            </div>
        </div>
        
        <div class="breadcomb-area zhien-profil-bread">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="breadcomb-list zhien-breadcomb-list">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="breadcomb-wp">
                                        <div class="breadcomb-icon">
                                            <i class="notika-icon notika-support"></i>
                                        </div>
                                        <div class="breadcomb-ctn">
                                            <h2>Data Sub_menu</h2>
                                            <p>Selamat Datang di CI_SIA <span class="bread-ntd">Rezhi Saputra</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                                    <div class="breadcomb-report">
                                        <button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="notika-icon notika-sent"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tabs-info-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                    </div>
                </div>
            </div>
        </div>


        <div class="tabs-info-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="widget-tabs-int">
                            <div class="tab-hd">
                                <h2>Detail Sub_menu</h2>
                                <p>Ini merupakan data rinci / detail Sub_menu.</p>
                            </div>
                            <div class="box pull-right">
                                <?php echo anchor(site_url('submenu/create'),'Tambah Data', 'class="btn btn-primary fa fa-plus btn-sm"'); ?>
                            </div>
                            <div class="widget-tabs-list">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#home">List Sub_menu</a></li>
                                    <li><a data-toggle="tab" href="#menu1">Grafik Sub_menu</a></li>
                                </ul>
                                <div class="tab-content tab-custom-st">
                                    <div id="home" class="tab-pane fade in active">
                                        <div class="tab-ctn">
                                            <div class="table-responsive">
                                                <table class="table table-hover" id="data-table-basic">
                                                  <thead class="bg-success">
                                                    <tr>
                                                        <th>No</th>
		<th>Kode Menu</th>
		<th>Title</th>
		<th>Url</th>
		<th>Action</th>
                                                    </tr></thead><tbody><?php
                                                    foreach ($submenu_data as $submenu)
                                                    {
                                                        ?>
                                                        <tr>
			<td><?php echo ++$start ?></td>
            <?php 
                $a = $submenu->kode_menu;
                $b = $this->Sub_menu_model->join_datak($a);
            ?>
			<td><?php echo $submenu->kode_menu ?> - <?php echo $b->menu; ?></td>
			<td><?php echo $submenu->title ?></td>
			<td><?php echo $submenu->url ?></td>
			<td style="text-align:center"><div class="btn-group" role="group" aria-label="...">
				<?php 
				echo anchor(site_url('submenu/read/'.$submenu->id),' ','class="btn btn-success btn-sm fa fa-eye"'); 
				echo anchor(site_url('submenu/update/'.$submenu->id),' ','class="btn btn-warning btn-sm fa fa-pencil"'); 
				echo anchor(site_url('submenu/delete/'.$submenu->id),' ','onclick="javasciprt: return confirm(\'Anda Yakin Akan Menghapus Data ini ?\')" class="btn btn-sm btn-danger fa fa-trash"'); 
				?></div>
			</td>
		</tr>
                                                        <?php
                                                    }
                                                    ?></tbody>
                                                </table>
                                                <!--div class="row">
                                                    <div class="col-md-12"-->
                                                        <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    <!--/div>
                                                    <div class="col-md-6 text-right">
                                                        <?php echo $pagination ?>
                                                    </div>
                                                </div-->
                                            </div>
                                        </div>
                                    </div>
                                    <div id="menu1" class="tab-pane fade">
                                        <div class="tab-ctn">
                                            <p>Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nulla sit amet est. Praesent ac the massa at ligula laoreet iaculis. Vivamus aliquet elit ac nisl. Nulla porta dolor. Cras dapibus. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.</p>
                                            <p class="tab-mg-b-0">In hac habitasse platea dictumst. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Nam eget dui. In ac felis quis tortor malesuadan of pretium. Phasellus consectetuer vestibulum elit. Duis lobortis massa imperdiet quam. Pellentesque commodo eros a enim. Vestibulum ante ipsum primis in faucibus orci the luctus et ultrices posuere cubilia Curae; In ac dui quis mi consectetuer lacinia. Phasellus a est. Pellentesque commodo eros a enim. Cras ultricies mi eu turpis hendrerit of fringilla. Donec mollis hendrerit risus. Vestibulum turpis sem, aliquet eget, lobortis pellentesque, rutrum eu, nisl. Praesent egestas neque eu enim. In hac habitasse plat.</p>
                                        </div>
                                    </div>
                                    <div id="menu2" class="tab-pane fade">
                                        <div class="tab-ctn">
                                            <p>Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nulla sit amet est. Praesent ac the massa at ligula laoreet iaculis. Vivamus aliquet elit ac nisl. Nulla porta dolor. Cras dapibus. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.</p>
                                            <p class="tab-mg-b-0">In hac habitasse platea dictumst. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Nam eget dui. In ac felis quis tortor malesuadan of pretium. Phasellus consectetuer vestibulum elit. Duis lobortis massa imperdiet quam. Pellentesque commodo eros a enim. Vestibulum ante ipsum primis in faucibus orci the luctus et ultrices posuere cubilia Curae; In ac dui quis mi consectetuer lacinia. Phasellus a est. Pellentesque commodo eros a enim. Cras ultricies mi eu turpis hendrerit of fringilla. Donec mollis hendrerit risus. Vestibulum turpis sem, aliquet eget, lobortis pellentesque, rutrum eu, nisl. Praesent egestas neque eu enim. In hac habitasse plat.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>











    <!--/body>
</html-->