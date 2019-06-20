<?php

namespace sis_ccc\Http\Controllers\Estudiante;

use Illuminate\Support\Facades\Auth as almLog;
use sis_ccc\ModeloCCC\RUDE;
use Illuminate\Http\Request;
use sis_ccc\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use sis_ccc\User;

use sis_ccc\libreriaCCC\queryCCC as qGECN;
use sis_ccc\libreriaCCC\fncCCC as fGECN;

class EstuController extends Controller {
    var $tieneLibew, $alum, $user, $Tar, $comprt, $lisCom, $lisAct, $almAct;
    function __get($name) {
        $this->tieneLib = almLog::user()->libreta;
        $this->alum     = almLog::user()->id;
        $this->user     = fGECN::obt_nombre();        
        $this->Tar      = qGECN::listTarEst($this->alum,5);
        $this->comprt   = qGECN::listCompEst($this->alum,5);  
        $this->lisCom   = qGECN::listComunicado(2,0); // tipo, cantidad 
        $this->lisAct   = qGECN::listActividad(5);
        $this->almAct   = qGECN::almAct($this->alum);                
   }
    public function index() {  
        $this->__get(1);
        return view('layouts_estudiante/view_estu', [
            'usuactivo' => $this->user,
            'libreta'   => $this->tieneLib,
            'tareas'    => $this->Tar,
            'comp'      => $this->comprt,
            'ListaC'    => $this->lisCom,
            'ListaA'    => $this->lisAct,
            'VerCont'   => $this->almAct,            
        ]);
    }
    /* ------------------------- */
    /* --- Ver Perfil --- */
    /* ------------------------- */
    public function indexPerfil(Request $req){
        $idAlm =  $req->Alumno;

        // $tieneLib = almLog::user()->libreta;
        // $alum     = almLog::user()->id;
        $tieneLib = User::find($idAlm)->libreta;       
        $alum     = User::find($idAlm);
        $alumNom  =  $alum->ape_paterno . ' ' .
                     $alum->ape_materno.', '.
                     $alum->nombre;
        

        $user     = fGECN::obt_nombre();        
        $Tar      = qGECN::listTarEst($idAlm,20);
        $comprt   = qGECN::listCompEst($idAlm,20);  
        $lisCom   = qGECN::listComunicado(2,20); // tipo, cantidad 
        $lisAct   = qGECN::listActividad(20);
        $almAct   = qGECN::almAct($idAlm);                

        return view('layouts_estudiante/view_estu_perfil', [
            'usuactivo' => $user,
            'libreta'   => $tieneLib,
            'tareas'    => $Tar,
            'comp'      => $comprt,
            'ListaC'    => $lisCom,
            'ListaA'    => $lisAct,
            'VerCont'   => $almAct, 
            'alumNom'   => $alumNom,  
            'alumId'    => $idAlm,         
        ]);
    }



    /* ------------------------- */
    public function verAgenda(){        
        $this->__get(1);
        return view('layouts_estudiante/view_estu_agenda', [
            'usuactivo' => $this->user,  
            'VerCont'   => $this->almAct,
        ]);
    }
    
    public function verActividades(){        
        $this->__get(1);
        $this->lisAct = qGECN::listActividad(0);
        
        return view('layouts_estudiante/view_estu_actividades', [
            'usuactivo' => $this->user,  
            'ListaC'    => $this->lisCom,
            'ListaA'    => $this->lisAct,
            'VerCont'   => $this->almAct,
            
        ]);
    }
    
    public function verComportamiento(){
        $this->__get(1);
        return view('layouts_estudiante/view_estu_comportamiento', [
            'usuactivo' => $this->user,
            'comp'   => qGECN::listCompEst($this->alum,0), 
            'VerCont'   => $this->almAct,
        ]);
    }
    
    public function Tareas_index(){
        $this->__get(1);
        $tarTot = qGECN::listTarEst($this->alum,0);
        return view('layouts_estudiante/view_estu_tareas', [
            'usuactivo' => $this->user,                           
            'tareas' => $tarTot,
            'VerCont' => $this->almAct,      
        ]);
    }
    
    public function verLibreta(){       
        $this->__get(1);
        
        $pathToFile = 'libretas/'.Auth::user()->libreta; // or txt etc.
        $fileNameFromStorage = rawurlencode(basename($pathToFile));
        $fileNameFromDatabase = rawurlencode('пожалуйста.pdf');
        return response()->file(storage_path($pathToFile), [
                'Content-Disposition' => str_replace('%name', $fileNameFromDatabase, "inline; filename=\"%name\"; filename*=utf-8''%name"),
                'Content-Type'        => Storage::getMimeType($pathToFile),]);                
    }
}
