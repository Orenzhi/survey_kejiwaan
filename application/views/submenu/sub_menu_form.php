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
                    <div class="widget-tabs-int">
                        <div class="tab-hd">
                            <h2>Tambah Data Sub_menu</h2>
                            <p>Ini merupakan form inputan Data Sub_menu.</p>
                        </div>
                        <!--div class="box pull-right">
                                <?php echo anchor(site_url('submenu/create'), 'Tambah Data', 'class="btn btn-primary fa fa-plus btn-sm"'); ?>
                            </div-->
                        <div class="widget-tabs-list">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#home">List Sub_menu</a></li>
                            </ul>
                            <div class="tab-content tab-custom-st">
                                <div id="home" class="tab-pane fade in active">
                                    <div class="tab-ctn">

                                        <form action="<?php echo $action; ?>" method="post">
                                            <div class="form-group">
                                                <?php $data = $this->men->get_all(); ?>
                                                <label for="int">Kode Menu <?php echo form_error('kode_menu') ?></label>
                                                <select name="kode_menu" id="kode_menu" class="form-control">
                                                    <option value="" id="kode_menu">Silahkan Pilih</option>
                                                    <?php foreach ($data as $key) : ?>
                                                        <option value="<?= $key->kode_menu ?>" id="kode_menu"><?= $key->kode_menu ?> - <?= $key->menu ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <!-- <input type="text" class="form-control" name="kode_menu" id="kode_menu" placeholder="Kode Menu" value="<?php echo $kode_menu; ?>" /> -->
                                            </div>
                                            <div class="form-group">
                                                <label for="varchar">Title <?php echo form_error('title') ?></label>
                                                <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $title; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <label for="varchar">Url <?php echo form_error('url') ?></label>
                                                <input type="text" class="form-control" name="url" id="url" placeholder="Url" value="<?php echo $url; ?>" />
                                            </div>
                                            <input type="hidden" name="id" value="<?php echo $id; ?>" />
                                            <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                                            <a href="<?php echo site_url('submenu') ?>" class="btn btn-default">Cancel</a>
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




    <!--h2 style="margin-top:0px">Sub_menu <?php echo $button ?></h2-->

    <!--/body>
</html-->