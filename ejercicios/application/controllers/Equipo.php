<?php 
class Equipo extends CI_Controller{

    public function r()
    {
        error_reporting(0);
        $this->load->model("Equipo_model");
        $data['equipos']=$this->Equipo_model->getAll();
        frame($this,"equipo/r",$data);
    }

    public function c()
    {
        frame($this,"equipo/c");
    }

    public function cPost()
    {
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;

        if ($nombre == null || $nombre =='' || $nombre==' ') {
            errorMsg("El nombre del equipo no puede ser nulo");
        }
        $this->load->model("Equipo_model");

        try {
            $this->Equipo_model->cEquipo($nombre);
            //redirect(base_url(),'equipo/r');
            
        } catch (Exception $e) {
            errorMsg($e->getMessage(), 'equipo/c');
        }
 
    }
}
?>
