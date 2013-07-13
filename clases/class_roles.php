<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of class_roles
 *
 * @author Jorge Ivan
 */
class class_roles {
    var $ide_rol = "";
    var $nombre_rol="";
    //put your code here

    public function __construct() {
        
    }
    public function getIde_rol(){
        return $this->ide_rol;
    }
    
    public function setIde_rol($Ide_rol){
        $this->ide_rol = $Ide_rol;
    }
    public function getNombre_rol(){
        return $this->nombre_rol;
    }
    public function setNombre_rol($Nombre_rol){
        $this->nombre_rol = $Nombre_rol;
    }
}

?>
