<?php

$Titulo = "Ver Autos"; 
include_once("../estructura/cabecera.php");
//include_once("../../configuracion.php");

$objAbmTabla = new AbmAuto();

$listaTabla = $objAbmTabla->buscar(null);

?>	

<div class="container">
<h3 align="center">ABM - Autos</h3>
<!-- <a href="ftabla_nuevo.php">nuevo</a> -->
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="">#</th>
      <th scope="col">Patente</th>
      <th scope="col">Marca</th>
      <th scope="col">Modelo</th>
      <th scope="col">Dueño</th>
    </tr>
    </thead>
<?php	

 if( count($listaTabla)>0)
 {
     $i=1;
     echo '<tbody>';
    foreach ($listaTabla as $objTabla) 
    { 
        
        echo '<tr>';
        echo '<th scope="row">'.$i.'</th>';
        echo '<td>'.$objTabla->getPatente().'</td>';
        echo '<td>'.$objTabla->getMarca().'</td>';
        echo '<td>'.$objTabla->getModelo().'</td>';
        echo '<td>'.$objTabla->MostrarDuenio().'</td>';
         echo '<td><a href="fauto_editar.php?Patente='.$objTabla->getPatente().'">editar</a></td>';
        echo '<td><a href="accion/abmAuto.php?accion=borrar&id='.$objTabla->getPatente().'">borrar</a></td>';
        echo '</tr>';
        $i++;
    }
    echo '</tbody>';
    echo'</table>';

}


        // echo '<tr><td style="width:500px;">'.$objTabla->getMarca().'</td>';
        // echo '<td><a href="fauto_editar.php?Patente='.$objTabla->getPatente().'">editar</a></td>';
        //echo '<td><a href="accion/abmAuto.php?accion=borrar&id='.$objTabla->getId().'">borrar</a></td></tr>'; 
	


?>
</DIV>

<?php
include_once("../estructura/pie.php");
?>