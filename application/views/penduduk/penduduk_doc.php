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
        <h2>Penduduk List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>No Kk</th>
		<th>Nik</th>
		<th>Nama</th>
		<th>Tempat Lahir</th>
		<th>Tgl Lahir</th>
		<th>Jk</th>
		<th>Stts Perkawinan</th>
		<th>Pekerjaan</th>
		<th>Agama</th>
		<th>Kewarganeraan</th>
		<th>Alamat</th>
		<th>Rt</th>
		<th>Rw</th>
		<th>Kelurahan</th>
		<th>Kecamatan</th>
		<th>Kota</th>
		<th>Provinsi</th>
		
            </tr><?php
            foreach ($penduduk_data as $penduduk)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $penduduk->no_kk ?></td>
		      <td><?php echo $penduduk->nik ?></td>
		      <td><?php echo $penduduk->nama ?></td>
		      <td><?php echo $penduduk->tempat_lahir ?></td>
		      <td><?php echo $penduduk->tgl_lahir ?></td>
		      <td><?php echo $penduduk->jk ?></td>
		      <td><?php echo $penduduk->stts_perkawinan ?></td>
		      <td><?php echo $penduduk->pekerjaan ?></td>
		      <td><?php echo $penduduk->agama ?></td>
		      <td><?php echo $penduduk->kewarganeraan ?></td>
		      <td><?php echo $penduduk->alamat ?></td>
		      <td><?php echo $penduduk->rt ?></td>
		      <td><?php echo $penduduk->rw ?></td>
		      <td><?php echo $penduduk->kelurahan ?></td>
		      <td><?php echo $penduduk->kecamatan ?></td>
		      <td><?php echo $penduduk->kota ?></td>
		      <td><?php echo $penduduk->provinsi ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>