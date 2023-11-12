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
<link rel="shortcut icon" href="bs.ico">
<html lang="es">
<!DOCTYPE html>
<html>
    <head>
        <title>BuShared</title>
        <?php include "./inc/links.php"; ?>        
    </head>
    <body>   
        <?php include "./inc/navbar.php"; ?>
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="page-header">
                <h1 class="animated lightSpeedIn">BuShared <small>Web</small>
				</h1>
				<span class="label label-danger">Dj Bre Edit</span>
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
			<span class="label label-danger">BuShared Administrador</span>
		</center>
		<center><br><a href='../home'><button>Regresar a Multimedia</button></a></center>
        <?php
            $WhiteList=["adminbushared","adminbusharededit","users","admin","config"];
            if(isset($_GET['view']) && in_array($_GET['view'], $WhiteList) && is_file("./admin/".$_GET['view']."-view.php")){
                include "./admin/".$_GET['view']."-view.php";
            }else{
                echo '<h2 class="text-center">Hola administrador; inicia sesion para continuar.</h2>';
            }
        ?>

        <script>
        $(document).ready(function (){

            $("#input_user").keyup(function(){
                $.ajax({
                    url:"./process/val_admin.php?id="+$(this).val(),
                    success:function(data){
                        $("#com_form").html(data);
                    }
                });
            });


            $("#input_user2").keyup(function(){
                $.ajax({
                    url:"./process/val_admin.php?id="+$(this).val(),
                    success:function(data){
                        $("#com_form2").html(data);
                    }
                });
            });

        });
        </script>
    </body>
</html>
<?php include './inc/footer.php'; ?>
