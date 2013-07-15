<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of class_actividades
 *
 * @author Jorge Ivan
 */
class class_actividades {
var $codigo_actividad="";
var $nombre_actividad="";
var $descripcion_actividad="";
var $unidad_actividad="";
var $costo_directo_actividad="";
var $costo_total_actividad="";
var $codigo_capitulo="";
public function __construct() {
    ;
}
public function getCodigo_actividad(){
    return $this->codigo_actividad;
}
public function setCodigo_actividad($Codico_actividad){
    $this->codigo_actividad = $Codico_actividad;
}
public function getNombre_actividad(){
    return $this->nombre_actividad;
}
public function setNombre_actividad($Nombre_actividad){
    $this->nombre_actividad = $Nombre_actividad;
}
public function getdescripcion_actividad(){
    return $this->descripcion_actividad;
}
public function setDescripcion_actividad($Descripcion_actividad){
    $this->descripcion_actividad = $Descripcion_actividad;
}
public function getUnidad_actividad(){
    return$this->unidad_actividad;
}
public function setUnidad_actividad($Unidad_actividad){
    $this->unidad_actividad = $Unidad_actividad;
}

public function getCosto_total_actividad(){
    return $this->costo_total_actividad;
}

public function setCosto_total_actividad($Costo_total_actividad){
    $this->costo_total_actividad_actividad = $Costo_total_actividad;
}
public function getCosto_directo_actividad(){
    return $this->costo_directo_actividad;
}

public function setCosto_directo_actividad($Costo_directo_actividad){
    $this->costo_directo_actividad = $Costo_directo_actividad;
}

public function getCodigo_capitulo(){
    return $this->codigo_capitulo;
}
public function setCodigo_capitulo($Codigo_capitulo){
    $this->codigo_capitulo = $Codigo_capitulo;
}





//put your code here
}

?>
