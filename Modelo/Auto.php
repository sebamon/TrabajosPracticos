<?php 
class Auto {
    private $Patente;
    private $Marca;
    private $Modelo;
    private $DniDuenio;
    
   
    public function __construct(){
        
        $this->Patente="";
        $this->Marca="";
        $this->Modelo ="";
        $this->DniDuenio="";
    }
    public function setear($Patente, $Marca,$Modelo,$DniDuenio)    {
        $this->setPatente($Patente);
        $this->setMarca($Marca);
        $this->setModelo($Modelo);
        $this->setDniDuenio($DniDuenio);

    }
    
    
    
    public function getPatente(){
        return $this->Patente;
        
    }
    public function setPatente($valor){
        $this->Patente = $valor;
        
    }
    
    public function getMarca(){
        return $this->Marca;
        
    }
    public function setMarca($valor){
        $this->Marca = $valor;
        
    }
    public function getModelo(){
        return $this->Modelo;
        
    }
    public function setModelo($valor){
        $this->Modelo = $valor;
        
    }
    public function getDniDuenio(){
        return $this->DniDuenio;
        
    }
    public function setDniDuenio($valor){
        $this->DniDuenio = $valor;
        
    }
    public function MostrarDuenio()
    {
    
        return $DniDuenio.MostrarNombreyApellido();
    }
    
    
    public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM auto WHERE Patente = ".$this->getPatente();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['Patente'], $row['Marca'], $row['Modelo'], $row['DniDuenio']);
                    
                }
            }
        } else {
            $this->setmensajeoperacion("Tabla->listar: ".$base->getError());
        }
        return $resp;
    
        
    }
    
    public function insertar(){
        $resp = false;
        $base=new BaseDatos();
        //$sentencia="INSERT INTO auto(Patente,Marca,Modelo,Dni_Duenio)  VALUES('".$this->getPatente()."','".$this->getMarca()."','.$this->getModelo()','".$this->getDni_Duenio()."');";
        $sql="INSERT INTO auto(Patente,Marca,Modelo,DniDuenio)  VALUES('".$this->getPatente()."','".$this->getMarca()."','.$this->getModelo()','".$this->getDniDuenio()."');";
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setPatente($elid);
                $resp = true;
            } else {
                $this->setmensajeoperacion("Tabla->insertar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Tabla->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="UPDATE auto SET Marca='".$this->getMarca()."',"; 
        $sql.="Modelo=".$this->getModelo().",";
        $sql.="DniDuenio='".$this->getDniDuenio()."' ";
        $sql.= "WHERE Patente='".$this->getPatente()."'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("Tabla->modificar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Tabla->modificar: ".$base->getError());
        }
        return $resp;
    }
    
    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="DELETE FROM auto WHERE Patente=".$this->getPatente();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("Tabla->eliminar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Tabla->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM auto ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj= new Auto();
                    $persona = new Persona();
                    $persona->setNroDni($row['DniDuenio']);
                    $persona->cargar();
                    $obj->setear($row['Patente'], $row['Marca'], $row['Modelo'], $persona);

                    array_push($arreglo, $obj);
                }
               
            }
            
        } else {
            $this->setmensajeoperacion("Tabla->listar: ".$base->getError());
        }
 
        return $arreglo;
    }
    
}


?>