<?php

namespace sis_ccc\Http\Controllers;


use sis_ccc\libreriaCCC\queryCCC as qGECN;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    
    /*
     * Actividades
     */
    public function actividades(){
        $this->lisAct = qGECN::listActividad(0);
        return view('layouts_home/view_home_actividad',['ListaA'    => $this->lisAct]);        
    }
    
    /*
     * Comunicados
     */
    public function Comunicado(){
         $this->lisComu = qGECN::listComunicado(2, 0); // 2: estudiantes - 1: docentes
        return view('layouts_home/view_home_comunicado',['ListaC' => $this->lisComu]);        
    }
    
    /*
     * Examenes
     */
    public function Examenes(){
        return "Actividades3";        
    }
    
    /*
     * Menu
     */
    public function Menu(){
        return "Actividades4";        
    }
    
}
