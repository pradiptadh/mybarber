<div class="mainbg">
<div style="background: rgba(0,0,0,.5);">
<div class="container">
	<div class="col-md-12" style="margin:5.23% auto; height:600px;">
		
		<center>
			<h1><label style="font-family: 'Avenir Next';font-size: 2em;color:#f9f9f9; margin-top:80px;">MyBarber</label></h1>
			<p style="width:50%;color:#f5f5f5;font-size: 1.1em;opacity:0.8;font-weight:500 !important;line-height: 24px;font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;">Cukur rambut mudah nan bergaya? <br>Ayo gabung sekarang juga!</p>
			<!-- <label class="btm"></label> -->

		<div class="" style="margin:2% auto;width:45%;">
			<div class="panel-body" style="padding: 0;">
				<form class="form" method="post" action="<?= site_url('con_barber/actregis')?>">
				<div class="panel panel-default">
					<div class="form-group">
						<input type="text" name="nama" placeholder="Nama lengkap" autocomplete="off" style="border: none;" class="form-control mform">
					</div>
					<div class="form-group">
						<input type="number" name="umur" placeholder="Umur Anda" autocomplete="off" style="border: none;" class="form-control mform">
					</div>
					<div class="form-group">
						<input type="text" name="username" placeholder="Nama pengguna" autocomplete="off" style="border: none;" class="form-control mform">
					</div>
					<div class="form-group">
						<input type="password" name="password" placeholder="Kata sandi" autocomplete="off" style="border: none;" class="form-control mform">
					</div>
				</div>
				<div class="form-group">
					<button class="btn btn-block btn-danger mybtn mybtnDaftar">Daftar Sekarang!</button>
				</div>
				</form>
			</div>
			<p style="width:50%;color:#f8f8f8;opacity:0.7;font-size: 1.1em;font-weight:500 !important;line-height: 24px;font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;margin-top:10px;">Atau sudah punya akun ?</p>
			<a href="<?php echo site_url('con_barber/sign_in'); ?>"><button class="btn btn-block btn-primary mybtn">Masuk</button></a>

		</div>

	</div>

</div>
</div>
</div>