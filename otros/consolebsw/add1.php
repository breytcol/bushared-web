<?php
session_start();
include './lib/class_mysql.php';
include './lib/config.php';
header('Content-Type: text/html; charset=UTF-8');

if($_SESSION['tipo']!="admin"){
    session_start(); 
    session_unset();
    session_destroy();
    header("Location: ./404.php"); 
}
?>
<html lang="es">
<!DOCTYPE html>
<link rel="shortcut icon" href="bs.ico">
<html>
    <head>
        <title>BuShared Web - Agregar</title>
        <?php include "./inc/links.php"; ?>        
    </head>
    <body>   
        <?php include "./inc/navbar.php"; ?>
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="page-header">
                <h1 class="animated lightSpeedIn">BuShared <small>Web</small></h1>
                <br>
                <p class="pull-right text-primary">
                  <strong>
                  <?php include "./inc/timezone.php"; ?>
                 </strong>
               </p>
              </div>
            </div>
          </div>
        </div>
		<center>
			<span class="label label-danger">Agregar Páginas Web A BuShared</span>
		</center>
		<html lang="es">
    <div class="container">
          <div class="row">
            <div class="col-sm-3">
                <img src="./img/Edit.png" alt="Image" class="img-responsive animated tada">
            </div>
            <div class="col-sm-9">
                <a href="./adminbushared.php?view=adminbushared" class="btn btn-primary btn-sm pull-right"><i class="fa fa-reply"></i>&nbsp;&nbsp;Volver Administrar Páginas Web</a>
            </div>
          </div>
        </div>

    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/script.js"></script>
    </head>
	<center>
    <div class="container">
           <div class="col-sm-12">
                
                <form action="link.php" method="POST" class="form_contact">
                		
                        <div class="user_info">
                          <label  class="col-sm-2 control-label">Página Web</label>
                          <div class="col-sm-10">
                            <textarea class="form-control" rows="1"  name="title" required=""></textarea>
                          </div>
                        </div>
                    
                        <div class="user_info">
                          <label  class="col-sm-2 control-label">Link url</label>
                          <div class="col-sm-10">
                            <textarea class="form-control" rows="1"  name="link" required=""></textarea>
                          </div>
                        </div>

                        <div class="user_info">
                          <label  class="col-sm-2 control-label">Descripción</label>
                          <div class="col-sm-10">
                            <textarea class="form-control" rows="3"  name="description" required=""></textarea>
                          </div>
                        </div>

                        <div class="user_info">
                          <label  class="col-sm-2 control-label">Palabras Claves</label>
                          <div class="col-sm-10">
                            <textarea class="form-control" rows="1"  name="claves" required=""></textarea>
                          </div>
                        </div>
                    
                    <br><br>
                    
                        <div class="user_info">
                          <div class="col-sm-offset-2 col-sm-10 text-center">
                              <button type="submit" class="btn btn-info">Guardar Página Web</button>
                          </div>
                        </div>
				  </div><!--col-md-12-->
          </div><br><br><!--container-->
        </form>
	</center>

      
      <?php include './inc/footer.php'; ?>
    </body>
</html>
