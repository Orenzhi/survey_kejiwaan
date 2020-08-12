<!-- Breadcomb area Start-->
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<div class="box timer btn btn-success btn-sm" id='timer'></div>
			<div class="box timer btn btn-warning btn-sm"> Pengembangan 2 </div>
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
						<h2>Detail Pelanggan</h2>
						<p>Ini merupakan data rinci / detail pelanggan.</p>
					</div>
					<div class="box pull-right">
						<a href="<?= base_url('pelanggan') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data</a>
						<a href="#" class="btn btn-success btn-sm"><i class="fa fa-upload"></i> Import Data</a>
						<a href="#" class="btn btn-info btn-sm"><i class="fa fa-download"></i> Eksport Data</a>
						<a href="#" class="btn btn-primary btn-sm"><i class="fa fa-file"></i> Sampel Data</a>
						<a href="#" class="btn btn-danger btn-sm"><i class="fa fa-exclamation-circle"></i> Hapus Semua Data</a>
					</div>
					<div class="widget-tabs-list">
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#home">List Pelanggan</a></li>
							<li><a data-toggle="tab" href="#menu1">Grafik Pelanggan</a></li>
							<!--li><a data-toggle="tab" href="#menu2">Tab Menu 3</a></li> -->
						</ul>
						<div class="tab-content tab-custom-st">
							<div id="home" class="tab-pane fade in active">
								<div class="tab-ctn">
									<div class="table-responsive">
										<table class="table table-hover" id="data-table-basic">
											<thead class="bg-success">
												<tr>
													<th>#</th>
													<th>Kode Pelanggan</th>
													<th>Nama Pelanggan</th>
													<th>Jenis Kelamin</th>
													<th>Alamat</th>
													<th>Foto</th>
													<th class="text-center"><i class="fa fa-cogs"></i></th>
												</tr>
											</thead>
											<tbody>
												<?php $i = 1;
												foreach ($show as $tampil) : ?>
													<tr>
														<td><?= $i++; ?></td>
														<td><?= $tampil['kode_pel'] ?></td>
														<td><?= $tampil['nama_pel'] ?></td>
														<td><?= $tampil['jk'] ?></td>
														<td><?= $tampil['alamat'] ?></td>
														<td><img class="img-rounded img-responsive" height="100px" width="110px" src="<?= base_url('folder_file/foto/pelanggan/') . $tampil['foto'] ?>" alt="foto pelanggan"></td>
														<td class="text-center">
															<div class="btn-group" role="group" aria-label="...">
																<a href="" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
																<a href="<?= base_url('pelanggan/edit/') . $tampil['id'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
																<a onclick="return confirm('Yakin akan menghapus data <?= $tampil['nama_pel']  ?> ?')" href="<?= base_url('pelanggan/delete/') . $tampil['id'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
															</div>
														</td>
													</tr>
												<?php endforeach; ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div id="menu1" class="tab-pane fade">
								<div class="tab-ctn">
									<p>Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nulla sit amet est. Praesent ac the massa at ligula laoreet iaculis. Vivamus aliquet elit ac nisl. Nulla porta dolor. Cras dapibus. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.</p>
									<p class="tab-mg-b-0">In hac habitasse platea dictumst. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Nam eget dui. In ac felis quis tortor malesuadan of pretium. Phasellus consectetuer vestibulum elit. Duis lobortis massa imperdiet quam. Pellentesque commodo eros a enim. Vestibulum ante ipsum primis in faucibus orci the luctus et ultrices posuere cubilia Curae; In ac dui quis mi consectetuer lacinia. Phasellus a est. Pellentesque commodo eros a enim. Cras ultricies mi eu turpis hendrerit of fringilla. Donec mollis hendrerit risus. Vestibulum turpis sem, aliquet eget, lobortis pellentesque, rutrum eu, nisl. Praesent egestas neque eu enim. In hac habitasse plat.</p>
								</div>
							</div>
							<div id="menu2" class="tab-pane fade">
								<div class="tab-ctn">
									<p>Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nulla sit amet est. Praesent ac the massa at ligula laoreet iaculis. Vivamus aliquet elit ac nisl. Nulla porta dolor. Cras dapibus. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.</p>
									<p class="tab-mg-b-0">In hac habitasse platea dictumst. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Nam eget dui. In ac felis quis tortor malesuadan of pretium. Phasellus consectetuer vestibulum elit. Duis lobortis massa imperdiet quam. Pellentesque commodo eros a enim. Vestibulum ante ipsum primis in faucibus orci the luctus et ultrices posuere cubilia Curae; In ac dui quis mi consectetuer lacinia. Phasellus a est. Pellentesque commodo eros a enim. Cras ultricies mi eu turpis hendrerit of fringilla. Donec mollis hendrerit risus. Vestibulum turpis sem, aliquet eget, lobortis pellentesque, rutrum eu, nisl. Praesent egestas neque eu enim. In hac habitasse plat.</p>
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