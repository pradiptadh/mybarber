<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AdminLTE 2 | Dashboard</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?=base_url('')?>/admin/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url('')?>/admin/css/jquery.toast.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?=base_url('')?>/admin/css/bootstrap-timepicker.min.css">
	<link rel="stylesheet" href="<?=base_url('')?>/admin/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?=base_url('')?>/admin/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?=base_url('')?>/admin/css/AdminLTE.min.css">
	<!-- Morris chart -->

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini" onload="window.print()">
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
								<label>Tanggal</label>
								<p><small><?=$datanya->tgl?></small></p>
								<label>Harga</label>
								<?php if ($datanya->umur > 15){ ?>
									<p><small>Rp. 25.000</small></p>
								<?php }else{ ?>
									<p><small>Rp. 20.000</small></p>
								<?php } ?>
							</blockquote>
						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>
			<?php endforeach ?>
		</div>
	</div>
	<script src="<?=base_url('/')?>admin/js/jquery.min.js"></script>
	<script src="<?=base_url('/')?>admin/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		(function() {
			var beforePrint = function() {
								// window.close();
							};

							var afterPrint = function() {
								// window.close();
							};

							if (window.matchMedia) {
								var mediaQueryList = window.matchMedia('print');
								mediaQueryList.addListener(function(mql) {
									if (mql.matches) {
										beforePrint();
									} else {
										afterPrint();
									}
								});
							}

							window.onbeforeprint = beforePrint;
							window.onafterprint = afterPrint;
						}());
					</script>
				</body>

				</html>