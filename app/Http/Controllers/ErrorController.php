<?php

namespace sis_ccc\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ErrorController extends Controller
{
    public function verRuta(Request $request){
        switch($request->session()->get("Ruta-Acceso"))
        {
            case "direccion":       
             return redirect()->Route('Dir.Reg');
            break;               
        } 
    }
    public function index(Request $request)
    {              
        $this->verRuta($request);        
        if($request->session()->has('Ruta-Acceso'))
        {                    
           return view('layouts_home/view_home');            
        }
        else{         
            $this->verRuta($request);
            Auth::logout();
            Session::flush(); 
            //return Redirect::route('homeCCC');
            return view('layouts_home/view_home');         // welcome
        }       
    }
}
