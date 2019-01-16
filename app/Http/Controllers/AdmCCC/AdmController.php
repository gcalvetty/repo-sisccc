<?php

namespace sis_ccc\Http\Controllers\AdmCCC;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use sis_ccc\Http\Requests;
use sis_ccc\Http\Controllers\Controller;

use Carbon\Carbon;
use sis_ccc\ModeloCCC\Grd_Nivel;
use sis_ccc\libreriaCCC\queryCCC as qGECN;
use sis_ccc\libreriaCCC\fncCCC as fGECN;

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
}
