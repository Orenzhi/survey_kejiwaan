<!--!doctype html>
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

    <div class="notika-status-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="box timer btn btn-success btn-sm" id='timer'></div>
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
                                            <h2>Data Desa</h2>
                                            <p>Selamat Datang di Survey Kejiwaan </p>
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
                        <div class="widget-tabs-int">
                            <div class="tab-hd">
                                <h2>Tambah Data Desa</h2>
                                <p>Ini merupakan form inputan Data Desa.</p>
                            </div>
                            <!--div class="box pull-right">
                                <?php echo anchor(site_url('desa/create'),'Tambah Data', 'class="btn btn-primary fa fa-plus btn-sm"'); ?>
                            </div-->
                            <div class="widget-tabs-list">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#home">List Desa</a></li>
                                </ul>
                                <div class="tab-content tab-custom-st">
                                    <div id="home" class="tab-pane fade in active">
                                        <div class="tab-ctn">
                                            
                                            <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Kecamatan Fk <?php echo form_error('id_kecamatan_fk') ?></label>
            <input type="text" class="form-control" name="id_kecamatan_fk" id="id_kecamatan_fk" placeholder="Id Kecamatan Fk" value="<?php echo $id_kecamatan_fk; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Desa <?php echo form_error('nama_desa') ?></label>
            <input type="text" class="form-control" name="nama_desa" id="nama_desa" placeholder="Nama Desa" value="<?php echo $nama_desa; ?>" />
        </div>
	    <input type="hidden" name="id_desa" value="<?php echo $id_desa; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('desa') ?>" class="btn btn-default">Cancel</a>
	</form>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <!--h2 style="margin-top:0px">Desa <?php echo $button ?></h2-->
        
    <!--/body>
</html-->