<?php
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	
	include('orders.php');
	include("../function/funciones.php");

	$database=new orders();
	//Recibir variables enviadas
	$giro=strip_tags($_REQUEST['giro']);
	$antiguedad=strip_tags($_REQUEST['antiguedad']);
	$colaboradores=strip_tags($_REQUEST['colaboradores']);
	$pais=strip_tags($_REQUEST['pais']);
	$estado=strip_tags($_REQUEST['estado']);
	$ciudad=strip_tags($_REQUEST['ciudad']);
	$per_page= 10;
	$tables="usuario U INNER JOIN empresa E ON U.id_usuario = E.id_usuario INNER JOIN directivo D ON D.id_usuario = U.id_usuario";
	$campos="U.id_usuario,U.nombre,D.cargo,E.nombre_empresa,E.tipo_empresa, E.antiguedad, E.num_colaboradores,E.pais, E.estado, E.ciudad";
	//Variables de paginación
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	$adjacents  = 4; //espacio entre páginas después del número de adyacentes
	$offset = ($page - 1) * $per_page;
	
	
	$search=array("giro"=>$giro,"antiguedad"=>$antiguedad,"colaboradores"=>$colaboradores,"pais"=>$pais,"estado"=>$estado,"ciudad"=>$ciudad,"per_page"=>$per_page,"offset"=>$offset);
	//consulta principal para recuperar los datos
	$datos=$database->getData($tables,$campos,$search);
	$countAll=$database->getCounter();
	$row = $countAll;
	if ($row>0){
		$numrows = $countAll;;
	} else {
		$numrows=0;
	}	
	$total_pages = ceil($numrows/$per_page);
	
	
	//Recorrer los datos recuperados

	if ($numrows>0){
		?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive">

                    <table class="table table-striped table-hover ">
                        <thead>
                            <tr>
                                <th>Directivo</th>
                                <th>Cargo</th>
                                <th>Empresa</th>
                                <th>Giro</th>
                                <th>Tamaño</th>
                                <th>Antiguedad</th>
                                <th>Paíss</th>
                                <th>Estado</th>
								<th>Ciudad</th>
								<?php
									$section = onlySection();
									if ($section) {
										foreach ($section as $sec) {
											$question =  numPreguntas($sec['id_seccion']);

											/* Mostrar B1...B10
											if ($question) {
												foreach ($question as $ques) {
													?>
													<th>B<?php echo $ques['numero_pregunta'] ?></th>
													<?php
												}
											}
*/


											?>
												<th>Encuesta <?php echo ($sec['nombre']) ?></th>
											<?php
										}
									}

								?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
		$finales=0;
		foreach ($datos as $row){
			$usuario = $row['id_usuario'];
			$row['nombre'] != ""? $nombre=$row['nombre'] : $nombre = "No Especificado";
			$row['cargo'] != ""? $cargo=$row['cargo'] : $cargo = "No Especificado";
			?>
                            <tr>
                                <td><?php echo $nombre;?></td>
                                <td><?php echo $cargo;?></td>
                                <td><?php echo $row['nombre_empresa'];?></td>
                                <td><?php echo $row['tipo_empresa'];?></td>
                                <td><?php echo $row['antiguedad'];?></td>
                                <td><?php echo $row['num_colaboradores'];?></td>
                                <td><?php echo $row['pais'];?></td>
                                <td><?php echo $row['estado'];?></td>
                                <td><?php echo $row['ciudad'];?></td>
                                <?php
                $seccion = obtSeccionExport($usuario);
                if ($seccion) {
					
					foreach ($seccion as $score) {
						$completo = $score['completo'];
						$pregunta = getPreguntas($score["id_seccion"]);
						if ($pregunta) {

						    /* Mostrar B1...B10
						    foreach ($pregunta as $pregun) {
								$bloque = bloqueScore($usuario, $pregun['id_pregunta']);
								if ($bloque) {
									foreach ($bloque as $res) {
									if ($completo) {

									    $res['pregunta'] == null? $valorP = 0 : $valorP = $res['pregunta'];
										$totalBloque = $res['valor'] + $valorP;
										?>

                                <td><?php echo $totalBloque;?></td>
                                <?php
									}else {
										?>
                                 <td>N/D</td>
                                <?php
									}
								}

							}
						}
						*/


						$complete = scoreExport($score["id_seccion"], $usuario);
						foreach($complete as $comp){
							if ($comp["total"] != null) {
								if ($score["id_seccion"] <= 4){
									?>
									<td><?php echo $comp["total"];?></td>
                                <?php
								}else{
									?>
									<td><?php echo $comp["total"]/2 ;?></td>
									<?php
								}
							}else {
								?>
                                <td> Pendiente </td>
                                <?php
							}               
                        }
					}                    
                }
				
			}



			?>
                            </tr>
                            <?php
			$finales++;
		}	
		?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="clearfix">
    <?php 
				$inicios=$offset+1;
				$finales+=$inicios -1;
				echo '<div class="hint-text">Mostrando '.$inicios.' al '.$finales.' de '.$numrows.' registros</div>';
				
				
				include '../function/pagination.php'; //include pagination class
				$pagination = new Pagination($page, $total_pages, $adjacents);
				echo $pagination->paginate();

			?>
</div>
<?php
	}else {
		echo "<div class='alert alert-info' role='alert'>
		No Hay Resultados en la Busqueda Realizada
	  </div>";
	}
}
?>