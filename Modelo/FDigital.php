<?php 
class FDigital {
    private $CliCod;
    private $SumNro;
    private $CliMail;
    
   
    public function __construct(){
        
        $this->CliCod="";
        $this->SumNro="";
        $this->CliMail ="";
    }
    public function setear($CliCod, $SumNro, $CliMail)    {
        $this->setCliCod($CliCod);
        $this->setSumNro($SumNro);
        $this->setCliMail($CliMail);
    }
    
    
    
    public function getCliCod(){
        return $this->CliCod;
        
    }
    public function setCliCod($valor){
        $this->CliCod = $valor;
        
    }
    
    public function getSumNro(){
        return $this->SumNro;
        
    }
    public function setSumNro($valor){
        $this->SumNro = $valor;
        
    }
    public function getCliMail(){
        return $this->CliMail;
        
    }
    public function setCliMail($valor){
        $this->CliMail = $valor;
        
    }
    
    
    public function cargar(){
        $resp = false;
        $base=new BaseDatos2();
        $sql="SELECT * FROM edersaglm.FDIGMAILS WHERE CliCod = ".$this->getCliCod();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['CliCod'], $row['SumNro'], $row['CliMail']);
                    
                }
            }
        } else {
            $this->setmensajeoperacion("Tabla->listar: ".$base->getError());
        }
        return $resp;
    
        
    }
    /*
    public function insertar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="INSERT INTO tabla(descrip)  VALUES('".$this->getDescrip()."');";
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setId($elid);
                $resp = true;
            } else {
                $this->setmensajeoperacion("Tabla->insertar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Tabla->insertar: ".$base->getError());
        }
        return $resp;
    }
    *//*
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="UPDATE tabla SET descrip='".$this->getDescrip()."' WHERE id=".$this->getId();
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
        $sql="DELETE FROM tabla WHERE id=".$this->getId();
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
    */
    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatosSQL();
        $sql="SELECT * FROM edersaglm.FDIGMAILS ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj= new FDigital();
                    $obj->setear($row['CliCod'], $row['SumNro'], $row['CliMail']);
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