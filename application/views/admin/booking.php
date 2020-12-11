<div class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">Pesan Antrian Kamu Sekarang</h3>
				</div>
				<div class="box-body">
					<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-nanti">
						Pesan Antrian
					</button>
					<!-- <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-lain">
						Pesan Untuk Orang Lain
					</button> -->
				</div>
			</div>
		</div>
	</div>

	<h2> Histori Pesanan Saya</h2>
	<div class="content">
	<div class="row">
		<?php foreach ($history as $datanya): ?>
			
		<div class="col-md-4">
			<div class="box box-solid">
				<div class="box-header with-border">
					<i class="fa fa-text-width"></i>

					<h3 class="box-title">Data Pemesanan Anda</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<blockquote><label>Nama Pemesan</label>
					<p><small><?=$datanya->nama?></small></p>
					<label>No Antrian</label>
					<p><small><?=$datanya->nomer?></small></p>
					<label>Jam</label>
					<p><small><?=$datanya->booking?></small></p>
					<label>Status</label>
					<p><small><?=$datanya->status?></small></p>
					<label>Tanggal</label>
					<p><small><?=$datanya->tgl?></small></p>
					<label>Harga</label>
							<?php if ($datanya->umur > 15){ ?>
								<p><small>Rp. 25.000</small></p>
							<?php }else{ ?>
								<p><small>Rp. 20.000</small></p>
							<?php } ?>
					</blockquote>
				<?php if ($datanya->status == 'pending' OR $datanya->status == 'booking'  OR $datanya->status=='proses'): ?>
					<a onclick="batalkan('<?=$datanya->id_booking?>')" class="btn btn-danger">Batalkan Pesanan</a>
					<a onclick="print('<?=$datanya->id_booking?>')" class="btn btn-primary">Cetak Tiket</a>
				<?php elseif ($datanya->status == 'batal'): ?>
					<a onclick="deletebooking('<?=$datanya->id_booking?>')" class="btn btn-danger">Hapus Histori</a>
				<?php endif ?>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<?php endforeach ?>
	</div>
</div>


	<div class="modal fade" id="modal-sekarang">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Pesan Sekarang</h4>
					</div>
					<form action="<?= site_url('dashboard/actbooking') ?>" method="post">
						<div class="modal-body">
							<p>Anda Yakin Ingin Pesan Sekarang ? Jika ada antrian anda harus menunggu 1 jam / orang</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
							<button type="submit" class="btn btn-primary">Ya</button>
						</div>
					</form>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		<!-- /.modal -->
		<div class="modal fade" id="modal-nanti">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Pesan ?</h4>
						</div>
						<form action="<?= site_url('dashboard/booking_jam') ?>" method="post">
							<div class="modal-body">
								<p>Jika ada antrian di jam dan tanggal tersebut maka tidak bisa booking.</p>
								<p>Namun, jika status di jam dan tanggal tersebut 'batal', kamu bisa memilih antrian.</p>
								<p>Selamat menggunakan jasa kami!</p>
								<div class="bootstrap-timepicker">
									<div class="form-group">
										<label>Pilih Waktu:</label>

										<div class="input-group">
											<input type="text" name="jam" class="form-control timepicker1">

											<div class="input-group-addon">
												<i class="fa fa-clock-o"></i>
											</div>
										</div>
										*Estimasi jasa cukur rambut memakan waktu satu jam per-orang. <br>
										*Jam buka dari pukul 08:00 sampai 18:00
										<!-- /.input group -->
									</div>
									<!-- /.form group -->
								</div>

									<div class="form-group">
										<label>Pilih Tanggal:</label>

										<div class="input-group">
											<input type="date" name="tanggal_booking" class="form-control">

											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
										</div>
										<!-- /.input group -->
									</div>

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
								<button type="submit" class="btn btn-primary">Yakin ?</button>
							</div>
						</form>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<div class="modal fade" id="modal-lain">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title">Pesan Untuk Orang Lain</h4>
							</div>
							<form action="<?= site_url('dashboard/booking_lain') ?>" method="post">
								<div class="modal-body">
									<div class="row">
										<div class="col-md-12">
											<div class="box box-danger">
												<div class="box-header">
													<h3 class="box-title">Masukan Data Pemesan</h3>
												</div>
												<div class="box-body">
													<!-- Date dd/mm/yyyy -->
													<div class="form-group">
														<label>Nama Pemesan:</label>

														<div class="input-group">
															<div class="input-group-addon">
																<i class="fa fa-user"></i>
															</div>
															<input type="text" name="nama" class="form-control">
														</div>
														<!-- /.input group -->
													</div>
													<!-- /.form group -->

													<div class="form-group">
														<label>Pilih Jam ?</label>
														<div class="radio">
															<label>
																<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" onclick="pilihjam()">
															Ya</label>
															<label>
																<input type="radio" name="optionsRadios" id="optionsRadios2" value="tidak" checked onclick="tidakjam();">
																Tidak
															</label>
														</div>
													</div>

													<div class="bootstrap-timepicker" id="jamorang" style="display: none;">
														<div class="form-group">
															<label>Pilih Waktu:</label>

															<div class="input-group"><div class="input-group-addon">
																	<i class="fa fa-clock-o"></i>
																</div>
																<input type="text" name="jam" class="form-control timepicker2">

																
															</div>
															<!-- /.input group -->
														</div>
														<!-- /.form group -->
													</div>
													<!-- Date mm/dd/yyyy -->

													<div class="form-group">
														<label>Umur Pemesan:</label>
														<div class="input-group">
															<div class="input-group-addon">
																<i class="fa fa-calendar"></i>
															</div>
															<input type="number" name="umur" class="form-control" >
														</div>
														<!-- /.input group -->
													</div>
													<!-- /.form group -->

													<!-- phone mask -->
													<div class="form-group">
														<label>No Handphone:</label>

														<div class="input-group">
															<div class="input-group-addon">
																<i class="fa fa-phone"></i>
															</div>
															<input type="text" class="form-control" name="nohp">
														</div>
														<!-- /.input group -->
													</div>
													<!-- /.form group -->

													<!-- IP mask -->
													<div class="form-group">
														<label>Alamat</label>

														<div class="input-group">
															<div class="input-group-addon">
																<i class="fa fa-home"></i>
															</div>
															<textarea class="form-control" name="alamat"></textarea>
														</div>
														<!-- /.input group -->
													</div>
													<!-- /.form group -->

												</div>
												<!-- /.box-body -->
											</div>
											<!-- /.box -->
										</div>

									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
									<button type="submit" class="btn btn-primary">Kirim</button>
								</div>
							</form>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
			</div>
