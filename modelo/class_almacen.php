<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of class_almacen
 *
 * @author Jorge Ivan
 */
class class_almacen {
    //put your code here
    var $codigo_almacen="";
    var $descripcion_almacen="";
    var $descripcion_salida="";
    var $descripcion_entrada="";
    public function __construct() {
        
    }
    public function getCodigo_almacen() {
        return $this->codigo_almacen;
    }
    public function setCodigo_almacen($Codigo_almacen){
        $this->codigo_almacen = $Codigo_almacen;
    }
    
    public function getDescripcion_almacen(){
        return $this->descripcion_almacen;
    }
    
    public function setDescripcion_almacen($Descripcion_almacen){
        $this->descripcion_almacen = $Descripcion_almacen;
    }
    public function getDescripcion_entrada(){
        return $this->descripcion_entrada;
    }
    public function setDescripcion_entrada($Descripcion_entrada){
        $this->descripcion_entrada = $Descripcion_entrada;
    }
    public function getDescripcion_salida(){
        return $this->descripcion_salida;
    }
    public function setDescripcion_salida($Descripcion_salida){
        $this->descripcion_salida = $Descripcion_salida;
    }
}

?>
