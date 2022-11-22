<?php
include("../function/conexion.php");
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'ajax') {
    //include('../function/paginacion.php'); //incluir el archivo de paginación
    include("../function/funciones.php");
    //las variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $per_page = 10; //la cantidad de registros que desea mostrar
    $adjacents = 4; //brecha entre páginas después de varios adyacentes
    $offset = ($page - 1) * $per_page;
    //Cuenta el número total de filas de la tabla*/
    $totalUser = totalUser();
    $msg2 = 2;
    $msg = "Está por eliminar el registro.  ¿Desea eliminarlo?";
    $numrows = 1;
    if ($totalUser) {
        foreach ($totalUser as $row) {
            $numrows = $row['total'];
        }
    }
    $total_pages = ceil($numrows / $per_page);
    $usuarios = usuariosDB($offset, $per_page);
    if ($usuarios) {
        $table = "";
        $modal = "";
        ?>
        <nav aria-label="Page navigation example">
            <div class="clearfix">
                <?php
                $inicios = $offset + 1;
                $finales = $offset + count($usuarios);
                echo '<div class="hint-text">Mostrando ' . $inicios . ' al ' . $finales . ' de ' . $numrows . ' registros</div>';


                include '../function/pagination.php'; //include pagination class
                $pagination = new Pagination($page, $total_pages, $adjacents);
                echo $pagination->paginate();

                ?>
            </div>
        </nav>
        <table name="registros" id="registros" class="table table-striped table-bordered" style="width:100%">
            <thead class="table-dark align-items-center">
            <tr>
                <th>Directivo</th>
                <th>Cargo</th>
                <th>Empresa</th>
                <th>Giro</th>
                <th>Tamaño</th>
                <th>Antiguedad</th>
                <th colspan="2" style="text-align: center">Opciones</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $finales = 0;
            foreach ($usuarios as $row) {
                $row['nombre'] != "" ? $nombre = $row['nombre'] : $nombre = 'Anónimo';
                $row['cargo'] != "" ? $cargo = $row['cargo'] : $cargo = 'N/E';
                $row['genero'] != "" ? $genero = $row['genero'] : $genero = 'N/E';
                $row['apellidos'] != "" ? $apellido = $row['apellidos'] : $apellido = 'N/E';
                $row['lada'] != "" ? $lada = $row['lada'] : $lada = '---';
                $row['telefono'] != "" ? $telefono = $row['telefono'] : $telefono = '--- --- ----';
                $row['correo_empresa'] != "" ? $correo_empresa = $row['correo_empresa'] : $correo_empresa = 'N/E';
                $row['lada_empresa'] != "" ? $lada_empresa = $row['lada_empresa'] : $lada_empresa = '---';
                $row['telefono_empresa'] != "" ? $telefono_empresa = $row['telefono_empresa'] : $telefono_empresa = '--- --- ----';

                $row['codigo_postal'] != "" ? $codigo_postal = $row['codigo_postal'] : $codigo_postal = 'N/E';
                $row['direccion'] != "" ? $direccion = $row['direccion'] : $direccion = 'N/E';


                $table .= "
				<tr>
            		<td> {$nombre} </td>
            		<td> {$cargo} </td>
            		<td> {$row['nombre_empresa']} </td>
            		<td> {$row['tipo_empresa']} </td>
            		<td> {$row['num_colaboradores']} </td>
            		<td> {$row['antiguedad']} </td>
            		<td>
                	<button type='button' class='btn btn-success' data-toggle='modal'
                	    data-target='#modalUser{$row['id_usuario']}'>
                	    Ver más...
                	</button>
            		</td>
            		<td>
                	<button type='button' class='btn btn-warning'  >
                	 <a  
                	    style='text-decoration: none; color: whitesmoke;'  
                	    href='delete.php?id_usuario={$row['id_usuario']}'
                	    onclick='return confirm(\"$msg\")'>
                	    Eliminar 
                	    
                    </a> 
                    
                    
                    
                    
                	</button>
            		</td>
        		</tr>
				";

                $modal .= "<div class='modal fade' id='modalUser" . $row['id_usuario'] . "' tabindex='-1' role='dialog'>
				<div class='modal-dialog modal-xl modal-dialog-centered'>
					<div class='modal-content'>
						<div class='modal-header'>
							<h4 class='modal-title col-11 text-center'>Información General</h4>
							<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
								<span aria-hidden='true'>&times;</span>
							</button>
						</div>
						<div class='row'>
							<div class='col-md-6'>
								<!-- DIRECTIVO -->
								<div class='modal-header'>
									<h5 class='modal-title col-12 text-center' id='directivo'>
										Directivo</h5>
								</div>
			
								<div class='modal-body'>
			
									<div class='form-group'>
										<ol><strong>Nombre: </strong>" . $nombre . "</ol>
									</div>
									<div class='form-group'>
										<ol><strong>Apellidos: </strong>" . $apellido . "</ol>
									</div>
									<div class='form-group'>
										<ol><strong>Género: </strong>" . $genero . "</ol>
									</div>
									<div class='form-group'>
										<ol><strong>Cargo: </strong>" . $cargo . "</ol>
									</div>
									<div class='form-group'>
										<ol><strong>Grado de Estudios: </strong>" . $row['grado_estudios'] . "</ol>
									</div>
									<div class='form-row'>
										<div class='form-group col-md-6'>
											<ol><strong>Lada: </strong>" . $lada . "</ol>
										</div>
										<div class='form-group col-md-6'>
											<ol><strong>Teléfono: </strong>" . $telefono . "</ol>
										</div>
									</div>
									<div class='form-group'>
										<ol><strong>Correo Electrónico Personal:
											</strong>" . $row['correo'] . "</ol>
									</div>
									<div class='form-group'>
										<ol><strong>Correo Electrónico Alternativo:
											</strong>" . $correo_empresa . "</ol>
									</div>
			
								</div>
							</div>
			
							<div class='col-md-6'>
								<!-- EMPRESA -->
								<div class='modal-header'>
									<h5 class='modal-title col-12 text-center' id='empresa'>Empresa
									</h5>
								</div>
			
								<div class='modal-body'>
			
									<div class='form-group'>
										<ol><strong>Nombre: </strong>" . $row['nombre_empresa'] . "</ol>
									</div>
									<div class='form-group'>
										<ol><strong>Giro: </strong>" . $row['tipo_empresa'] . "</ol>
									</div>
									<div class='form-group'>
										<ol><strong>Antiguedad: </strong>" . $row['antiguedad'] . "</ol>
									</div>
									<div class='form-group'>
										<ol><strong>Colaboradores: </strong>" . $row['num_colaboradores'] . "</ol>
									</div>
									<div class='form-row'>
										<div class='form-group col-md-6'>
											<ol><strong>Lada: </strong>" . $lada_empresa . "</ol>
										</div>
										<div class='form-group col-md-6'>
											<ol><strong>Teléfono: </strong>" . $telefono_empresa . "</ol>
										</div>
									</div>
									<div class='form-row'>
										<div class='form-group col-md-6'>
											<ol><strong>País: </strong>" . $row['pais'] . "</ol>
										</div>
										<div class='form-group col-md-6'>
											<ol><strong>Estado: </strong>" . $row['estado'] . "</ol>
										</div>
									</div>
									<div class='form-row'>
										<div class='form-group col-md-6'>
											<ol><strong>Ciudad: </strong>" . $row['ciudad'] . "</ol>
										</div>
										<div class='form-group col-md-6'>
											<ol><strong>CP: </strong>" . $codigo_postal . "</ol>
										</div>
									</div>
									<div class='form-group'>
										<ol><strong>Dirección: </strong>" . $direccion . "</ol>
									</div>
								</div>
							</div>
			
						</div>
					</div>
				</div>
			</div>";
                $finales++;
            }
            ?>
            <?php echo $table; ?>
            </tbody>
            <!---  <tfoot class="table-dark">
                  <tr>
                      <th>Directivo</th>
                      <th>Cargo</th>
                      <th>Empresa</th>
                      <th>Giro</th>
                      <th>Tamaño</th>
                      <th>Antiguedad</th>
                      <th>Más</th>
                  </tr>
              </tfoot> -->
        </table>
        <?php echo $modal; ?>
        <?php
// include '../function/paginacion.php'; //include pagination class
// $pagination = new Paginacion($page, $total_pages, $adjacents);
// echo $pagination->paginate();
    } else {
        ?>
        <div class="alert alert-info" role="alert">Usuarios No Registrados</div>
        <?php

    }

}
?>
