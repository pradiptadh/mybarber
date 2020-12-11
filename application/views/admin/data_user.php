	<div class="modal fade" id="detail<?=$this->input->post('idnya')?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Edit Data</h4>
					</div>
					<form action="<?= site_url('dashboard/actedit_user') ?>" method="post">
						<div class="modal-body">
							<div class="form-group">
								<label>Nama User:</label>

								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-user"></i>
									</div>
									<input type="text" name="nama" value="<?=$profile->nama?>" class="form-control">
									<input type="hidden" name="idnya" value="<?=$this->input->post('idnya')?>" class="form-control">
								</div>
								<!-- /.input group -->
							</div>
							<!-- /.form group -->

							<div class="form-group">
								<label>Nomor Handphone:</label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-phone"></i>
									</div>
									<input type="number" name="nohp" value="<?=$profile->noHp?>" class="form-control" >
								</div>
								<!-- /.input group -->
							</div>
							<div class="form-group">
								<label>Alamat:</label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-home"></i>
									</div>
									<textarea name="alamat" class="form-control"><?=$profile->alamat?></textarea>
								</div>
								<!-- /.input group -->
							</div>

							<div class="form-group">
								<label>Umur:</label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-phone"></i>
									</div>
									<input type="text" name="umur" value="<?=$profile->umur?>" class="form-control" >
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