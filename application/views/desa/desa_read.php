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
        <h2 style="margin-top:0px">Desa Read</h2>
        <table class="table">
	    <tr><td>Id Kecamatan Fk</td><td><?php echo $id_kecamatan_fk; ?></td></tr>
	    <tr><td>Nama Desa</td><td><?php echo $nama_desa; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('desa') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>