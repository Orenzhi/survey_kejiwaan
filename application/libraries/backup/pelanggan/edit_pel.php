 Breadcomb area Start-->
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
                                    <h2>Data Pelanggan</h2>
                                    <p>Selamat Datang di CI_SIA <span class="bread-ntd">Rezhi Saputra</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                            <div class="breadcomb-report">
                                <a href="<?= base_url('admin/pelanggan') ?>"><button data-toggle="tooltip" data-placement="left" title="Kembali" class="btn"><i class="fa fa-mail-reply"></i></button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcomb area End-->
<!-- Start tabs area-->
<div class="tabs-info-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="widget-tabs-int">
                    <div class="tab-hd">
                        <h2>Edit Data Pelanggan</h2>
                        <p>Ini merupakan form edit data pelanggan.</p>
                    </div>
                    <div class="box">
                        <?= form_open_multipart(base_url('pelanggan/update/' . $edit['id']))?>
                        <div class="form-group">
                            <label for="kode_pelanggan">Kode Pelanggan</label>
                            <input type="text" class="form-control" name="kode_pel" id="kode_pelanggan" value="<?= $edit['kode_pel'] ?>" placeholder="misal 1610512023" readonly title="tidak bisa di edit">
                            <?= form_error('kode_pel', '<small class=\'text-danger pull-left\'>', '</small>');  ?>
                            <br>
                        </div>
                        <div class="form-group">
                            <label for="nama_pelanggan">Nama Pelanggan</label>
                            <input type="text" class="form-control" name="nama_pel" id="nama_pelanggan" value="<?= $edit['nama_pel'] ?>" placeholder="misal Rezhi Saputra">
                            <?= form_error('nama_pel', '<small class=\'text-danger pull-left\'>', '</small>');  ?>
                            <br>
                        </div>
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <div class="radio">
                                <label style="padding-right:5px">
                                    <?php
                                    $tes = $edit['jk'];
                                    $cek = ($tes === 'Laki-Laki') ? "checked" : "salah";
                                    //$cek = $edit['jk'];
                                    ?>
                                    <input type="radio" name="jk" id="jk" value="Laki-laki" <?= $cek ?>>
                                    Laki-laki
                                </label>
                                <label>
                                    <?php
                                    $tes = $edit['jk'];
                                    $cek = ($tes === 'Perempuan') ? "checked" : "salah";
                                    //$cek = $edit['jk'];
                                    ?>
                                    <input type="radio" name="jk" id="jk" value="Perempuan" <?= $cek ?>>
                                    Perempuan
                                </label>
                            </div>
                            <br>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" class="form-control" rows="4"><?= $edit['alamat'] ?></textarea>
                            <?= form_error('alamat', '<small class=\'text-danger pull-left\'>', '</small>');  ?>
                            <br>
                        </div>
                        <div class="form-group" style="padding-bottom: 15px">
                            <label for="foto">Foto</label>
                            <input type="file" name="foto" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-save"></i> Update</button>
                        <button type="reset" class="btn btn-dark btn-sm"><i class="fa fa-refresh"></i> Reset</button>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End tabs area