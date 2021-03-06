<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap.css">	

    <title>Consultar Granja</title>
  </head>
  <body>

     <nav class="navbar navbar-expand-lg navbar-success bg-success">
        <a class="navbar-brand" href="#"> <img src="pl.png" width="30" height="30" class="d-inline-block align-top" alt="">Gestiòn Administrador</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span   class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Blog</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Proyectos
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">software</a>
                <a class="dropdown-item" href="#">Hadware</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">mas información</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="#">Contacto</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Escribe que buscas" aria-label="Search">
      <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Buscar</button>
    </form>
        </div>
      </nav>
      <table   class="table" >
  <thead class="bg-success">
    <tr>
     
      <th scope="col">Id Granja</th>
      <th scope="col">Nombre</th>
      <th scope="col">Terreno</th>
      <th scope="col">Piso Termico</th>
      <th scope="col">Ubicacion</th>
      <th scope="col">Producto Especializado</th>
      <th scope="col">Id Granjero</th>
      </tr>
  </thead>
  <tbody>
  <?php
		include("conexion.php");
    $mysqli=conectar();
			$consulta= "SELECT * FROM  granja";
			if ($resultado = $mysqli->query($consulta)) 
			{
				while ($fila = $resultado->fetch_row()) 
				{					
					echo "<tr>";
					echo "<td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td><td>$fila[3]</td><td>$fila[4]</td><td>$fila[5]</td><td>$fila[6]</td>";	
					echo"<td>";						
				    echo "<a  data-toggle='modal' data-target='#editUsu' data-id_granja ='" .$fila[0] ."' data-nombre='" .$fila[1] ."' data-terreno='" .$fila[2] ."' data-piso_termico='" .$fila[3]."' data-ubicacion='".$fila[4]."' data-prodcuto_especializado='".$fila[5]."' data-id_granjero='".$fila[6]."' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span>Editar</a> ";			
            echo "<a class='btn btn-danger' href='eliminar_granja.php?ID_GRANJA=" .$fila[0] ."'><span class='glyphicon glyphicon-remove'></span>Eliminar</a>";		
            echo "</td>";
					echo "</tr>";
				}
				$resultado->close();
			}
			$mysqli->close();			
			
	

?>
  </tbody>
</table>

<table   class="table" >

<tr>
  
  <th scope="col"><button  data-toggle="modal" data-target="#nuevoUsu" class="btn btn-success" type="submit">nuevo Administrador</button></th>
  <th scope="col"> <a href="Menu_principal.php"><button class="btn btn-success" type="submit">Atras</button></a></th>
 
</tr>

</table>
  <div class="modal" id="nuevoUsu" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        
                        <h4><img src="pl.png" width="30" height="30" class="d-inline-block align-top" alt="">Nueva granja</h4>                       
                    </div>
                    <div class="modal-body">
                       <form action="crear_granja.php" method="GET">                 
                          <div class="form-group">
                            <label for="NOMBRE">NOMBRE:</label>
                            <input class="form-control" id="NOMBRE" name="NOMBRE" type="text" placeholder="NOMBRE"/>
                          </div>
                          <div class="form-group">
                            <label for="APELLIDO">TERRENO:</label>
                            <input class="form-control" id="TERRENO" name="TERRENO" type="number" placeholder="TERRENO"/>
                           </div>
                           <div class="form-group">
                            <label for="DIRECCION">PISO TERMICO:</label>
                            <input class="form-control" id="PISO_TERMICO" name="PISO_TERMICO" type="text" placeholder="PISO_TERMICO"/>
                           </div>
                           <div class="form-group">
                            <label for="TELEFONO">UBICACION:</label>
                            <input class="form-control" id="UBICACION" name="UBICACION" type="text" placeholder="UBICACION"/>
                           </div>
                           <div class="form-group">
                            <label for="EDAD">PRODUCTO ESPECIALIZADO:</label>
                            <input class="form-control" id="PRODUCTO_ESPECIALIZADO" name="PRODUCTO_ESPECIALIZADO" type="text" placeholder="PRODUCTO_ESPECIALIZADO"/>
                          </div>
                          <div class="form-group">
                            <label for="GRANJERO">GRANJERO:</label>
                             <select class="form-control"name="GRANJERO" id="GRANJERO" > 
<?php
        $mysqli=conectar();
      $consulta= "SELECT * FROM  granjero";
      if ($resultado = $mysqli->query($consulta)) 
      {
        while ($fila = $resultado->fetch_row()) 
        {         
          echo "<option value=$fila[0]  >    $fila[1]  </option>";
 
        }
        $resultado->close();
      }
      $mysqli->close();     

?>
     </select>
                           </div>
              <input type="submit" class="btn btn-success" value="registar">
              <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
              </form>
                    </div>
                    
                </div>
            </div>
        </div> 
        <div class="modal" id="editUsu" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                
                        <h4><img src="pl.png" width="30" height="30" class="d-inline-block align-top" alt="">Editar Granja</h4>
                    </div>
                    <div class="modal-body">                      
                       <form action="actualizar_granja.php" method="POST">                       		
                       		        
                       <div class="form-group">
                       			<label for="DOCUMENTO">ID GRANJA:</label>
                       			<input class="form-control" id="id_granja" name="id_granja" type="text"/></input>
                       		</div>
                       		<div class="form-group">
                       			<label for="NOMBRE">NOMBRE:</label>
                       			<input class="form-control" id="nombre" name="nombre" type="text" /></input>
                       		</div>
                       		<div class="form-group">
                       			<label for="APELLIDO">TERRENO:</label>
                       			<input class="form-control" id="terreno" name="terreno" type="text" /></input>
                           </div>
                           <div class="form-group">
                       			<label for="CIUDAD">PISO TERMICO:</label>
                       			<input class="form-control" id="piso_termico" name="piso_termico" type="text" /></input>
                           </div>
                           <div class="form-group">
                       			<label for="CORREO">UBICACION:</label>
                       			<input class="form-control" id="ubicacion" name="ubicacion" type="text" /></input>
                           </div>
                           <div class="form-group">
                       			<label for="TELEFONO">PRODUCTO ESPECIALIZADO:</label>
                       			<input class="form-control" id="prodcuto_especializado" name="prodcuto_especializado" type="text"/>
                       		</div>
                           <div class="form-group">
                       			<label for="TELEFONO">ID GRANJERO:</label>
                       			<input class="form-control" id="id_granjero" name="id_granjero" type="text"/>
                       		</div>

                  <input type="submit" class="btn btn-success">	
                  <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>						
                       </form>
                    </div>
                    
                </div>
            </div>
        </div> 



	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>		
	<script>			 
		  $('#editUsu').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var recipient1 = button.data('id_granja')
		  var recipient2 = button.data('nombre')
		  var recipient3 = button.data('terreno')
      var recipient5 = button.data('piso_termico')
      var recipient6 = button.data('ubicacion')
      var recipient7 = button.data('prodcuto_especializado')
      var recipient8 = button.data('id_granjero')
		   // Extract info from data-* attributes
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		 
		  var modal = $(this)		 
		  modal.find('.modal-body #id_granja').val(recipient1)
		  modal.find('.modal-body #nombre').val(recipient2)
		  modal.find('.modal-body #terreno').val(recipient3)
      modal.find('.modal-body #piso_termico').val(recipient5)
      modal.find('.modal-body #ubicacion').val(recipient6)
      modal.find('.modal-body #prodcuto_especializado').val(recipient7)
      modal.find('.modal-body #id_granjero').val(recipient8)
		});
		
	</script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
