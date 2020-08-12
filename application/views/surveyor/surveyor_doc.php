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
        <h2>Surveyor List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nik S</th>
		<th>Nama S</th>
		<th>Alamat S</th>
		<th>Rt S</th>
		<th>Rw S</th>
		<th>Kelurahan S</th>
		<th>Kecamatan S</th>
		<th>Kota S</th>
		<th>Provinsi S</th>
		
            </tr><?php
            foreach ($surveyor_data as $surveyor)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $surveyor->nik_s ?></td>
		      <td><?php echo $surveyor->nama_s ?></td>
		      <td><?php echo $surveyor->alamat_s ?></td>
		      <td><?php echo $surveyor->rt_s ?></td>
		      <td><?php echo $surveyor->rw_s ?></td>
		      <td><?php echo $surveyor->kelurahan_s ?></td>
		      <td><?php echo $surveyor->kecamatan_s ?></td>
		      <td><?php echo $surveyor->kota_s ?></td>
		      <td><?php echo $surveyor->provinsi_s ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>