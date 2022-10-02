<?php

class Partido extends CI_Controller{

    public function r()
    {
        error_reporting(0);
        
        if(isset($_GET['fecha']) && $_GET['fecha']!=null){
            $this->load->model("Partido_model");
            $data['partidos']= $this->Partido_model->findByFecha($_GET['fecha']);
        }
        else{
        $this->load->model("Partido_model");
        $data['partidos']= $this->Partido_model->getAll();
        }
         frame($this, "partido/r", $data);
//         $this->load->view ( '_t/head',$datos );
//         $this->load->view ( '_t/header', $datos );
//         $this->load->view ( '_t/nav', $datos );
//         $this->load->view ( $rutaVista, $datos );
//         $this->load->view ( '_t/footer', $datos );
//         $this->load->view ( '_t/end' );
    }
    public function c()
    {
        error_reporting(0);
        $this->load->model("Equipo_model");
        $data['equipos'] = $this->Equipo_model->getAll();
        frame($this, "partido/c", $data);
    }

    public function cPost()
    {
        error_reporting(0);
        $nJornada = isset($_POST['nJornada']) ? $_POST['nJornada'] : null;
        $idVisitante = isset($_POST['idVisitante']) ? $_POST['idVisitante'] : null;
        $idLocal = isset($_POST['idLocal']) ? $_POST['idLocal'] : null;
        $gl = isset($_POST['gl']) ? $_POST['gl'] : null;
        $gv = isset($_POST['gv']) ? $_POST['gv'] : null;
        $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : null;

        try {
            
            if($gl==null || $gv==null|| $nJornada==null || $fecha==null ||$idLocal==null||$idVisitante==null){
                throw new Exception("No puede haber datos nulos");
            }
            
            if ($gl < 0 || $gv < 0) {
                throw new Exception("El resultado no puede ser menor que 0");
            }
            if ($nJornada < 1 || $nJornada > 50) {
                throw new Exception("La jornada tiene que estar entre los parametros 0 y 50");
            }
            if ($fecha == null) {
                throw new Exception("La fecha no puede estar vacia");
            }
            if ($idLocal == $idVisitante) {
                throw new Exception("No se puede enfrentar un equipo contra si mismo");
            }

            $this->load->model("Partido_model");

            $this->Partido_model->cPartido($nJornada,$idVisitante,$idLocal,$fecha,$gl,$gv);
            // redirect(base_url(),'equipo/r');
        } catch (Exception $e) {
            errorMsg($e->getMessage(), 'partido/c');
        }
    }
}

?>