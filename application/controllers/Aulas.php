<?php

class Aulas extends CI_Controller
{

  function __construct()
  {
    parent:: __construct();
    $this->load->model('aula');
    $this->load->model('bloque');
  }

  public function gestionAulas(){
    $this->load->view('encabezado');
    $this->load->view('aulas/listadoAulas');
    $this->load->view('pie');
  }

  public function formulario(){
$data['listadoBloques']=$this->bloque->obtenerTodos();

    $this->load->view('aulas/formulario',$data);

  }

  public function insertarAula(){
          $datos=array(
            "nombre_aul"=>$this->input->post("nombre_aul"),
            "ubicacion_aul"=>$this->input->post("ubicacion_aul"),
            "fk_id_bloq"=>$this->input->post("fk_id_bloq")
          );

          if ($this->aula->insertar($datos)) {
            $this->session->set_flashdata('confirmacion','Aula registrada');
            redirect('aulas/gestionAulas');
          } else {
            $this->session->set_flashdata('error','Error registrado');
            redirect('aulas/gestionAulas');
          }

    }

    public function tabla(){
          $data["listadoAulas"]=$this->aula->obtenerTodos();

          $this->load->view('aulas/tabla',$data);

        }

      public function eliminarAula($id){

    if ($this->aula->eliminarPorId($id)) {
      $this->session->set_flashdata("confirmacion","Aula eliminado exitosamente");
      redirect('aulas/gestionAulas');
    }else {

      echo 'Error al eliminar';
    }
  }

  public function editar($id){
    $data['aulasEditar']=$this->aula->obtenerPorId($id);

    $this->load->view('encabezado');
    $this->load->view('aulas/editar',$data);
    $this->load->view('pie');
  }

  public function actualizarAulas(){
    $id_aul=$this->input->post('id_aul');
    //captura el id del cliente a EDITAR
    $datosEditados=array(
      "nombre_aul"=>$this->input->post("nombre_aul"),
      "ubicacion_aul"=>$this->input->post("ubicacion_aul")
    );
    if($this->aula->actualizar($id_aul,$datosEditados)){
      $this->session->set_flashdata("confirmacion","Generos actualizado exitosamente");
      redirect('aulas/gestionAulas');
    }else{
      $this->session->set_flashdata("confirmacion"," falla");
      echo "Error al actualizar";
    }
  }
}

?>
