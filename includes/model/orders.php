<?php
/**
 	--------------------------
	Autor: Obed Alvarado
	Web: obedalvarado.pw
	Mail: info@obedalvarado.pw
	----------------------------
 
*/
include("../function/database.php");
class orders extends database {
	public $mysqli;
	public $counter;

	function __construct(){
		$this->mysqli = $this->conectar();
    }
	
	public function countAll($sql){
		$query=$this->mysqli->query($sql);
		$count=$query->num_rows;
		return $count;
	}
	
	public function getData($tables,$campos,$search){
		$offset = $search['offset'];
		$per_page = $search['per_page'];
		$sWhere = "U.tipo = 1";

			if ($search["giro"] !="") {
				$sWhere .= " AND E.tipo_empresa  ='".$search["giro"]."'";
			}
			
			if ($search['antiguedad']!="") {
				$sWhere.=" AND E.antiguedad = '".$search['antiguedad']."'";
			}

			if ($search['colaboradores']!="") {
				$sWhere.=" AND E.num_colaboradores = '".$search['colaboradores']."'";
			}

			if ($search['pais']!="") {
				$sWhere.=" AND E.pais = '".$search['pais']."'";
			}

			if ($search['estado']!="") {
				$sWhere.=" AND E.estado = '".$search['estado']."'";
			}

			if ($search['ciudad']!="") {
				$sWhere.=" AND E.ciudad = '".$search['ciudad']."'";
			}
		

		$sWhere.=" ORDER BY U.id_usuario DESC";
		$sql="SELECT $campos FROM  $tables WHERE $sWhere LIMIT $offset,$per_page";
		$export = "SELECT $campos FROM  $tables WHERE $sWhere";
		
		$query=$this->mysqli->query($sql);
		$sql1="SELECT $campos FROM  $tables WHERE $sWhere";
		$nums_row=$this->countAll($sql1);
		//Set counter
		$this->setCounter($nums_row);
		return $query;
	}
	
	function setCounter($counter) {
		$this->counter = $counter;
	}
	function getCounter() {
		return $this->counter;
	}

	public function exportCSV($tables,$campos,$search){
		$sWhere = "U.tipo = 1";

			if ($search["giro"] !="") {
				$sWhere .= " AND E.tipo_empresa  ='".$search["giro"]."'";
			}
			
			if ($search['antiguedad']!="") {
				$sWhere.=" AND E.antiguedad = '".$search['antiguedad']."'";
			}

			if ($search['colaboradores']!="") {
				$sWhere.=" AND E.num_colaboradores = '".$search['colaboradores']."'";
			}

			if ($search['pais']!="") {
				$sWhere.=" AND E.pais = '".$search['pais']."'";
			}

			if ($search['estado']!="") {
				$sWhere.=" AND E.estado = '".$search['estado']."'";
			}

			if ($search['ciudad']!="") {
				$sWhere.=" AND E.ciudad = '".$search['ciudad']."'";
			}
		

		$sWhere.=" ORDER BY U.id_usuario DESC";
		$sql="SELECT $campos FROM  $tables WHERE $sWhere";
		$query=$this->mysqli->query($sql);

		return $query;
	}

	
}

