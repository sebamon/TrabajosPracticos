<?php



$Titulo = "Buscar Auto"; 
include_once("../estructura/cabecera.php");
//include_once("../../configuracion.php");

$datos = data_submitted();

$objAbmAuto = new AbmAuto();
$unAuto = $objAbmAuto ->buscar($datos);
//$listaTabla = $objAbmTabla->buscar(null);

foreach($unAuto as $autoEncontrado)
{
echo ($autoEncontrado->getPatente());
}
?>	