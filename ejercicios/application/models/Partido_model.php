<?php
class Partido_model extends CI_Model{
    
    public function findByFecha($fecha){
        return R::find('partido','fecha=?',[$fecha]);
        
    }
    
    /**
     *
     *  DEVUELVE UN ARRAY DE JORNADAS QUE SE HAN JUGADO
     *
     */
    public function getByNJornadas(){
        $partidos= R::findAll('partido');
        $jornadas=[];
        
        //recorremos la lista de partidos para sacar su jornada
        foreach($partidos as $partido){
            $nJornada = $partido->nJornada;
            
            //Comnprobamos que el numeor de la jornada NO esta en el array jornadas
            if(!in_array($nJornada, $jornadas)){
                //Si no se encuentra en el arraybse lo introucmos
                $jornadas[]= $nJornada;
            }
            
        }
        
        return $jornadas;
    }
    
    /**
     *  partidos jugados en una jornada
     */
    public function getByNJornada($nJornada){
        //MIRAR COMO ESTA ESCRITO EN LA BBDD YA QUE LA ANOTACION CAMELLO LA CAMBIA
        return R::find('partido','n_jornada=? order by fecha',[$nJornada]);
        
    }
    

    
    
    public function cPartido($nJornada,$idVisitante,$idLocal,$fecha,$gl,$gv){
        
        if(R::load('equipo',$idLocal)->id == 0 || R::load('equipo',$idVisitante)->id == 0){
            throw new Exception("Id de equipo desconocido");
        }
        
        $partido = R::dispense("partido");
        $partido->nJornada=$nJornada;
        $partido->fecha=$fecha;
        $partido->gl=$gl;
        $partido->gv=$gv;
        
        //La relaccion de su eq con el id de ese equ
        $partido->local = R::load('equipo',$idLocal);
        $partido->visitante = R::load('equipo',$idVisitante);
        R::store($partido);
        infoMsg("El partido con numero de jornada {$partido->nJornada} se ha insertado correctamente");
        }
    
        public function getAll(){
            return R::findAll('partido');
        }
        
        

}