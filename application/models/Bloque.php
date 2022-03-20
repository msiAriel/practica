<?php

  class Bloque extends CI_model{

    public function insertar($datosAula){
      return $this->db->insert('bloques',$datosAula);
    }

    public function obtenerTodos(){
       $query=$this->db->get('bloques');
       if ($query->num_rows() >0){
         return $query;
       }else {
         return false;
       }
    }

    public function obtenerPorId($id){
      $this->db->where("id_bloq",$id);
      $query=$this->db->get('bloques');
      if ($query->num_rows()>0) {
        return $query->row();
      }else {
        return false; // cuando no hya datos
    }
    }
  //   //funcion para eliminar el comentario
  public function eliminarPorId($id_bloq){
    $this->db -> where("id_bloq",$id_bloq);
    //where id usu=3
    return $this->db ->delete("bloques");

  }

      public function actualizar($id,$datosEditados){
        $this->db->where("id_bloq",$id);
        return $this->db->update('bloques',$datosEditados);
      }

      // funcion para validar que no se repitan los bloquesEditar
      public function consultarBloquePorNombre($nombre_bloq){
    $this->db->where('nombre_bloq',$nombre_bloq);
    $query=$this->db->get('bloques');
    if ($query->num_rows()>0) {
      return $query->row();
    } else {
      return false;
    }
  }

    }
   ?>
