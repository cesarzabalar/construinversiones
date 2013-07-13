<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of class_cliente_rol
 *
 * @author Jorge Ivan
 */
class class_cliente_rol {
    //put your code here
    
    var $id_cliente_rol="";
    var $id_cliente="";
    var $id_rol="";
    var $activo="";
    public function __construct() {
       
    } 
    
    public function getId_cliente_rol(){
        return $this->id_cliente_rol;
    } 
    public function setIde_cliente_rol($Ide_cliente_rol){
        $this->id_cliente_rol = $Ide_cliente_rol;
    }
    public function getId_cliente(){
        return $this->id_cliente;
    } 
    public function setIde_cliente($Ide_cliente){
        $this->id_cliente_rol = $Ide_cliente;
    }
    public function getId_rol(){
        return $this->id_rol;
    } 
    public function setIde_rol($Ide_rol){
        $this->id_rol = $Ide_rol;
    }
    public function getActivo(){
        return $this->activo;
    }
    public function setActivo($Activo){
        $this->activo = $Activo;
    }
}

?>
