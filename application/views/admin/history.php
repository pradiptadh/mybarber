<div class="content">
	<div class="row">
		<?php foreach ($history as $datanya): ?>
			
		<div class="col-md-4">
			<div class="box box-solid">
				<div class="box-header with-border">
					<i class="fa fa-text-width"></i>
					<h3 class="box-title">Antrian yang Baru Anda Pesan</h3>
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
				<?php if ($datanya->status == 'pending' OR $datanya->status == 'booking' ): ?>
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