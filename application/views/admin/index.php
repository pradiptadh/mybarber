<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
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
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="<?=base_url('')?>/admin/css/skins/_all-skins.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
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
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <!-- <span class="logo-mini"><b>A</b>LT</span> -->
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Barber</b></span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php if ($avatar == NULL){ ?>
                  <img src="<?=base_url('dist/img/avatar04.png')?>" class="user-image" alt="User Image">
                <?php }else{ ?>
                  <img src="<?=base_url('dist/img/'.$avatar)?>" class="user-image" alt="User Image">
                <?php } ?>
                <span class="hidden-xs"><?=$this->session->userdata('nama');?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">                
                  <?php if ($avatar == NULL){ ?>
                    <img src="<?=base_url('dist/img/avatar04.png')?>" class="user-image" alt="User Image">
                  <?php }else{ ?>
                    <img src="<?=base_url('dist/img/'.$avatar)?>" class="user-image" alt="User Image">
                  <?php } ?>

                  <p>
                    <?=$this->session->userdata('nama');?>
                    <!-- <small>Member since Nov. 2012</small> -->
                  </p>
                </li>
                <!-- Menu Body -->
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?=site_url('dashboard/profile')?>" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?=site_url('logout')?>" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">                
            <?php if ($avatar == NULL){ ?>
              <img src="<?=base_url('dist/img/avatar04.png')?>" class="img-circle" alt="User Image">
            <?php }else{ ?>
              <img src="<?=base_url('dist/img/'.$avatar)?>" class="img-circle" alt="User Image">
            <?php } ?>
          </div>
          <div class="pull-left info">
            <p> <?=$this->session->userdata('nama');?></p>
          </div>
        </div>
        <!-- search form -->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          <li>
            <a href="<?= site_url('dashboard') ?>">
              <i class="fa fa-th"></i> <span>Beranda</span>
              <span class="pull-right-container">
                <!-- <small class="label pull-right bg-green">new</small> -->
              </span>
            </a>
          </li>
          <?php if ($this->session->userdata('level')=='admin'){ ?>
            <li>
              <a href="<?=site_url('dashboard/user');?>">
                <i class="fa fa-th"></i> <span>Data Pengguna</span>
                <span class="pull-right-container">
                  <!-- <small class="label pull-right bg-green">new</small> -->
                </span>
              </a>
            </li>          
            <li>
              <a href="<?=site_url('dashboard/data_booking');?>">
                <i class="fa fa-th"></i> <span>Data Booking</span>
                <span class="pull-right-container">
                  <!-- <small class="label pull-right bg-green">new</small> -->
                </span>
              </a>
            </li>
          <?php }else{ ?>
            <li>
              <a href="<?=site_url('booking');?>">
                <i class="fa fa-th"></i> <span>Booking</span>
                <span class="pull-right-container">
                  <!-- <small class="label pull-right bg-green">new</small> -->
                </span>
              </a>
            </li>
            <li>
              <a href="<?=site_url('dashboard/data_booking_user');?>">
                <i class="fa fa-th"></i> <span>Semua Pesanan</span>
                <span class="pull-right-container">
                  <!-- <small class="label pull-right bg-green">new</small> -->
                </span>
              </a>
            </li>
          <?php }?>
          <li>
            <a href="<?=site_url('logout');?>">
              <i class="fa fa-th"></i> <span>Keluar</span>
              <span class="pull-right-container">
                <!-- <small class="label pull-right bg-green">new</small> -->
              </span>
            </a>
          </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Dashboard
          <small>Control panel</small>
        </h1>
        
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Small boxes (Stat box) -->
        
        <!-- Main row -->
        <div class="row">
          <?php  $this->load->view($page_view);?>
        </div>
        <!-- /.row (main row) -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2019 <a href="https://#">MyBarber</a>.</strong> All rights
      reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="<?=base_url('/')?>admin/js/jquery.min.js"></script>
  <script src="<?=base_url('/')?>admin/js/bootstrap.min.js"></script>
  <script src="<?=base_url('/')?>admin/js/jquery.toast.js"></script>
  <!-- AdminLTE App -->
  <script src="<?=base_url('/')?>admin/js/bootstrap-timepicker.min.js"></script>
  <script src="<?=base_url('/')?>admin/js/adminlte.min.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <!-- AdminLTE for demo purposes -->
  <script src="<?=base_url('/')?>admin/js/demo.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('.timepicker1').timepicker({
        showInputs: false,
        defaultTime: 'value',
        minuteStep: 1,
        disableFocus: true,
        template: 'dropdown',
        showMeridian:false
      })
      $('.timepicker2').timepicker({
        showInputs: false,
        defaultTime: 'value',
        minuteStep: 1,
        disableFocus: true,
        template: 'dropdown',
        showMeridian:false
      });
      $('#table_user').DataTable();
    });
    function edituser(id) {
      $.ajax({
        url: '<?=site_url('dashboard/edit_user')?>',
        type: 'post',
        data: {idnya: id},
        success:function (response) {
          $("#modalnya").html(response);
          $('#detail'+id).modal('show');
        }
      })
    }
    function editbooking(id) {
      $.ajax({
        url: '<?=site_url('dashboard/edit_booking')?>',
        type: 'post',
        data: {idnya: id},
        success:function (response) {
          $("#modalnya").html(response);
          $('#detail'+id).modal('show');
        }
      })
    }
    function deleteuser(id) {
      $.ajax({
        url: '<?=site_url('dashboard/delete_user')?>',
        type: 'post',
        data: {idnya: id},
        success:function (response) {
        $("#modalnya").html(response);
        $('#detail'+id);
        window.history.go(0);
        }
      })
    }
    function deletebooking(id) {
      $.ajax({
        url: '<?=site_url('dashboard/delete_booking')?>',
        type: 'post',
        data: {idnya: id},
        success:function (response) {
          $("#modalnya").html(response);
          $('#detail'+id).modal('show');
          window.history.go(0);
        }
      })
    }
    function batalkan(id) {
      $.ajax({
        url: '<?=site_url('dashboard/batal_book')?>',
        type: 'post',
        data: {idnya: id},
        success:function (response) {
          $("#modalnya").html(response);
          $('#detail'+id).modal('show');
          window.history.go(0);
        }
      })
    }
    function selesai(id) {
      $.ajax({
        url: '<?=site_url('dashboard/selesai_book')?>',
        type: 'post',
        data: {idnya: id},
        success:function (response) {
          // $("#modalnya").html(response);
          // $('#detail'+id).modal('show');
        }
      })
    }
    function print(id) {
      $.ajax({
        url: '<?=site_url('dashboard/cek_print')?>',
        type: 'post',
        data: {idnya: id},
        dataType: 'json',
        success:function (response) {
          if (response.message == 'berhasil') {
            window.open('<?=site_url('dashboard/printdata/')?>/'+id+'','_blank');
          }else{
            alert('Gagal');
          }
        }
      })
    }
    function tidakjam() {
      $("#jamorang").attr('style', 'display:none;');
      $(".timepicker2").val('');
    }
    function pilihjam() {
      $("#jamorang").attr('style', 'display:block;');
    }
  </script>
  <?php if ($this->session->flashdata('gagal')) { ?>
    <script type="text/javascript" charset="utf-8" >
      $.toast({
        heading: 'Danger',
        text: "<?=$this->session->flashdata('gagal')?>",
        position: 'top-right',
        stack: false,
        hideAfter: 5000, 
        icon: 'error'
      });
    </script>
  <?php }elseif($this->session->flashdata('berhasil')){ ?>
    <script type="text/javascript" charset="utf-8" >
      $.toast({
        heading: 'Success',
        text: "<?=$this->session->flashdata('berhasil')?>",
        position: 'top-right',
        stack: false,
        hideAfter: 5000, 
        icon: 'success'
      });
    </script>
  <?php } ?>
</body>
</html>
