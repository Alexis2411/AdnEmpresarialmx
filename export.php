<?php

include('includes/function/funciones.php');

$giro=strip_tags($_REQUEST['Expgiro']);
$antiguedad=strip_tags($_REQUEST['Expantiguedad']);
$colaboradores=strip_tags($_REQUEST['Expcolaboradores']);
$pais=strip_tags($_REQUEST['Exppais']);
$estado=strip_tags($_REQUEST['Expestado']);
$ciudad=strip_tags($_REQUEST['Expciudad']);

if ($_REQUEST['action'] === "export") {

    header("Content-Type:text/csv; charset = UTF-8");
    header("Content-Disposition: attachment; filename= resultado.csv");

	 $salida = fopen('php://output', 'w');
	
	$tables="usuario U INNER JOIN empresa E ON U.id_usuario = E.id_usuario INNER JOIN directivo D ON D.id_usuario = U.id_usuario";
	$campos="U.id_usuario,U.nombre,D.cargo,E.nombre_empresa,E.tipo_empresa, E.antiguedad, E.num_colaboradores,E.pais, E.estado, E.ciudad";
	
	
	$search=array("giro"=>$giro,"antiguedad"=>$antiguedad,"colaboradores"=>$colaboradores,"pais"=>$pais,"estado"=>$estado,"ciudad"=>$ciudad);
	//consulta principal para recuperar los datos
	$datos = exportCSV($tables,$campos,$search);
	if ($datos){
        $head = array(
            "Directivo","Cargo","Empresa","Giro","Tamaño","Antiguedad","Paíss","Estado","Ciudad");
        $section = onlySection();
        if ($section) {
            foreach ($section as $sec) {
                $question =  numPreguntas($sec['id_seccion']);
                    if ($question) {
                        foreach ($question as $ques) {
						$headQuest = $ques['numero_pregunta'];
                    	$head[] =  "B$headQuest"; 
                        }
					}
					$headSection = romano($sec["id_seccion"]);
                    $head[] = "Seccion $headSection";
    
                }
            }    

         fputcsv($salida,$head);

		foreach ($datos as $row){
            
			$usuario = $row['id_usuario'];
			$row['nombre'] != ""? $nombre=$row['nombre'] : $nombre = "No Especificado";
			$row['cargo'] != ""? $cargo=$row['cargo'] : $cargo = "No Especificado";
			
                $columna = array($nombre,$cargo,$row['nombre_empresa'],$row['tipo_empresa'],$row['antiguedad'],$row['num_colaboradores'],$row['pais'],$row['estado'],$row['ciudad']);     
                $seccion = obtSeccionExport($usuario);
                if ($seccion) {
					
					foreach ($seccion as $score) {
						$completo = $score['completo'];
						$pregunta = getPreguntas($score["id_seccion"]);
						if ($pregunta) {
							foreach ($pregunta as $pregun) {
								$bloque = bloqueScore($usuario, $pregun['id_pregunta']);
								if ($bloque) {
									foreach ($bloque as $res) {
									if ($completo) {
										$res['pregunta'] == null? $valorP = 0 : $valorP = $res['pregunta'];
										$totalBloque = $res['valor'] + $valorP;
										$columna[] = $totalBloque; 
									}else {
										$columna[] =  "N/D";
									}
								}
								
							}
						}
						$complete = scoreExport($score["id_seccion"], $usuario);
                    	foreach($complete as $comp){
							if ($comp["total"] != null) {
                                $columna[] = $comp["total"]; 
							}else {
                                $columna[] = "Pendiente";

							}               
                        }
					}                    
                }
				
            }
            
             fputcsv($salida, $columna);
			
		}	
	}
	
	
}
?>