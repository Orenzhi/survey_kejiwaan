
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
                                            <h2>Data Provinsi</h2>
                                            <p>Selamat Datang di Survey Kejiwaan Aplikasi</p>
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
                                <h2>Detail Provinsi</h2>
                                <p>Ini merupakan data rinci / detail Provinsi.</p>
                            </div>
                            <div class="box pull-right">
                                <?php echo anchor(site_url('provinsi/create'),'Tambah Data', 'class="btn btn-primary fa fa-plus btn-sm"'); ?>
                            </div>
                            <div class="widget-tabs-list">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#home">List Provinsi</a></li>
                                    <li><a data-toggle="tab" href="#menu1">Grafik Provinsi</a></li>
                                </ul>
                                <div class="tab-content tab-custom-st">
                                    <div id="home" class="tab-pane fade in active">
                                        <div class="tab-ctn">
                                            <div class="table-responsive">
                                                <table class="table table-hover" id="data-table-basic">
                                                  <thead class="bg-success">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>ID Provinsi</th>
                                                		<th>Provinsi</th>
                                                		<th>Action</th>
                                                    </tr></thead><tbody><?php
                                                    foreach ($provinsi_data as $provinsi)
                                                    {
                                                        ?>
                                                        <tr>
                                                			<td><?php echo ++$start ?></td>
                                                            <td><?php echo $provinsi->id_provinsi ?></td>
                                                			<td><?php echo $provinsi->provinsi ?></td>
                                                			<td style="text-align:center"><div class="btn-group" role="group" aria-label="...">
                                                				<?php 
                                                				echo anchor(site_url('provinsi/read/'.$provinsi->id_provinsi),' ','class="btn btn-success btn-sm fa fa-eye"'); 
                                                				echo anchor(site_url('provinsi/update/'.$provinsi->id_provinsi),' ','class="btn btn-warning btn-sm fa fa-pencil"'); 
                                                				echo anchor(site_url('provinsi/delete/'.$provinsi->id_provinsi),' ','onclick="javasciprt: return confirm(\'Anda Yakin Akan Menghapus Data ini ?\')" class="btn btn-sm btn-danger fa fa-trash"'); 
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
		<?php echo anchor(site_url('provinsi/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('provinsi/word'), 'Word', 'class="btn btn-primary"'); ?>
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