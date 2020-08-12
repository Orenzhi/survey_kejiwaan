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
        <h2 style="margin-top:0px">Puskesmas Read</h2>
        <table class="table">
	    <tr><td>Nama P</td><td><?php echo $nama_p; ?></td></tr>
	    <tr><td>Alamat P</td><td><?php echo $alamat_p; ?></td></tr>
	    <tr><td>Kelurahan</td><td><?php echo $kelurahan; ?></td></tr>
	    <tr><td>Kecamatan</td><td><?php echo $kecamatan; ?></td></tr>
	    <tr><td>Kota</td><td><?php echo $kota; ?></td></tr>
	    <tr><td>Provinsi</td><td><?php echo $provinsi; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('puskesmas') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>