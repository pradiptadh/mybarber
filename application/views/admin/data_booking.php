<div class="content">
	<div class="row">
		
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Data Pemesanan</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body table-responsive">
					<table id="table_user" class="table table-bordered table-hover dataTable" role="grid">
						<thead>
							<tr>
								<td>No</td>
								<td>Nama Pemesan</td>
								<td>Jam Booking</td>
								<td>Status</td>
								<td>Tanggal Booking</td>
								<td>Waktu Pemesanan</td>
								<td>Aksi</td>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1; foreach ($history as $datanya): ?>
								<tr>
									<td><?=$no++?></td>
									<td><?=$datanya->nama?></td>
									<td><?=$datanya->booking?></td>
									<td><?=$datanya->status?></td>
									<td><?=$datanya->tgl?></td>
									<td><?=$datanya->created?></td>
									<td><a onclick="editbooking('<?=$datanya->id_booking?>')" class="btn btn-info">Edit</a><a onclick="deletebooking('<?=$datanya->id_booking?>')" class="btn btn-danger">Hapus</a></td>
								</tr>
							<?php endforeach ?>
						</tbody>
						
					</table>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
	</div></div>
<div id="modalnya"></div>