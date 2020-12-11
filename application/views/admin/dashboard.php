<div class="content">
<style type="text/css">
	.mFoot div{
}
.mFoot div.sosmed{
	padding: 0 !important;
}
.mFoot div.sosmed a:hover i{
	-webkit-transition: all .25s;
	-moz-transition: all .25s;
	-ms-transition: all .25s;
	-o-transition: all .25s;
	transition: all .25s;
	border-color: transparent;
}
.mFoot div.sosmed a.fac:hover i{
	background: #335589;
	color: #f9f9f9;
}
.mFoot div.sosmed a.twit:hover i{
	background: #52aac9;
	color: #f9f9f9;
}
.mFoot div.sosmed a.gplus:hover i{
	background: #f06464;
	color: #f9f9f9;
}
.mFoot div.sosmed a.fac i{
	color: #335589;
}
.mFoot div.sosmed a.twit i{
	color: #52aac9;
}
.mFoot div.sosmed a.gplus i{
	color: #f06464;
}
.mFoot div.sosmed a i{
	font-weight: 500 !important;
	border:solid 1px #999;
	border-radius: 3px;
	padding: 10px;
	width: 40px;
	margin: 0 0px !important;
	-webkit-transition: all .25s;
	-moz-transition: all .25s;
	-ms-transition: all .25s;
	-o-transition: all .25s;
	transition: all .25s;
}
</style>
	<h1>Selamat Datang, <?=$this->session->userdata('nama');?></h1><hr style="width:500px;margin-left:5px">
	<h3>MyBarber</h3>
	Buka dari jam 08:00 sampai dengan jam 18:00
	<div class="mFoot" style="margin-top: 10px;">
	<div class="col-md-3">
		<div class="container">
					<ul class="" style="list-style:none;padding:0;">
						<li style="margin-bottom: 5px"><i class="fa fa-home"></i> : Gas Alam No.B46 RT04/007<br>  &nbsp &nbsp &nbsp&nbsp Curug, Cimanggis, Kota Depok 16453</li>
						<li style="margin-bottom: 5px"><i class="fa fa-phone"></i> : +61 123 456 7890</li>
						<li style="margin-bottom: 5px"><i class="fa fa-envelope-o"></i> :<a href="#"> hellomybarber@gmail.com</a></li>
					</ul>
		</div>
	</div>

	<div class="col-md-4">
		<div class="container">
				<div class="sosmed">
					<ul class="" style="list-style:none;padding:0;">
						<li style="margin-bottom: 5px"><a target="_blank" href="https://facebook.com" class="fac"><i style="text-align:center;" class="fa-facebook fa"></i></a> <b>Facebook</b></li>
						<li style="margin-bottom: 5px"><a target="_blank" href="https://twitter.com" class="twit"><i style="text-align:center;" class="fa-twitter fa"></i></a> <b>Twitter</b></li>
						<li style="margin-bottom: 5px"><a target="_blank" href="https://plus.google.com" class="gplus"><i style="text-align:center;" class="fa-google-plus fa"></i></a> <b>Google</b></li>		
					</ul>
			</div>
		</div>
	</div>
	</div>
</div>
