<?php
class AbmFDigital{
    //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto

    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return FDigital
     */
    private function cargarObjeto($param){
        $obj = null;
           
        if( array_key_exists('CliCod',$param) and array_key_exists('SumNro',$param)){
            $obj = new FDigital();
            $obj->setear($param['CliCod'], $param['SumNro']);
        }
        return $obj;
    }
    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return FDigital
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        
        if( isset($param['CliCod']) ){
            $obj = new FDigital();
            $obj->setear($param['CliCod'], $param['SumNro']);
        }
        return $obj;
    }
    
    
    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */
    
    private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['CliCod']))
            $resp = true;
        return $resp;
    }
    
    /**
     * 
     * @param array $param
     */
    /*public function alta($param){
        $resp = false;
        $param['id'] =null;
        $elObjtTabla = $this->cargarObjeto($param);
//        verEstructura($elObjtTabla);
        if ($elObjtTabla!=null and $elObjtTabla->insertar()){
            $resp = true;
        }
        return $resp;
        
    }*/
    /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
    /*public function baja($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjtTabla = $this->cargarObjetoConClave($param);
            if ($elObjtTabla!=null and $elObjtTabla->eliminar()){
                $resp = true;
            }
        }
        
        return $resp;
    }
    
    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     *//*
    public function modificacion($param){
        //echo "Estoy en modificacion";
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjtTabla = $this->cargarObjeto($param);
            if($elObjtTabla!=null and $elObjtTabla->modificar()){
                $resp = true;
            }
        }
        return $resp;
    }
    /*
    /**
     * permite buscar un objeto
     * @param array $param
     * @return boolean
     *//*/
     */
    public function buscar($param){
        $where = " true ";
        if ($param<>NULL){
            if  (isset($param['CliCod']))
                $where.=" and CliCod =".$param['CliCod'];
            if  (isset($param['SumNro']))
                 $where.=" and SumNro ='".$param['SumNro']."'";
        }
        $arreglo = FDigital::listar($where);  
        return $arreglo;
            
            
      
        
    }
    
}
?>