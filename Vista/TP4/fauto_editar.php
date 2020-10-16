<?php
$Titulo = "Modificar Auto"; 
include_once("../estructura/cabecera.php");
$objAbmTabla = new AbmAuto();
$datos = data_submitted();
$obj =NULL;
if (isset($datos['Patente'])){
    $listaTabla = $objAbmTabla->buscar($datos);
    if (count($listaTabla)==1){
        $obj= $listaTabla[0];
    }
}

?>
<div class="container">
<h3>Auto</h3>
<?php if ($obj!=null){?>
<form method="post" action="abmAuto.php">
	<label>ID</label><br/>
	<input id="Patente:" readonly name ="Patente" width="80" type="text" value="<?php echo $obj->getPatente()?>"><br/>
	<label>Marca</label><br/>
	<input type="text"  id="Marca" name="Marca" value='<?php echo $obj->getMarca()?>'><br/>
	<label>Modelo</label><br/>
	<input type="text"  id="Modelo" name="Modelo" value='<?php echo $obj->getModelo()?>'><br/>
	<label>Dni Dueño</label><br/>
	<input type="text"  id="DniDuenio" name="DniDuenio" value='<?php echo $obj->getDniDuenio()?>'><br/>

	<input id="accion" name ="accion" value="editar" type="hidden">
	<input type="submit">
</form>
<?php }else {
    
    echo "<p>No se encontro la clave que desea modificar";
}?>
<br><br>
<a href="VerAutos.php">Volver</a>
</body>
</html>