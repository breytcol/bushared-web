<?php
    if(isset($_POST['nombre_login']) && isset($_POST['contrasena_login'])){
        include "./process/login.php";
    }
?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> 
            </button>
            <a class="navbar-brand" href="index.php"><i class="fa fa-search"></i>&nbsp;&nbsp;BuShared</a>
        </div>
        
    </div>
</nav>

