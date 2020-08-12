<!doctype html>
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
    <body>
        <h2 style="margin-top:0px">Surveyor Read</h2>
        <table class="table">
	    <tr><td>Nik S</td><td><?php echo $nik_s; ?></td></tr>
	    <tr><td>Nama S</td><td><?php echo $nama_s; ?></td></tr>
	    <tr><td>Alamat S</td><td><?php echo $alamat_s; ?></td></tr>
	    <tr><td>Rt S</td><td><?php echo $rt_s; ?></td></tr>
	    <tr><td>Rw S</td><td><?php echo $rw_s; ?></td></tr>
	    <tr><td>Kelurahan S</td><td><?php echo $kelurahan_s; ?></td></tr>
	    <tr><td>Kecamatan S</td><td><?php echo $kecamatan_s; ?></td></tr>
	    <tr><td>Kota S</td><td><?php echo $kota_s; ?></td></tr>
	    <tr><td>Provinsi S</td><td><?php echo $provinsi_s; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('surveyor') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>