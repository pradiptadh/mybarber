<div class="content">
	<div class="row">
		<form action="<?= site_url('dashboard/act_profile') ?>" method="post">	
			<div class="col-md-12">
				<div class="callout callout-danger">
					<p>Jika Ingin Merubah Password Maka Isi Kolom Password Lama dan Baru</p>
				</div>
				<div class="box box-danger">
					<div class="box-header">
						<h3 class="box-title">Ubah Data Anda</h3>
					</div>
					<div class="box-body">
						<!-- Date dd/mm/yyyy -->
						<div class="form-group">
							<label>Nama User:</label>

							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-user"></i>
								</div>
								<input type="text" name="nama" value="<?=$profile->nama?>" class="form-control">
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
							<label>Umur:</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-phone"></i>
								</div>
								<input type="text" name="umur" value="<?=$profile->umur?>" class="form-control" >
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
						<!-- /.form group -->

						<!-- phone mask -->
						<div class="form-group">
							<label>Password Lama:</label>

							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-home"></i>
								</div>
								<input type="password" class="form-control" name="password">
							</div>
							<!-- /.input group -->
						</div>
						<!-- /.form group -->

						<!-- IP mask -->
						<div class="form-group">
							<label>Password Baru</label>

							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-home"></i>
								</div>
								<input type="password" class="form-control" name="pass_baru">
							</div>
							<!-- /.input group -->
						</div>
						<!-- /.form group -->

						<a href="<?= site_url('dashboard/index'); ?>"><button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button></a>
						<button type="submit" class="btn btn-primary pull-right">Kirim</button>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
		</form>
	</div>
</div>