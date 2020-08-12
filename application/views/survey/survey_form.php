
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
                                            <h2>Data Survey</h2>
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
                                <h2>Tambah Data Survey</h2>
                                <p>Ini merupakan form inputan Data Survey.</p>
                            </div>
                            <!--div class="box pull-right">
                                <?php echo anchor(site_url('survey/create'),'Tambah Data', 'class="btn btn-primary fa fa-plus btn-sm"'); ?>
                            </div-->
                            <div class="widget-tabs-list">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#home">List Survey</a></li>
                                </ul>
                                <div class="tab-content tab-custom-st">
                                    <div id="home" class="tab-pane fade in active">
                                        <div class="tab-ctn">
                                            
                                            <form action="<?php echo $action; ?>" method="post">
                                        	    <div class="form-group">
                                                    <label for="varchar">No KK (Kartu Keluarga) <?php echo form_error('no_kk') ?></label>
                                                    <!-- <input type="text" class="form-control" name="no_kk" id="no_kk" placeholder="No Kk" value="<?php echo $no_kk; ?>" /> -->
                                                    <?php $data = $this->penduduk->get_all(); ?>
                                                    <select name="no_kk" class="form-control" id="no_kk">
                                                        <option id="no_kk" value="">Please Select</option>
                                                        <?php foreach ($data as $row): ?>
                                                        <option id="no_kk" value="<?php echo $row->no_kk; ?>"><?php echo $row->no_kk; ?> - <?php echo $row->nama; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                        	    <div class="form-group">
                                                    <label for="varchar">No NIK (Nomor Induk Keluarga)<?php echo form_error('nik') ?></label>
                                                    <!-- <input type="text" class="form-control" name="nik" id="nik" placeholder="Nik" value="<?php echo $nik; ?>" /> -->
                                                    <select name="nik" class="form-control" id="nik">
                                                        <option id="nik" value="">Please Select</option>
                                                        <?php $data = $this->penduduk->get_all(); ?>
                                                        <?php foreach($data as $row): ?>
                                                        <option id="nik" class="<?php echo $row->no_kk; ?>" value="<?php echo $row->nik; ?>" ><?php echo $row->nik ?> - <?php echo $row->nama; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                        	    <div class="form-group">
                                                    <label for="varchar">Nama Lengkap <?php echo form_error('nama') ?></label>
                                                    <!-- <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" /> -->
                                                    <select name="nama" class="form-control" id="nama">
                                                        <!-- <option id="nama" value="">Please Select</option> -->
                                                        <?php $data = $this->penduduk->get_all(); ?>
                                                        <?php foreach($data as $row): ?>
                                                        <option id="nama" class="<?php echo $row->nik; ?>" value="<?php echo $row->nama; ?>" ><?php echo $row->nama; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                        	    <div class="form-group">
                                                    <label for="varchar">Kondisi <?php echo form_error('kondisi') ?></label>
                                                    <!-- <input type="text" class="form-control" name="kondisi" id="kondisi" placeholder="Kondisi" value="<?php echo $kondisi; ?>" /> -->
                                                    <select name="kondisi" class="form-control" id="kondisi">
                                                        <option id="kondisi" value="">Please Select</option>
                                                        <option id="kondisi" value="Sehat">Sehat</option>
                                                        <option id="kondisi" value="Risiko Masalah Psikolososial">Risiko Masalah Psikolososial</option>
                                                        <option id="kondisi" value="Gangguan Jiwa">Gangguan Jiwa</option>
                                                        <option id="kondisi" value="Penyakit Kronik">Penyakit Kronik</option>
                                                    </select>
                                                </div>
                                        	    <input type="hidden" name="kd_surv" value="<?php echo $kd_surv; ?>" /> 
                                        	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                                        	    <a href="<?php echo site_url('survey') ?>" class="btn btn-default">Cancel</a>
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




        <!--h2 style="margin-top:0px">Survey <?php echo $button ?></h2-->
        
    <!--/body>
</html-->