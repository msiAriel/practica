<?php
  /**
   *
   */
  class Celulares extends CI_Controller{

    function __construct(){
      parent::__construct();
      $this->load->model('modelo');
    }

    public function gestionBloques(){
      $this->load->view('encabezado');
      $this->load->view('aulas/gestionAulas');
      $this->load->view('pie');
    }

    public function insertarDatos(){
      $datos=array(
        'nombre_cel'=$this->input->post('nombre_cel'),
        'apellido_cel'=$this->input->post('apellido_cel'),
        'cargo_cel'=$this->input->post('cargo_cel')
      );

      if ($this->aula->insertar($datos)) {
        $this->session->set_flashdata('confirmacion',"datos ingresados");
        redirect('clulares/gestionAulas');
      }else {
        $this->session->set_flashdata('error','error');
        redirect('aulas/gestionAulas');
      }
    }

    public function tabla(){
      $datos["listadoCelulares"]=$this->aula->obtenerTodos();
      $this->load->view('aulas/tabla');
    }
  }

 ?>
