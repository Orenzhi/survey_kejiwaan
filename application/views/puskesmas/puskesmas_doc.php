<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Puskesmas List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama P</th>
		<th>Alamat P</th>
		<th>Kelurahan</th>
		<th>Kecamatan</th>
		<th>Kota</th>
		<th>Provinsi</th>
		
            </tr><?php
            foreach ($puskesmas_data as $puskesmas)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $puskesmas->nama_p ?></td>
		      <td><?php echo $puskesmas->alamat_p ?></td>
		      <td><?php echo $puskesmas->kelurahan ?></td>
		      <td><?php echo $puskesmas->kecamatan ?></td>
		      <td><?php echo $puskesmas->kota ?></td>
		      <td><?php echo $puskesmas->provinsi ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>