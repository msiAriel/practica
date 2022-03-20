<?php

class Bloques extends CI_Controller{

  function __construct(){
    parent::__construct();
    $this->load->model('aula');
    $this->load->model('bloque');
  }

  public function gestionBloques(){
    $this->load->view('encabezado');
    $this->load->view('bloques/gestionBloques');
    $this->load->view('pie');
  }

  public function insertarBloques(){
          $datos=array(
            // captura los datos que trae del formulario
            "nombre_bloq"=>$this->input->post("nombre_bloq"),
            "fecha_bloq"=>$this->input->post("fecha_bloq")
          );

          if ($this->bloque->insertar($datos)) {
            $this->session->set_flashdata('confirmacion','Aula registrada');
            redirect('bloques/gestionBloques');
          } else {
            $this->session->set_flashdata('error','Error registrado');
            redirect('bloques/gestionBloques');
          }

    }
    public function insertarBloques1(){
            $datos=array(
              // captura los datos que trae del formulario
              "nombre_bloq"=>$this->input->post("nombre_bloq"),
              "fecha_bloq"=>$this->input->post("fecha_bloq")
            );

            if ($this->bloque->insertar($datos)) {
              $this->session->set_flashdata('confirmacion','Aula registrada');
              redirect('aulas/gestionAulas');
            } else {
              $this->session->set_flashdata('error','Error registrado');
              redirect('aulas/gestionAulas');
            }

      }

    public function listado(){
          $data["listadoBloques"]=$this->bloque->obtenerTodos();
          // $this->load->view('encabezado');
          $this->load->view('bloques/tabla', $data);
          // $this->load->view('pie');

        }

      public function eliminarBloques($id){

    if ($this->bloque->eliminarPorId($id)) {
      $this->session->set_flashdata("confirmacion","Bloque eliminado exitosamente");
      redirect('bloques/gestionBloques');
    }else {

      echo 'Error al eliminar';
    }
  }

  public function editar($id){
    $data['bloquesEditar']=$this->bloque->obtenerPorId($id);
    // $data['listadoClientes']=$this->cliente->obtenerTodos();
    // $data['listadoPeliculas']=$this->pelicula->obtenerTodos();
    //Cargando la vista index
    //carpeta/archivo
    $this->load->view('encabezado');
    $this->load->view('bloques/editar',$data);
    $this->load->view('pie');
  }

  public function actualizarBloques(){
    $id_bloq=$this->input->post('id_bloq');//captura el id del cliente a EDITAR
    $datosEditados=array(
      "nombre_bloq"=>$this->input->post("nombre_bloq"),
      "fecha_bloq"=>$this->input->post("fecha_bloq")
    );
    if($this->bloque->actualizar($id_bloq,$datosEditados)){
      $this->session->set_flashdata("confirmacion","Generos actualizado exitosamente");
      redirect('bloques/gestionBloques');
    }else{
      $this->session->set_flashdata("confirmacion"," falla");
      echo "Error al actualizar";
    }
  }

  // funcion para validar que no se repitan los bloques
  public function validarBloque(){
  $nombre_bloq=$this->input->post('nombre_bloq');
  $bloqueExistente=$this->bloque->consultarBloquePorNombre($nombre_bloq);
  if ($bloqueExistente) {
    echo json_encode(false);
  } else {
    echo json_encode(true);
  }

}
}

?>
