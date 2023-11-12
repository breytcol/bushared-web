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
<!DOCTYPE html>
<link rel="shortcut icon" href="bs.ico">
<html>
    <head>
        <title>BuShared Web</title>
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
			<span class="label label-danger">Agregar Páginas Web A BuShared Web</span>
			
		</center>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="csss/estilos.css">
    <link rel="stylesheet" href="csss/font-awesome.css">

    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/script.js"></script>
     </head>
		 <link rel="stylesheet" href="csss/estilos.css">
    <link rel="stylesheet" href="csss/font-awesome.css">
<?php

    $usuario = "root"; //en ste caso root por ser localhost
    $password = "VGpcpGD6i74r83cd";  //contraseña por si tiene algun servicio de hosting 
    $servidor = "localhost"; //localhost por lo del xampp
    $basededatos ="portal"; //nombre de la base de datos


//por si hay errors de conexion un mensaje "Error con el servidor de la Base de datos".
$conexion = mysqli_connect  ($servidor,$usuario,"VGpcpGD6i74r83cd") or die ("Error con el servidor de la Base de datos"); 


//por si hay errors de conexion un mensaje "Error al conectarse a la Base de datos".
$db = mysqli_select_db($conexion, $basededatos) or die ("Error conexion al conectarse a la Base de datos");


        //recuperar las variables
	
	$title=$_POST['title']; //name="title"
    $link=$_POST['link']; //name="link"
    $description=$_POST['description']; //name="description"
	$claves=$_POST['claves']; //name="claves"

    //sentencia sql
    $sql="INSERT INTO ok VALUES ('$id','$title','$link','$description','$claves')"; //manda a traer los valores de '$id','$title','$link','$description','$claves'
    
    //ejecutamos la centencia de sql
    $ejecutar=mysqli_query($conexion, $sql);


    //verificacion de la ejecucioon
    if(!$ejecutar){
        echo"Hay algun error"; //si algo sale mal mandanos este mensaje
    }else{
        echo"<center><h3><button>Gracias, hemos alojado la página web correctamente.</button></h3></center>	<h2><center><br><a href='add1.php'><button>volver</button></a></center></h2>"; //si todo sale bien mandanos este mensaje
    }
     
?>﻿

<body>

      <?php include './inc/footer.php'; ?>
    </body>
</html>
