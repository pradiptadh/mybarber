<div class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Data User</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body table-responsive">
					<table id="table_user" class="table table-bordered table-hover dataTable" role="grid">
						<thead>
							<tr>
								<td>No</td>
								<td>Nama</td>
								<td>Username</td>
								<td>Alamat</td>
								<td>Umur</td>
								<td>No Handphone</td>
								<td>Aksi</td>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1; foreach ($user as $key): ?>
								<tr>
									<td><?=$no++?></td>
									<td><?=$key->nama?></td>
									<td><?=$key->username?></td>
									<td><?=$key->alamat?></td>
									<td><?=$key->umur?></td>
									<td><?=$key->noHp?></td>
									<td><a onclick="edituser('<?=$key->id_user?>')" class="btn btn-info">Edit</a><a onclick="deleteuser('<?=$key->id_user?>')" class="btn btn-danger">Hapus</a></td>
								</tr>
							<?php endforeach ?>
						</tbody>
						
					</table>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
	</div>
</div>
<div id="modalnya"></div>