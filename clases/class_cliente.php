<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of class_cliente
 *
 * @author Jorge Ivan
 */
class class_cliente {
    var $idcliente="";
    var $nombre="";
    var $apellido="";
    var $documento="";
    var $empresa="";
    var $correo="";
    var $direccion="";
    //put your code here

    public function __construct(){
    
    }
    
    public function getIdCliente()
    {
        return $this->idcliente;
    }
    
    public function setIdCliente($idCliente)
    {
        $this->idcliente = $idCliente;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($Nombre){
        $this->nombre = $Nombre;
    }
    
    public function getApellido(){
        return $this->apellido;
    }
    public function setApellido($Apellido){
        $this->apellido = $Apellido;
    }   
     
    public function getDocumento (){
        return $this->documento;
    }
    public function setDocumento ($Documento){
        $this->documento = $Documento;
    }
    
    public function getEmpresa (){
        return $this->empresa;
    }
    
    public function setEmpresa($Empresa){
        $this->empresa = $Empresa;
    }
    public function getCorreo(){
        return $this->correo;
    }
    public function setCorreo ($Correo){
        $this->correo = $Correo;
    }
    
    public function getDireccion () {
        return $this->direccion;
    }
    public function setDireccion ($Direccion){
        $this->direccion = $Direccion;
    }
    
    
    
    
        
   }
?>
