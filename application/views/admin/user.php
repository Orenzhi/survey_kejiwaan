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
                                <button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="notika-icon notika-sent"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcomb area End-->
<div class="tabs-info-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?= $this->session->flashdata('message');  ?>
            </div>
        </div>
    </div>
</div>
<!-- Start tabs area-->
<div class="tabs-info-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="widget-tabs-int">
                    <div class="tab-hd">
                        <h2>Detail User</h2>
                        <p>Ini merupakan data rinci / detail User.</p>
                    </div>
                    <div class="box pull-right">
                        <a href="<?= base_url('user_man') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data</a>
                        <a href="#" class="btn btn-success btn-sm"><i class="fa fa-upload"></i> Import Data</a>
                        <a href="#" class="btn btn-info btn-sm"><i class="fa fa-download"></i> Eksport Data</a>
                        <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-file"></i> Sampel Data</a>
                        <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-exclamation-circle"></i> Hapus Semua Data</a>
                    </div>
                    <div class="widget-tabs-list">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#home">List User / Operator</a></li>
                        </ul>
                        <div class="tab-content tab-custom-st">
                            <div id="home" class="tab-pane fade in active">
                                <div class="tab-ctn">
                                    <div class="table-responsive">
                                        <table class="table table-hover" id="data-table-basic">
                                            <thead class="bg-danger">
                                                <tr>
                                                    <!-- <th>#</th> -->
                                                    <th>Nama User</th>
                                                    <th>Email</th>
                                                    <th>Password</th>
                                                    <th class="text-center">Foto</th>
                                                    <th>Tanggal Regist</th>
                                                    <th>Rule</th>
                                                    <th>Is Active ?</th>
                                                    <th class="text-center"><i class="fa fa-cogs"></i></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1;
                                                foreach ($show as $tampil) : ?>
                                                    <tr>
                                                        <!-- <td><?= $i++; ?></td> -->
                                                        <td><?= $tampil['nama'] ?></td>
                                                        <td><?= $tampil['email'] ?></td>
                                                        <td>
                                                            <?php $test = base_url('admin/Qrcode/') . $tampil['password_des']; ?>
                                                            <img src="<?= $test ?>" alt="">
                                                        </td>
                                                        <td><img class="img-circle img-responsive" height="100px" width="110px" src="<?= base_url('folder_file/foto/user/') . $tampil['foto_user'] ?>" alt="foto user"></td>
                                                        <!-- <td><?= $tampil['foto_user'] ?></td> -->
                                                        <td><?= $tampil['tgl_input'] ?></td>
                                                        <td>
                                                            <?php
                                                            $cek = $tampil['role_id'];
                                                            $conn = ($cek == 1) ? "Administrator" : "Member";
                                                            echo $conn;
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $cek = $tampil['is_active'];
                                                            $conn = ($cek == 1) ? "Aktif" : "Tidak Aktif";
                                                            echo $conn;
                                                            ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="btn-group" role="group" aria-label="...">
                                                                <a href="" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                                                <a href="<?= base_url('user/edit/') . $tampil['id'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                                                <a onclick="return confirm('Yakin akan menghapus data <?= $tampil['nama']  ?> ?')" href="<?= base_url('user/delete/') . $tampil['id'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End tabs area-->