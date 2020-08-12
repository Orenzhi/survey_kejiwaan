
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
                                            <h2>Data Surveyor</h2>
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
                                <h2>Tambah Data Surveyor</h2>
                                <p>Ini merupakan form inputan Data Surveyor.</p>
                            </div>
                            <!--div class="box pull-right">
                                <?php echo anchor(site_url('surveyor/create'),'Tambah Data', 'class="btn btn-primary fa fa-plus btn-sm"'); ?>
                            </div-->
                            <div class="widget-tabs-list">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#home">List Surveyor</a></li>
                                </ul>
                                <div class="tab-content tab-custom-st">
                                    <div id="home" class="tab-pane fade in active">
                                        <div class="tab-ctn">
                                            
                                            <form action="<?php echo $action; ?>" method="post">
                                            <div class="form-group row">
                                            <div class="col-sm-3">
                                                    <label for="varchar">Provinsi <?php echo form_error('provinsi_s') ?></label>
                                                    <!-- <input type="text" class="form-control" name="provinsi_s" id="provinsi_s" placeholder="provinsi_s" value="<?php echo $provinsi_s; ?>" /> -->
                                                    <select name="provinsi_s" class="form-control" id="provinsi_s">
                                                        <option value="">Please Select</option>
                                                        <?php 
                                                            $data = $this->provinsi->get_all(); 
                                                            foreach($data as $row):
                                                            $cek = ($row->id_provinsi == $provinsi) ? "selected" : "";
                                                        ?>
                                                        <option <?php echo $cek; ?> value="<?php echo $row->id_provinsi; ?>"><?php echo $row->provinsi; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="varchar">Kota <?php echo form_error('kota_s') ?></label>
                                                    <!-- <input type="text" class="form-control" name="kota_s" id="kota_s" placeholder="kota_s" value="<?php echo $kota_s; ?>" /> -->
                                                    <select name="kota_s" class="form-control" id="kota_s">
                                                        <option value="">Please Select</option>
                                                        <?php 
                                                            $data = $this->kota->get_kota_spesifik(); 
                                                            foreach($data as $row):
                                                            $cek = ($row->id_kota == $kota) ? "selected" : "";
                                                        ?>
                                                        <option <?php echo $cek; ?> id="kota_s" class="<?php echo $row->id_provinsi ?>" value="<?php echo $row->id_kota; ?>"><?php echo $row->nama_kota; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="varchar">Kecamatan <?php echo form_error('kecamatan_s') ?></label>
                                                     <!-- <input type="text" class="form-control" name="kecamatan_s" id="kecamatan_s" placeholder="kecamatan_s" value="<?php echo $kecamatan_s; ?>" /> -->
                                                     <select name="kecamatan_s" class="form-control" id="kecamatan_s">
                                                        <option value="">Please Select</option>
                                                        <?php 
                                                            $data = $this->kecamatan->get_kec_spesifik(); 
                                                            foreach($data as $row):
                                                            $cek = ($row->id_kecamatan == $kecamatan) ? "selected" : "";
                                                        ?>
                                                        <option id="kecamatan_s" <?php echo $cek ?> class="<?php echo $row->id_kota; ?>" value="<?php echo $row->id_kecamatan; ?>"><?php echo $row->nama_kecamatan; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="varchar">Desa <?php echo form_error('kelurahan_s') ?></label>
                                                    <!-- <input type="text" class="form-control" name="kelurahan_s" id="kelurahan_s" placeholder="kelurahan_s" value="<?php echo $kelurahan_s; ?>" /> -->
                                                    <select  name="kelurahan_s" class="form-control" id="kelurahan_s">
                                                        <option value="">Please Select</option>
                                                        <?php 
                                                            $data = $this->desa->get_desa_spesifik(); 
                                                            foreach($data as $row):
                                                            $cek = ($row->id_desa == $kelurahan) ? "selected" : "";
                                                        ?>
                                                        <option id="kelurahan_s" <?php echo $cek ?> class="<?php echo $row->id_kecamatan_fk; ?>" value="<?php echo $row->id_desa; ?>"><?php echo $row->nama_desa; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                    	    <div class="form-group">
                                                <label for="varchar">NIK Surveyor <?php echo form_error('nik_s') ?></label>
                                                <!-- <input type="text" class="form-control" name="nik_s" id="nik_s" placeholder="Nik S" value="<?php echo $nik_s; ?>" /> -->
                                                <select class="selectpicker" name="nik_s" id="nik_s" data-live-search="true">
                                                  <option data-tokens="">Please Select</option>
                                                  <?php 
                                                    $data = $this->penduduk->get_all();
                                                    foreach($data as $row):
                                                  ?>
                                                  <option id="nik_s" value="<?php echo $row->nik ?>" data-tokens="<?php echo $row->nik ?>"><?php echo $row->nik; ?> - <?php echo $row->nama; ?></option>
                                                  <?php endforeach; ?>
                                                </select>
                                            </div>
                                    	    <div class="form-group">
                                                <label for="varchar">Nama Surveyor <?php echo form_error('nama_s') ?></label>
                                                <!-- <input type="text" class="form-control" name="nama_s" id="nama_s" placeholder="Nama S" value="<?php echo $nama_s; ?>" /> -->
                                                <select name="nama_s" id="nama_s" class="form-control">
                                                    <!-- <option value="">Please Option</option> -->
                                                    <?php 
                                                        $data = $this->penduduk->get_all();
                                                        foreach($data as $row): 
                                                    ?>
                                                    <option id="nama_s" value="<?php echo $row->nama ?>" class="<?php echo $row->nik ?>"><?php echo $row->nama ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                    	    <div class="form-group">
                                                <label for="varchar">Alamat Surveyor <?php echo form_error('alamat_s') ?></label>
                                                <!-- <input type="text" class="form-control" name="alamat_s" id="alamat_s" placeholder="Alamat S" value="<?php echo $alamat_s; ?>" /> -->
                                                <textarea class="form-control" name="alamat_s" id="alamat_s"><?php echo $alamat_s; ?></textarea>
                                            </div>
                                    	    <div class="form-group">
                                                <label for="varchar">RT Surveyor <?php echo form_error('rt_s') ?></label>
                                                <input type="text" class="form-control" name="rt_s" id="rt_s" placeholder="Rt S" value="<?php echo $rt_s; ?>" />
                                            </div>
                                    	    <div class="form-group">
                                                <label for="varchar">RW Surveyor <?php echo form_error('rw_s') ?></label>
                                                <input type="text" class="form-control" name="rw_s" id="rw_s" placeholder="Rw S" value="<?php echo $rw_s; ?>" />
                                            </div>
                                    	    <input type="hidden" name="id_sv" value="<?php echo $id_sv; ?>" /> 
                                    	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                                    	    <a href="<?php echo site_url('surveyor') ?>" class="btn btn-default">Cancel</a>
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




        <!--h2 style="margin-top:0px">Surveyor <?php echo $button ?></h2-->
        
    <!--/body>
</html-->