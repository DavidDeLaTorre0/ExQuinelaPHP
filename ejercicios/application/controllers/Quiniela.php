<?php
Class Quiniela extends CI_Controller{
    

    public function jornadas(){
        error_reporting(0);
        $this->load->model('Partido_model');
        $data['nJornadas']=$this->Partido_model->getByNJornadas();;
        frame($this,'quiniela/jornadas',$data);
    }
    
    public function partidos(){
        error_reporting(0);
        $nJornada= isset($_GET['nJornada'])? $_GET['nJornada'] : null;
        
        $this->load->model('Partido_model');
        $data['partidos']=$this->Partido_model->getByNJornada($nJornada);
        $data['nJornadas'] = $nJornada;
        frame($this,'quiniela/partidos',$data);
    }
}
?>