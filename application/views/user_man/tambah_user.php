<!-- Breadcomb area Start-->
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
                                    <h2>Data User / Operator</h2>
                                    <p>Selamat Datang di CI_SIA <span class="bread-ntd">Rezhi Saputra</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                            <div class="breadcomb-report">
                                <a href="<?= base_url('admin/user') ?>"><button data-toggle="tooltip" data-placement="left" title="Kembali" class="btn"><i class="fa fa-mail-reply"></i></button></a>
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
                        <h2>Tambah User / Operator</h2>
                        <p>Ini merupakan form input User.</p>
                    </div>
                    <div class="box">
                        <?= form_open(base_url('user_man')) ?>
                        <div class="form-group">
                            <label for="nama">Nama User</label>
                            <input type="text" class="form-control" name="nama" id="nama" value="<?= set_value('nama') ?>">
                            <?= form_error('nama', '<small class=\'text-danger pull-left\'>', '</small>');  ?>
                            <br>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="<?= set_value('email') ?>" placeholder="misal contoh@email.com">
                            <?= form_error('email', '<small class=\'text-danger pull-left\'>', '</small>');  ?>
                            <br>
                        </div>
                        <div class="form-group">
                            <label for="email">Password</label>
                            <input type="password" class="form-control" name="password" id="password" value="<?= set_value('password') ?>">
                            <?= form_error('password', '<small class=\'text-danger pull-left\'>', '</small>');  ?>
                            <br>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" name="foto" class="form-control">
                            <br>
                        </div>
                        <div class="form-group">
                            <label for="is_active">Is Active ?</label>
                            <select name="aktif" id="is_active" class="form-control">
                                <option value="1" id="is_active" selected>Aktif</option>
                                <option value="0" id="is_active">Tidak Aktif</option>
                            </select>
                            <br>
                        </div>
                        <div class="form-group">
                            <label for="rule">Role</label>
                            <div class="radio">
                                <label style="padding-right:5px">
                                    <input type="radio" name="rule" id="rule" value="1">
                                    Administrator
                                </label>
                                <label>
                                    <input type="radio" name="rule" id="rule" value="2">
                                    Member
                                </label>
                            </div>
                            <br>
                        </div>
                        <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-save"></i> Simpan</button>
                        <button type="reset" class="btn btn-dark btn-sm"><i class="fa fa-refresh"></i> Reset</button>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End tabs area-->