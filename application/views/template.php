<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Sistem Evaluasi KInerja Karyawan</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style-responsive.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/datatable/media/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>Sistem Evaluasi KInerja Karyawan</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                
                <!--  notification end -->
            </div>
            <div class="top-menu">
              <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="<?php echo base_url(); ?>login/keluar">Logout</a></li>
              </ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                  <p class="centered"><a href="profile.html"><img src="<?php echo base_url(); ?>assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
                  <h5 class="centered">Selamat Datang <?php echo $this->session->userdata('id_user'); ?></h5>
                  
                    
                  <li class="mt">
                      <a href="<?php echo base_url(); ?>">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <?php $sess = $this->session->userdata('user_type'); 
                  if ($sess == 1) { ?>
                      <li class="sub-menu">
                          <a href="javascript:;" >
                              <i class="fa fa-desktop"></i>
                              <span>Evaluasi</span>
                          </a>
                          <ul class="sub">
                              <li><a  href="<?php echo base_url(); ?>spi/eval_kary">Hasil Evaluasi</a></li>
                          </ul>
                      </li>
                      <li class="sub-menu">
                          <a href="javascript:;" >
                              <i class="fa fa-list"></i>
                              <span>Parameter</span>
                          </a>
                          <ul class="sub">
                              <li><a  href="<?php echo base_url(); ?>spi/topik">Topik</a></li>
                              <li><a  href="<?php echo base_url(); ?>spi/parameter">Parameter</a></li>
                              <li><a  href="<?php echo base_url(); ?>spi/skala">Skala Likert </a></li>
                          </ul>
                      </li>
                  <?php } elseif ($sess == 4) { ?>
                      <li class="sub-menu">
                          <a href="javascript:;" >
                              <i class="fa fa-cogs"></i>
                              <span>Evaluasi</span>
                          </a>
                          <ul class="sub">
                              <li><a  href="<?php echo base_url(); ?>kadiv/fill_point">Pengisian Angket</a></li>
                              <li><a  href="<?php echo base_url(); ?>spi/eval_kary">Hasil Evaluasi</a></li>
                          </ul>
                      </li>
                  <?php } elseif ($sess == 3) { ?>
                      <li class="sub-menu">
                          <a href="javascript:;" >
                              <i class="fa fa-cogs"></i>
                              <span>Data Master</span>
                          </a>
                          <ul class="sub">
                              <li><a  href="<?php echo base_url(); ?>bau/data_kary">Data Karyawan</a></li>
                              <li><a  href="<?php echo base_url(); ?>bau/data_unit">Data Unit</a></li>
                              <li><a  href="<?php echo base_url(); ?>bau/data_jabatan">Data Jabatan</a></li>
                          </ul>
                      </li>
                      <li class="sub-menu">
                          <a href="javascript:;" >
                              <i class="fa fa-cogs"></i>
                              <span>Evaluasi</span>
                          </a>
                          <ul class="sub">
                              <li><a  href="<?php echo base_url(); ?>spi/eval_kary">Hasil Evaluasi</a></li>
                          </ul>
                      </li>
                      <li class="sub-menu">
                          <a href="javascript:;" >
                              <i class="fa fa-desktop"></i>
                              <span>Parameter</span>
                          </a>
                          <ul class="sub">
                              <li><a  href="<?php echo base_url(); ?>spi/topik">Topik</a></li>
                              <li><a  href="<?php echo base_url(); ?>spi/parameter">Parameter</a></li>
                              <li><a  href="<?php echo base_url(); ?>spi/skala">Skala Likert </a></li>
                          </ul>
                      </li>
                  <?php } elseif ($sess == 2) { ?>
                      <li class="sub-menu">
                          <a href="javascript:;" >
                              <i class="fa fa-cogs"></i>
                              <span>Evaluasi</span>
                          </a>
                          <ul class="sub">
                              <li><a  href="<?php echo base_url(); ?>spi/eval_kary">Hasil Evaluasi</a></li>
                          </ul>
                      </li>
                  <?php } ?>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper">
          <?php $this->load->view($page); ?>
        </section>
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2014 - Alvarez.is
              <a href="blank.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>

    <script src="<?php echo base_url(); ?>assets/datatable/media/js/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/datatable/media/js/dataTables.bootstrap.js" type="text/javascript"></script>

    <script type="text/javascript">
      $(function () {
        $('#example').dataTable({
          "bPaginate": true,
          "bLengthChange": true,
          "bFilter": true,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>
    <!--common script for all pages-->
    <script src="<?php echo base_url(); ?>assets/js/common-scripts.js"></script>

    <!--script for this page-->
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
