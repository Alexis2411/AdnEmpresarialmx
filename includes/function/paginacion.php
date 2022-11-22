<?php
function paginate($reload, $page, $tpages, $adjacents) {
	$prevlabel = "&laquo; ";
	$nextlabel = " &raquo;";
	$out = '<ul class="pagination">';

	// previous label

	if($page==1) {
		$out.= "<li class='page-item disabled'><a class='page-link' aria-label='Previous'><span aria-hidden='true'>$prevlabel</span><span class='sr-only'>Previous</span></a></li>";
	} else if($page==2) {
		$out.= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='users(1)'>$prevlabel</a></li>";
	}else {
		$out.= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='users(".($page-1).")'>$prevlabel</a></li>";

	}

	// first label
	if($page>($adjacents+1)) {
		$out.= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='users(1)'>1</a></li>";
	}
	// interval
	if($page>($adjacents+2)) {
		$out.= "<li class='page-item'><a class='page-link'>...</a></li>";
	}

	// pages

	$pmin = ($page>$adjacents) ? ($page-$adjacents) : 1;
	$pmax = ($page<($tpages-$adjacents)) ? ($page+$adjacents) : $tpages;
	for($i=$pmin; $i<=$pmax; $i++) {
		if($i==$page) {
			$out.= "<li class='page-item active'><a class='page-link'>$i</a></li>";
		}else if($i==1) {
			$out.= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='users(1)'>$i</a></li>";
		}else {
			$out.= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='users(".$i.")'>$i</a></li>";
		}
	}

	// interval

	if($page<($tpages-$adjacents-1)) {
		$out.= "<li class='page-item'><a class='page-link'>...</a></li>";
	}

	// last

	if($page<($tpages-$adjacents)) {
		$out.= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='users($tpages)'>$tpages</a></li>";
	}

	// next

	if($page<$tpages) {
		$out.= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='users(".($page+1).")'>$nextlabel</a></li>";
	}else {
		$out.= "<li class='page-item disabled'><a class='page-link' aria-label='Previous'><span aria-hidden='true'>$nextlabel</span><span class='sr-only'>Previous</span></a></li>";
	}

	$out.= "</ul>";
	return $out;
}

// function paginat($namePage, $page, $reporte, $tpages, $adjacents) {
// 	$prevlabel = "&laquo; ";
// 	$nextlabel = " &raquo;";
// 	$out = '<ul class="pagination">';

// 	// previous label
// 	if($page==1) {
// 		$out.= "<li class='page-item disabled'><a class='page-link' aria-label='Previous'><span aria-hidden='true'>$prevlabel</span><span class='sr-only'>Previous</span></a></li>";
// 	} else if($page==2) {
// 		$out.= "<li class='page-item'><span><a href='$namePage?estado=$reporte&pagina=1'>$prevlabel</a></span></li>";
// 	}else {
// 		$out.= "
// 		<li class='page-item'><a class='page-link' href='$namePage?estado=$reporte&pagina=".($page-1)."' aria-label='Previous'><span aria-hidden='true'>$prevlabel</span><span class='sr-only'>Previous</span></a></li>";

// 	}

// 	// first label
// 	if($page>($adjacents+1)) {
// 		$out.= "
// 		<li class='page-item'><a class='page-link' href='$namePage?estado=$reporte&pagina=1'>1</a></li>
// 		";
// 	}
// 	// interval
// 	if($page>($adjacents+2)) {
// 		$out.= "<li class='page-item'><a>...</a></li>";
// 	}

// 	// pages

// 	$pmin = ($page>$adjacents) ? ($page-$adjacents) : 1;
// 	$pmax = ($page<($tpages-$adjacents)) ? ($page+$adjacents) : $tpages;
// 	for($i=$pmin; $i<=$pmax; $i++) {
// 		if($i==$page) {
// 			$out.= "<li class='page-item active'><a>$i</a></li>";
// 		}else if($i==1) {
// 			$out.= "<li class='page-item'><a class='page-link' href='$namePage?estado=$reporte&pagina=1'>$i</a></li>";
// 		}else {
// 			$out.= "<li class='page-item'><a class='page-link' href='$namePage?estado=$reporte&pagina=".$i."'>$i</a></li>";
// 		}
// 	}

// 	// interval

// 	if($page<($tpages-$adjacents-1)) {
// 		$out.= "<li class='page-item'><a class='page-link'>...</a></li>";
// 	}

// 	// last

// 	if($page<($tpages-$adjacents)) {
// 		$out.= "<li class='page-item'><a class='page-link' href='$namePage?estado=$reporte&pagina=$tpages'>$tpages</a></li>";
// 	}

// 	// next

// 	if($page<$tpages) {
// 		$out.= "<li class='page-item'><span><a class='page-link' href='$namePage?estado=$reporte&pagina= ".($page+1).")'>$nextlabel</a></span></li>";
// 	}else {
// 		$out.= "<li class='page-item disabled'><a class='page-link' aria-label='Previous'><span aria-hidden='true'>$nextlabel</span><span class='sr-only'>Previous</span></a></li>";
// 	}

// 	$out.= "</ul>";
// 	return $out;
// }

?>
