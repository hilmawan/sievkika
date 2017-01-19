<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Sistem Evaluasi Kinerja Karyawan</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <style type="text/css" media="screen">
      	.atas {
      		background: #FFD700 !important;
      	}
      </style>
	  <div id="login-page">
	  	<div class="container">
	  	    
		      <form class="form-login" method="post" action="<?php echo base_url();?>login/masuk">
		        <h2 class="form-login-heading atas">
		        	<i class="fa fa-user fa-5x"></i>
		        	<br>SIGN IN NOW
		        </h2>
		        <div class="login-wrap">
		            <input type="text" class="form-control" name="user_name" placeholder="User ID" autofocus>
		            <br>
		            <input type="password" name="user_password" class="form-control" placeholder="Password">
		            <br>
		            <button class="btn btn-warning btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
		            <hr>
		            
		            <div class="login-social-link centered">
		            	<p>SISTEM EVALUASI KINERJA KARYAWAN <br> - <?php echo date('Y'); ?> -</p>
		            </div>
		
		        </div>
		
		      </form>	 
		      <?php
				if($this->session->flashdata('pesan') != ''){
					echo '
					<div class="alert alert-warning alert-dismissable">
						  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						  <strong>'.$this->session->flashdata('pesan').'
						</div>
					';
				}
				?> 	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("<?php echo base_url(); ?>assets/img/back.jpg", {speed: 500});
    </script>


  </body>
</html>
