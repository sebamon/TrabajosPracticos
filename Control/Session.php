<?php
class Session {


    private $Usuario;
    private $Rol;

    private $ssNombre;
    private $ssPass;
    private $ssEmail;
    private $ssRol;
    private $ssDescripcionRol;
    

    public function getUsuario()
    {
        return $this->Usuario;
    }

    public function setUsuario($valor)
    {
        $this->Usuario=$valor;
    }

     public function getRol()
    {
        return $this->Rol;
    }
    public function setRol($valor)
    {
        $this->Rol=$valor;
    }

    public function getssNombre()
    {
        return $this->ssNombre;
    }
    public function setssNombre($valor)
    {
        $this->ssNombre=$valor;
    }

    public function getssPass()
    {
        return $this->ssPass;
    }
    public function setssPass($valor)
    {
        $this->ssPass=$valor;
    }

    public function getssEmail()
    {
        return $this->ssEmail;
    }
    public function setssEmail($valor)
    {
        $this->ssEmail=$valor;
    }

    public function getssRol()
    {
        return $this->ssRol;
    }
    public function setssRol($valor)
    {
        $this->ssRol=$valor;
    }
        
    public function getssDescripcionRol()
    {
        return $this->ssDescripcionRol;
    }
    public function setssDescripcionRol($valor)
    {
        $this->ssDescripcionRol=$valor;
    }



    public function iniciar($user,$pass)
    {
        session_start();
        $session = new Session();
        

        $session->setUsuario($user);
        $session->setssPass($pass);

        $_SESSION=$session;


    }

    public function validar()
    {
        $
    }

}

?>