
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
                                            <h2>Data Penduduk</h2>
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
                                <h2>Tambah Data Penduduk</h2>
                                <p>Ini merupakan form inputan Data Penduduk.</p>
                            </div>
                            <!--div class="box pull-right">
                                <?php echo anchor(site_url('penduduk/create'),'Tambah Data', 'class="btn btn-primary fa fa-plus btn-sm"'); ?>
                            </div-->
                            <div class="widget-tabs-list">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#home">List Penduduk</a></li>
                                </ul>
                                <div class="tab-content tab-custom-st">
                                    <div id="home" class="tab-pane fade in active">
                                        <div class="tab-ctn">
                                            
                                            <form action="<?php echo $action; ?>" method="post">
                                            <div class="form-group row">
                                                <div class="col-sm-3">
                                                    <label for="varchar">Provinsi <?php echo form_error('provinsi') ?></label>
                                                    <!-- <input type="text" class="form-control" name="provinsi" id="provinsi" placeholder="Provinsi" value="<?php echo $provinsi; ?>" /> -->
                                                    <select name="provinsi" class="form-control" id="provinsi">
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
                                                    <label for="varchar">Kota <?php echo form_error('kota') ?></label>
                                                    <!-- <input type="text" class="form-control" name="kota" id="kota" placeholder="Kota" value="<?php echo $kota; ?>" /> -->
                                                    <select name="kota" class="form-control" id="kota">
                                                        <option value="">Please Select</option>
                                                        <?php 
                                                            $data = $this->kota->get_kota_spesifik(); 
                                                            foreach($data as $row):
                                                            $cek = ($row->id_kota == $kota) ? "selected" : "";
                                                        ?>
                                                        <option <?php echo $cek; ?> id="kota" class="<?php echo $row->id_provinsi ?>" value="<?php echo $row->id_kota; ?>"><?php echo $row->nama_kota; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="varchar">Kecamatan <?php echo form_error('kecamatan') ?></label>
                                                     <!-- <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan" value="<?php echo $kecamatan; ?>" /> -->
                                                     <select name="kecamatan" class="form-control" id="kecamatan">
                                                        <option value="">Please Select</option>
                                                        <?php 
                                                            $data = $this->kecamatan->get_kec_spesifik(); 
                                                            foreach($data as $row):
                                                            $cek = ($row->id_kecamatan == $kecamatan) ? "selected" : "";
                                                        ?>
                                                        <option id="kecamatan" <?php echo $cek ?> class="<?php echo $row->id_kota; ?>" value="<?php echo $row->id_kecamatan; ?>"><?php echo $row->nama_kecamatan; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="varchar">Desa <?php echo form_error('kelurahan') ?></label>
                                                    <!-- <input type="text" class="form-control" name="kelurahan" id="kelurahan" placeholder="Kelurahan" value="<?php echo $kelurahan; ?>" /> -->
                                                    <select  name="kelurahan" class="form-control" id="kelurahan">
                                                        <option value="">Please Select</option>
                                                        <?php 
                                                            $data = $this->desa->get_desa_spesifik(); 
                                                            foreach($data as $row):
                                                            $cek = ($row->id_desa == $kelurahan) ? "selected" : "";
                                                        ?>
                                                        <option id="kelurahan" <?php echo $cek ?> class="<?php echo $row->id_kecamatan_fk; ?>" value="<?php echo $row->id_desa; ?>"><?php echo $row->nama_desa; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- <div class="form-group">
                                                <label for="varchar">Kota <?php echo form_error('kota') ?></label>
                                                <input type="text" class="form-control" name="kota" id="kota" placeholder="Kota" value="<?php echo $kota; ?>" />
                                            </div> -->
                                            <!-- <div class="form-group">
                                                <label for="varchar">Kecamatan <?php echo form_error('kecamatan') ?></label>
                                                <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan" value="<?php echo $kecamatan; ?>" />
                                            </div> -->
                                            <!-- <div class="form-group">
                                                <label for="varchar">Desa <?php echo form_error('kelurahan') ?></label>
                                                <input type="text" class="form-control" name="kelurahan" id="kelurahan" placeholder="Kelurahan" value="<?php echo $kelurahan; ?>" />
                                            </div> -->
                                            <div class="form-group">
                                                <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
                                                <!-- <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" /> -->
                                                <textarea class="form-control" name="alamat" placeholder="Alamat Lengkap"><?php echo $alamat; ?>
                                                </textarea>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="varchar">RT <?php echo form_error('rt') ?></label>
                                                    <input type="text" class="form-control" name="rt" id="rt" placeholder="Rt" value="<?php echo $rt; ?>" />
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="varchar">RW <?php echo form_error('rw') ?></label>
                                                    <input type="text" class="form-control" name="rw" id="rw" placeholder="Rw" value="<?php echo $rw; ?>" />
                                                </div>
                                            </div>
                                            <!-- <div class="form-group">
                                                <label for="varchar">RW <?php echo form_error('rw') ?></label>
                                                <input type="text" class="form-control" name="rw" id="rw" placeholder="Rw" value="<?php echo $rw; ?>" />
                                            </div> -->
                                    	    <div class="form-group">
                                                <label for="varchar">No. KK <?php echo form_error('no_kk') ?></label>
                                                <input type="text" class="form-control" name="no_kk" id="no_kk" placeholder="Masukan No Kartu Keluarga" value="<?php echo $no_kk; ?>" />
                                            </div>
                                    	    <div class="form-group">
                                                <label for="varchar">NIK <?php echo form_error('nik') ?></label>
                                                <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukan No. Induk Keluarga" value="<?php echo $nik; ?>" />
                                            </div>
                                    	    <div class="form-group">
                                                <label for="varchar">Nama Lengkap<?php echo form_error('nama') ?></label>
                                                <input type="text" class="form-control" name="nama" id="nama" placeholder="" value="<?php echo $nama; ?>" />
                                            </div>
                                    	    <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="varchar">Tempat Lahir <?php echo form_error('tempat_lahir') ?></label>
                                                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" />
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="date">Tanggal Lahir <?php echo form_error('tgl_lahir') ?></label>
                                                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Tgl Lahir" value="<?php echo $tgl_lahir; ?>" />
                                                </div>
                                            </div>
                                    	   <!--  <div class="form-group">
                                                <label for="date">Tanggal Lahir <?php echo form_error('tgl_lahir') ?></label>
                                                <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Tgl Lahir" value="<?php echo $tgl_lahir; ?>" />
                                            </div> -->
                                    	    <div class="form-group">
                                                <label for="enum">Jenis Kelamin <?php echo form_error('jk') ?></label>
                                                <!-- <input type="text" class="form-control" name="jk" id="jk" placeholder="Jk" value="<?php echo $jk; ?>" /> -->
                                                <?php $cek = ($jk === 'Laki-laki') ? "checked" : ""; ?>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="customRadioInline1" name="jk" value="Laki-laki" class="custom-control-input" <?php echo $cek ?> >
                                                    <label class="custom-control-label" for="customRadioInline1" style="font-weight: normal;">Laki - Laki</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <?php $cek = ($jk === 'Perempuan') ? "checked" : ""; ?>
                                                    <input type="radio" id="customRadioInline2" name="jk" value="Perempuan" class="custom-control-input" <?php echo $cek; ?> >
                                                    <label class="custom-control-label" for="customRadioInline2" style="font-weight: normal;" >Perempuan</label>
                                                </div>
                                            </div>
                                    	    <div class="form-group">
                                                <label for="varchar">Status Perkawinan <?php echo form_error('stts_perkawinan') ?></label>
                                                <!-- <input type="text" class="form-control" name="stts_perkawinan" id="stts_perkawinan" placeholder="Stts Perkawinan" value="<?php echo $stts_perkawinan; ?>" /> -->
                                                <select class="form-control" name="stts_perkawinan" id="stts">
                                                    <option value="">Please Select</option>
                                                    <option id="stts" value="Menikah" <?php if($stts_perkawinan == "Menikah"){echo "selected";} ?> >Menikah</option>
                                                    <option id="stts" value="Cerai" <?php if($stts_perkawinan == "Cerai"){echo "selected";} ?> >Cerai</option>
                                                    <option id="stts" value="Belum Menikah" <?php if($stts_perkawinan == "Belum Menikah"){echo "selected";} ?> >Belum Menikah</option>
                                                </select>
                                            </div>
                                    	    <div class="form-group">
                                                <label for="varchar">Pekerjaan <?php echo form_error('pekerjaan') ?></label>
                                                <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" value="<?php echo $pekerjaan; ?>" />
                                            </div>
                                    	    <div class="form-group">
                                                <label for="enum">Agama <?php echo form_error('agama') ?></label>
                                                <!-- <input type="text" class="form-control" name="agama" id="agama" placeholder="Agama" value="<?php echo $agama; ?>" /> -->
                                                <select class="form-control" name="agama" id="agama">
                                                    <option value="">Please Select</option>
                                                    <option id="agama" value="islam" <?php if($agama === "islam"){echo "selected";} ?> >Islam</option>
                                                    <option id="agama" value="protestan" <?php if($agama === "protestan"){echo "selected";} ?> >Protestan</option>
                                                    <option id="agama" value="khatolik" <?php if($agama === "khatolik"){echo "selected";} ?> >Khatolik</option>
                                                    <option id="agama" value="hindu" <?php if($agama === "hindu"){echo "selected";} ?> >Hindu</option>
                                                    <option id="agama" value="budha" <?php if($agama === "budha"){echo "selected";} ?> >Budha</option>
                                                    <option id="agama" value="khonghucu" <?php if($agama === "khonghucu"){echo "selected";} ?> >Khonghucu</option>
                                                </select>
                                            </div>
                                    	    <div class="form-group">
                                                <label for="enum">Kewarganeraan <?php echo form_error('kewarganeraan') ?></label>
                                                <!-- <input type="text" class="form-control" name="kewarganeraan" id="kewarganeraan" placeholder="Kewarganeraan" value="<?php echo $kewarganeraan; ?>" /> -->
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <?php $cek = ($kewarganeraan === 'wni') ? "checked" : ""; ?>
                                                    <input type="radio" id="customRadioInline1" name="kewarganeraan" value="WNI" class="custom-control-input" <?php echo $cek; ?> >
                                                    <label class="custom-control-label" for="customRadioInline1" style="font-weight: normal;">Warga Negara Indonesia (WNI)</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                     <?php $cek = ($kewarganeraan === 'wna') ? "checked" : ""; ?>
                                                    <input type="radio" id="customRadioInline2" name="kewarganeraan" value="WNA" class="custom-control-input" <?php echo $cek; ?> >
                                                    <label class="custom-control-label" for="customRadioInline2" style="font-weight: normal;" >Warga Negara Asing (WNA)</label>
                                                </div>
                                            </div>
                                    	    <input type="hidden" name="id_t1" value="<?php echo $id_t1; ?>" /> 
                                    	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                                    	    <a href="<?php echo site_url('penduduk') ?>" class="btn btn-default">Cancel</a>
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




        <!--h2 style="margin-top:0px">Penduduk <?php echo $button ?></h2-->
        
    <!--/body>
</html