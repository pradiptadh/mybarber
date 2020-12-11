<div class="content">
	<div class="row">
		<form action="<?= site_url('dashboard/booking_lain') ?>" method="post">	
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

					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary pull-right">Kirim</button>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
	</form>
</div>
</div>