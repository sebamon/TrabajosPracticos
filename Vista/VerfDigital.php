<?php
include_once "../configuracion.php";
$objAbmTabla = new AbmFDigital();

$param = array ('CliCod' => '000136',
                'SumNro'=>'5'); 
 

$listaTabla = $objAbmTabla->buscar($param);

?>	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Ejemplo</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h3>ABM - Tabla</h3>
<!-- <a href="ftabla_nuevo.php">nuevo</a> -->
<table border="1">
<?php	

 if( count($listaTabla)>0){
    foreach ($listaTabla as $objTabla) { 
        
        echo '<tr><td style="width:500px;">'.$objTabla->getCliCod().'</td>';
        echo '<td>'.$objTabla->getSumNro().'</td>';
        echo '<td>'.$objTabla->getCliMail().'</td></tr>'; 
	}
}

?>
</table>
</body>
</html>