<?php 
class usuario {
    private $idusuario;
    private $usnombre;
    private $uspass;
    private $usmail;
    private $usdehabilitado;
    
   
    public function __construct(){
        
        $this->idusuario="";
        $this->usnombre="";
        $this->uspass ="";
        $this->usmail ="";
        $this->usdehabilitado ="";
    }
    public function setear($idusuario, $usnombre, $uspass, $usmail, $usdehabilitado)    {
        $this->setidusuario($idusuario);
        $this->setusnombre($usnombre);
        $this->setuspass($uspass);
        $this->setusmail($usmail);
        $this->setusdesahilitado($usdehabilitado);
        
    }
    
    
    
    public function getidusuario(){
        return $this->idusuario;
        
    }
    public function setidusuario($valor){
        $this->idusuario = $valor;
        
    }
    
    public function getusnombre(){
        return $this->usnombre;
        
    }
    public function setusnombre($valor){
        $this->usnombre = $valor;
        
    }
    public function getuspass(){
        return $this->uspass;
        
    }
    public function setuspass($valor){
        $this->uspass = $valor;
        
    }
    public function getusmail(){
        return $this->usmail;
        
    }
    public function setusmail($valor){
        $this->usmail = $valor;
        
    }
    public function getusdeshabilitadp(){
        return $this->usdeshabilitado;
        
    }
    public function setusdeshabilitado($valor){
        $this->usdeshabilitado = $valor;
        
    }
    
    
    public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM usuario WHERE idusuario = ".$this->getId();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['idusuario'], $row['usnombre'], $row['uspass'], $row['usmail'], $row['usdeshabilitado']);
                    
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
        $sql="INSERT INTO usuario(usnombre,uspass,usmail,usdeshabilitado)  VALUES ('";
        $sql.=$this->getusnombre()."','";
        $sql.=$this->getuspass()."','";
        $sql.=$this->getmail()."',";
        $sql.=$this->getdeshabilitado().");";
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
    
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="UPDATE usuario SET ";
        $sql.="usnombre='".$this->getusnombre()."', ";
        $sql.="uspass='".$this->getuspass()."', ";
        $sql.="usmail='".$this->getusmail()."', ";
        $sql.="usdeshabilitado=".$this->getusdeshabilitado()." ";
        $sql.="where idusuario=".$this->getidusuario();

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
        $sql="DELETE FROM usuario WHERE idusuario=".$this->getidusuario();
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
        $sql="SELECT * FROM usuario ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj= new usuario();
                    $obj->setear($row['idusuario'], $row['usnombre'], $row['uspass'], $row['usmail'], $row['usdeshabilitado']);
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