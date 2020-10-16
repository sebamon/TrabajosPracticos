<?php

$Titulo = "Buscar Autos"; 
include_once("../estructura/cabecera.php");
//include_once("../../configuracion.php");

$objAbmTabla = new AbmAuto();

$listaTabla = $objAbmTabla->buscar(null);

?>	

<div class="container">
<h3 align="center">Buscar - Autos</h3>
<form action="accionBuscarAuto.php">
<div class="row form-group">
    <div class="col col-2">
        <label for="patente" class="control-label">Patente:</label>
    </div>
    <div class="col col-6">
        <input id="Patente" name="Patente" type="text" class="form-control" placoholder="Ingrese Patente">
    </div>
</div>
<button class="btn btn-lg btn-primary btn-block" type="submit">Buscar</button>

</form>
</DIV>

<?php
include_once("../estructura/pie.php");
?>