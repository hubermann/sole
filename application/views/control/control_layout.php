<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?php echo base_url('public_folder/css/normalize.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('public_folder/css/bootstrap.min.css'); ?>">
        
        <link rel="stylesheet" href="<?php echo base_url('public_folder/css/font-awesome.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('public_folder/css/bootstrap-datepicker3.css'); ?>">

        <script src="<?php echo base_url('public_folder/js/vendor/modernizr-2.6.2.min.js'); ?>"></script>
        <script src="<?php echo base_url("public_folder/js/vendor/jquery-1.11.0.min.js"); ?>"></script>
        <style>
        body {
        padding-top: 20px;
        padding-bottom: 20px;
        }

        .navbar {
        margin-bottom: 20px;
        }
        .error{background-color:#f2dede; color:#a94442; padding: .2em; }
        footer small{color: #ccc; }
        footer {color: #ccc; text-align: center;}
        </style>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    
        <!-- HEADER -->
    <header class="container-fluid">
      <!-- Static navbar -->
      <div class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url('control'); ?>">PipinoBaby.com.ar</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              
        


              <li <?php if($this->uri->segment(2) == "agendados"){echo 'class="active"';} ?>>
              <a href="<?php echo base_url('control/agendados'); ?>">Agendados</a>
              </li>

              <li <?php if($this->uri->segment(2) == "pedidos"){echo 'class="active"';} ?>>
              <a href="<?php echo base_url('control/pedidos'); ?>">Pedidos</a>
              </li>

            
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Articulos <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li <?php if($this->uri->segment(2) == "articulos"){echo 'class="active"';} ?>>
                  <a href="<?php echo base_url('control/articulos'); ?>">Articulos</a>
                  </li>
                  <li <?php if($this->uri->segment(2) == "temporadas"){echo 'class="active"';} ?>>
                  <a href="<?php echo base_url('control/temporadas'); ?>">Temporadas</a>
                  </li>
                  <!--
                  <li class="divider"></li>
                  <li class="dropdown-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li> -->
                </ul>
              </li>

              

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Gastos <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li <?php if($this->uri->segment(2) == "gastos"){echo 'class="active"';} ?>>
              <a href="<?php echo base_url('control/gastos'); ?>">Gastos</a>
              </li>
                  <li <?php if($this->uri->segment(2) == "categorias_gastos"){echo 'class="active"';} ?>>
              <a href="<?php echo base_url('control/categorias_gastos'); ?>">Categorias de Gastos</a>
              </li>
                  <!--
                  <li class="divider"></li>
                  <li class="dropdown-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li> -->
                </ul>
              </li>

              <!--
              <li>
              <a href="<?php echo base_url('control/'); ?>">Link</a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">titulo drop <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="<?php echo base_url(); ?>">Opciones uno</a></li>
                  <li><a href="<?php echo base_url(); ?>">Opciones dos</a></li>

                </ul>

              </li>
              -->
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="<?php echo base_url('control/logout'); ?>">Cerrar sesion</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>

    </header>

<!-- BODY -->
<div class="container-fluid">

  <div class="row">
    <div id="avisos" class="col-lg-12">

    <?php 

      if($this->session->flashdata('success')): 
      echo '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>
      '.$this->session->flashdata('success').'</div>';
      endif;

      if($this->session->flashdata('warning')): 
      echo '<div class="alert alert-warning"  role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>
      '.$this->session->flashdata('warning').'</div>';
      endif;

      if($this->session->flashdata('error')): 
      echo '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>
      '.$this->session->flashdata('error').'</div>';
      endif;

    ?>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
    <!-- menu column -->
    <?php $this->load->view($menu); ?>
    </div>
    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">

    <?php $this->load->view($content); ?>
    </div>
  </div>
</div>



        <!-- FOOTER -->
        <div class="container-fluid">
        <hr>
    <footer>
  
      <div class="row">
        <div class="col-md-3"><p>PipinoBaby.com.ar</p></div>
        <div class="col-md-3"></div>
        <div class="col-md-3"></div>
        <div class="col-md-3"><p><small>2015 | Desarrollado por Hubermann.com</small></p></div>
      </div>

    </footer>
</div>
    <!-- END BODY -->
        

        <script src="<?php echo base_url('public_folder/js/plugins.js'); ?>"></script>
        <script src="<?php echo base_url('public_folder/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('public_folder/js/main.js'); ?>"></script>
        <script src="<?php echo base_url('public_folder/js/bootstrap-datepicker.js'); ?>"></script>
        
        <script>
        window.setTimeout(function() { $(".alert-success").alert('close'); }, 6000);
        window.setTimeout(function() { $(".alert-warning").alert('close'); }, 6000);
        window.setTimeout(function() { $(".alert-danger").alert('close'); }, 6000);
        </script>

<script>
  $('#fechacontainer input').datepicker({
    format: "mm-dd-yyyy",
    language: "es",
  });

  if($('#fecha').val() === ""){
    
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();

    if(dd<10) {
        dd='0'+dd
    } 

    if(mm<10) {
        mm='0'+mm
    } 

    today = mm+'-'+dd+'-'+yyyy;


    $('#fecha').val(today);

  }
</script>

    </body>
</html>