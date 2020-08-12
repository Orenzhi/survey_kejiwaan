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
        <h2>Survey List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>No Kk</th>
		<th>Nik</th>
		<th>Nama</th>
		<th>Kondisi</th>
		
            </tr><?php
            foreach ($survey_data as $survey)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $survey->no_kk ?></td>
		      <td><?php echo $survey->nik ?></td>
		      <td><?php echo $survey->nama ?></td>
		      <td><?php echo $survey->kondisi ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>