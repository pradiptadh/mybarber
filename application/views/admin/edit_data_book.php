	<div class="modal fade" id="detail<?=$this->input->post('idnya')?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Edit Data</h4>
					</div>
					<form action="<?= site_url('dashboard/actedit_booking') ?>" method="post">
						<div class="modal-body">

							<div class="form-group">
								<label>Jam Booking:</label>

								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-clock-o"></i>
									</div>
									<input type="time" name="jam_booking" value="<?=$book->jam_booking?>" class="form-control">
									<input type="hidden" name="idnya" value="<?=$this->input->post('idnya')?>" class="form-control">
								</div>
								<!-- /.input group -->
							</div>
							<!-- /.form group -->

							<div class="form-group">
								<label>Status</label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-check"></i>
									</div>
									<select class="form-control" value="<?=$book->status?>" name="status">
										<option>Selesai</option>
										<option>Booking</option>
										<option>Pending</option>
										<option>Proses</option>
										<option>Batal</option>
									</select>
								</div>
								<!-- /.input group -->
							</div>

							<div class="form-group">
								<label>Tanggal Booking</label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="date" name="tanggal_booking" value="<?=$book->tanggal_booking?>" class="form-control" >
								</div>
								<!-- /.input group -->
							</div>

							<div class="form-group">
								<label>Waktu Pemesanan</label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" name="created_at" value="<?=$book->created_at?>" class="form-control" >
								</div>
								<!-- /.input group -->
							</div>
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