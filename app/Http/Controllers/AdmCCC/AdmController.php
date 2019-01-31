<?php

namespace sis_ccc\Http\Controllers\AdmCCC;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use sis_ccc\Http\Requests;
use sis_ccc\Http\Controllers\Controller;

use Carbon\Carbon;
use sis_ccc\ModeloCCC\Grd_Nivel;
use sis_ccc\libreriaCCC\queryCCC as qGECN;
use sis_ccc\libreriaCCC\fncCCC as fGECN;
use Illuminate\Support\Facades\Storage;

class AdmController extends Controller
{
    public static $gyear = "";

    public function __construct() {
        $dt = Carbon::now();
        self::$gyear = $dt->year;
    }
    public function index(Request $request) {
        $sql = new qGECN;
        $Niveles = Grd_Nivel::get();
        $user = fGECN::obt_nombre();
        $lGECNcnt = $sql::listAlumnXAul($request);
        $lGECN = qGECN::listAlumn($request);
        $lgestion = self::$gyear;
        return view('layouts_adminsuper/view_admin', [
            'usuactivo' => $user,
            'Lista'   => $lGECN, 
            'Niveles' => $Niveles,
            'CantAlm' => $lGECNcnt,
            'Gestion' => $lgestion,
        ]);        
    }
    /*
    *  Usuarios
    */
    public function usuarios(Request $request){
        $sql = new qGECN;
        $Niveles = Grd_Nivel::get();
        $user = fGECN::obt_nombre();
        $lGECN = $sql::listUsu($request);  
        $lgestion = self::$gyear;
        return view('layouts_adminsuper/view_admin_usuario', [
            'usuactivo' => $user,
            'Lista'   => $lGECN,            
            
            'Gestion' => $lgestion,
        ]);
    }
    
    /*
    * Borrar Usuarios
    */
    public function bajausuario($id){
        $userDel = DB::select('select * from users where id = ?', [$id]);        
        $msg =array("No debe borrar este Usuario!!!","Se dio de baja al Usuario :", "No exite ese usuario en nuestros registros");
        if(sizeof($userDel)!= 0){
            // _ no borrar Administradores
            if($userDel[0]->tipo_Usu=='SuperAdm'){                    
                return redirect()->route('AdmCCC.usuReg')->with('warning', $msg[0]);
                //dd('No se puede dar de baja a un Super Administrador');
            }
            // _ Dar de baja
            else{                
                // ---- Borramos todos sus datos en disco ----
                $ruta= fGECN::constRuta(4, $id, ''); 
                $rutaAux = str_replace ( '/' , "\\" , $ruta."_a");    
                
                $dir = Storage::disk('publicLib')->files($rutaAux);
                if (sizeof($dir)>0) {  
                    Storage::disk('publicLib')->deleteDirectory($rutaAux);  
                    } 
                // ---- Eliminacion Exitosa ----    
                DB::delete('delete from users where id = ?', [$id]);
                return redirect()->route('AdmCCC.usuReg')->with('success', $msg[1])
                                                         ->with('usuario', $userDel[0]->email);
            }
        }
        // _ no hay usuario con es ID
        return redirect()->route('AdmCCC.usuReg')->with('warning', $msg[2]);
    }

    
}
