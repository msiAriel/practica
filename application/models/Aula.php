<?php

  class Aula extends CI_model{

    public function insertar($datosAula){
      return $this->db->insert('aulas',$datosAula);
    }

    public function obtenerTodos(){
      $this->db->join('bloques','bloques.id_bloq=aulas.fk_id_bloq');
       $query=$this->db->get('aulas');
       if ($query->num_rows() >0){
         return $query;
       }else {
         return false;
       }
    }

    
    public function obtenerPorId($id){
      $this->db->where("id_aul",$id);
      $query=$this->db->get('aulas');
      if ($query->num_rows()>0) {
        return $query->row();
      }else {
        return false; // cuando no hya datos
    }
    }
  //   //funcion para eliminar el comentario
  public function eliminarPorId($id_aul){
    $this->db -> where("id_aul",$id_aul);
    //where id usu=3
    return $this->db ->delete("aulas");

  }

  public function actualizar($id,$datosEditados){
    $this->db->where("id_aul",$id);
    return $this->db->update('aulas',$datosEditados);
  }

    }
   ?>
