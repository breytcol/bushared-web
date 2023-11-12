<?php if( $_SESSION['nombre']!="" && $_SESSION['clave']!="" && $_SESSION['tipo']=="admin"){ ?>
        <div class="container">
          <div class="row">
            <div class="col-sm-2">
              <img src="./img/msj.png" alt="Image" class="img-responsive animated tada">
            </div>
            <div class="col-sm-10">
              <p class="lead text-info">Bienvenido administrador, aquí se alojan todos las páginas web registradas en BuShared, los cuales podrá agregar o eliminar.</p>
            </div>
          </div>
        </div>
            <?php
                if(isset($_POST['id_del'])){
                    $id = MysqlQuery::RequestPost('id_del');
                    if(MysqlQuery::Eliminar("ok", "id='$id'")){
                        echo '
                            <div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <h4 class="text-center">PAGINA ELIMINADA</h4>
                                <p class="text-center">
                                    El alojamiento web, fue eliminado del sistema con exito
                                </p>
                            </div>
                        ';
                    }else{
                        echo '
                            <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <h4 class="text-center">OCURRIÓ UN ERROR</h4>
                                <p class="text-center">
                                    No hemos podido eliminar el ticket
                                </p>
                            </div>
                        '; 
                    }
                }

                /* Todos los tickets*/
                $num_ticket_all=Mysql::consulta("SELECT * FROM ok");
                $num_total_all=mysqli_num_rows($num_ticket_all);

                
            ?>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="./adminbushared.php?view=adminbushared&ticket=all"><i class="fa fa-list"></i>&nbsp;&nbsp;Todas las páginas&nbsp;&nbsp;<span class="badge"><?php echo $num_total_all; ?></span></a></li>
                            <li><a href="./index.php"><i class="fa fa-home"></i>&nbsp;&nbsp;BuShared&nbsp;&nbsp;</a></li>
							<li><a href="./add1.php"><i class="fa fa-list"></i>&nbsp;&nbsp;Agregar más páginas web&nbsp;&nbsp;</a></li>
						</ul>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <?php
                                $mysqli = mysqli_connect(SERVER, USER, PASS, BD);
                                mysqli_set_charset($mysqli, "utf8");

                                $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
                                $regpagina = 50;
                                $inicio = ($pagina > 1) ? (($pagina * $regpagina) - $regpagina) : 0;

                                
                                if(isset($_GET['ok'])){
                                    if($_GET['ok']=="all"){
                                        $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM ok LIMIT $inicio, $regpagina";
                                    }elseif($_GET['ok']=="pending"){
                                        $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM ok WHERE estado_ticket='Pendiente' LIMIT $inicio, $regpagina";
                                    }elseif($_GET['ok']=="process"){
                                        $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM ok WHERE estado_ticket='En proceso' LIMIT $inicio, $regpagina";
                                    }elseif($_GET['ok']=="resolved"){
                                        $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM ok WHERE estado_ticket='Resuelto' LIMIT $inicio, $regpagina";
                                    }else{
                                        $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM ok LIMIT $inicio, $regpagina";
                                    }
                                }else{
                                    $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM ok LIMIT $inicio, $regpagina";
                                }


                                $selticket=mysqli_query($mysqli,$consulta);

                                $totalregistros = mysqli_query($mysqli,"SELECT FOUND_ROWS()");
                                $totalregistros = mysqli_fetch_array($totalregistros, MYSQLI_ASSOC);
                        
                                $numeropaginas = ceil($totalregistros["FOUND_ROWS()"]/$regpagina);

                                if(mysqli_num_rows($selticket)>0):
                            ?>
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Titulo</th>
                                        <th class="text-center">Link</th>
                                        <th class="text-center">Descripcion</th>
                                        <th class="text-center">Busqueda</th>
                                        <th class="text-center">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $ct=$inicio+1;
                                        while ($row=mysqli_fetch_array($selticket, MYSQLI_ASSOC)): 
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $ct; ?></td>
                                        <td class="text-center"><?php echo $row['title']; ?></td>
                                        <td class="text-center"><?php echo $row['link']; ?></td>
                                        <td class="text-center"><?php echo $row['description']; ?></td>
                                        <td class="text-center"><?php echo $row['claves']; ?></td>
                                        <td class="text-center">
                                            <form action="" method="POST" style="display: inline-block;">
                                                <input type="hidden" name="id_del" value="<?php echo $row['id']; ?>">
                                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                        $ct++;
                                        endwhile; 
                                    ?>
                                </tbody>
                            </table>
                            <?php else: ?>
                                <h2 class="text-center">No hay paginas disponibles registradas en el sistema</h2>
                            <?php endif; ?>
                        </div>
                        <?php 
                            if($numeropaginas>=1):
                            if(isset($_GET['ok'])){
                                $ticketselected=$_GET['ok'];
                            }else{
                                $ticketselected="all";
                            }
                        ?>
                        <nav aria-label="Page navigation" class="text-center">
                            <ul class="pagination">
                                <?php if($pagina == 1): ?>
                                    <li class="disabled">
                                        <a aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                <?php else: ?>
                                    <li>
                                        <a href="./adminbushared.php?view=adminbushared&ticket=<?php echo $ticketselected; ?>&pagina=<?php echo $pagina-1; ?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                
                                
                                <?php
                                    for($i=1; $i <= $numeropaginas; $i++ ){
                                        if($pagina == $i){
                                            echo '<li class="active"><a href="./adminbushared.php?view=adminbushared&ticket='.$ticketselected.'&pagina='.$i.'">'.$i.'</a></li>';
                                        }else{
                                            echo '<li><a href="./adminbushared.php?view=adminbushared&ticket='.$ticketselected.'&pagina='.$i.'">'.$i.'</a></li>';
                                        }
                                    }
                                ?>
                                
                                
                                <?php if($pagina == $numeropaginas): ?>
                                    <li class="disabled">
                                        <a aria-label="Previous">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                <?php else: ?>
                                    <li>
                                        <a href="./adminbushared.php?view=adminbushared&ticket=<?php echo $ticketselected; ?>&pagina=<?php echo $pagina+1; ?>" aria-label="Previous">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                        <?php endif; ?>
                    </div>
                </div>
            </div><!--container principal-->
<?php
}else{
?>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <img src="./img/Stop.png" alt="Image" class="img-responsive animated slideInDown"/><br>
                    <img src="./img/SadTux.png" alt="Image" class="img-responsive"/>
                    
                </div>
                <div class="col-sm-7 animated flip">
                    <h1 class="text-danger">Lo sentimos esta página es solamente para administradores de Portal Usuario</h1>
                    <h3 class="text-info text-center">Inicia sesión como administrador para poder acceder</h3>
                </div>
                <div class="col-sm-1">&nbsp;</div>
            </div>
        </div>
<?php
}
?>