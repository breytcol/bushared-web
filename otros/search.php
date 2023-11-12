<!DOCTYPE html>
<html lang="es" class="" style="height: auto;">
<?php require_once('config.php'); ?>
 <?php require_once('inc/header.php') ?>
  <body class="hold-transition layout-top-nav" >
    <div class="content-header">
     <?php require_once('inc/topBarNav.php') ?>
              
     <?php $page = isset($_GET['page']) ? $_GET['page'] : 'portal';  ?>
      <!-- Content Wrapper. Contains page content -->
      
        <!-- Content Header (Page header) -->
        <div class="content-header"></div>
        <!-- Main content -->
		<body> 
         <center>
			<span class=" label label-success">Resultados</span>
		</center>
		<head>
        
        <link href="css/bootstrap.css" rel="stylesheet">
        </head>
		<div class="container"> 
	        <br>
                <div class="row">
                    <form id="js-search" action="search.php" class="col-xs-12 col-md-8 col-md-offset-2" role="search">
                <div class="form-group">
                    <input id="js-input" type="text" size="30" class="form-control" placeholder="¿Buscar en la Web?" name="js">
                    <input type="hidden" name="page" value="1">
                </div>
				<center>
                <button class="btn btn-success" type="submit">
                    <span>Buscar</span>
                </button>
				</center>
                </form>
                </div>
		    </br>
        </div>
		<div id="loading">
			
        </div>
		<div id="js-container" id="loading" class="container theme-showcase">
            <div class="row js-container-form">
                
                
                <div id="js-items-found" class="col-xs-12 col-md-8 col-md-offset-2"></div>
                <div class="col-xs-12 col-md-8 col-md-offset-2">
                    <ul class="pagination"></ul>
                    <div id="js-current-page" class="pull-right"></div>
                </div>
				<div id="js-alert-info" class="col-xs-12 col-md-8 col-md-offset-2 js-display-none">
                    <div class="alert-info"></div>
                </div>
            </div>
        </div>
		<script src="js/jquery.js"></script>
        <script src="js/search.js"></script>
        </body>
        <div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Confirmar</h5>
      </div>
      <div class="modal-body">
        <div id="delete_content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='confirm' onclick="">Continuar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Guardar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal_right" role='dialog'>
    <div class="modal-dialog modal-full-height  modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="fa fa-arrow-right"></span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="viewer_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
              <button type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>
              <img src="" alt="">
      </div>
    </div>
  </div>
      </div>
        <script src="js/jquery.js"></script>
        <script src="js/search.js"></script>
		<center><p><strong><b><span class=" label label-success">Una nueva forma</span></b></strong><p></center>
      <!-- /.content-wrapper -->
      <?php require_once('inc/footer.php') ?>
	 </div>
  </body>
</html>
