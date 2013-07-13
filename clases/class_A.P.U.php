<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of class_A
 *
 * @author Jorge Ivan
 */
class class_A {
   var $codigo_APU = "";
   var $descripcion_APU = "";
   var $codigo_material = "";
   var $codigo_mano_de_obra="";
   var $codigo_equipo="";
   public function __construct() {
          
       
       
   }
   public function getCodigo_APU (){
       return $this->codigo_APU;
   }
   public function setCodigo_APU ($Codigo_APU){
       $this->codigo_APU = $Codigo_APU;
   }
   public function getDrescripcion_APU (){
       return $this->descripcion_APU;
   }
   public function setDescripcion_APU ($Descripcion_APU){
       $this->descripcion_APU = $Descripcion_APU;
   }
   public function getCodigo_material (){
       return $this->codigo_material;
   }
   public function setCodigo_material($Codigo_material){
       $this->codigo_material = $Codigo_material;
   }
   
   public function getCodigo_mano_de_obra(){
       return $this->codigo_mano_de_obra;
   }
   public function setCodigo_mano_de_obra ($Codigo_mano_de_obra){
       $this->codigo_mano_de_obra = $Codigo_mano_de_obra;
   }
   public function getCodigo_equipo(){
       return $this->codigo_equipo;
   }
   public function setCodigo_equipo($Codigo_equipo){
       $this->codigo_equipo = $Codigo_equipo;
   }
   
   
}

    ?>
