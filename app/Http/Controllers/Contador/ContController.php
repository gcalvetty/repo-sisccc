<?php

namespace sis_ccc\Http\Controllers\Contador;

use Illuminate\Http\Request;
use sis_ccc\Http\Controllers\Controller;
use sis_ccc\ModeloCCC\Grd_Nivel;
use sis_ccc\libreriaCCC\queryCCC as qGECN;
use sis_ccc\libreriaCCC\fncCCC as fGECN;

class ContController extends Controller {

    public function index(Request $request) {

        $sql = new qGECN;
        $lGECN = $sql::listAlumnContador($request);
        $Niveles = Grd_Nivel::get();
        $user = fGECN::obt_nombre();
        return view('layouts_contador/view_cont', [
            'usuactivo' => $user,
            'Lista' => $lGECN,
            'Niveles' => $Niveles,
        ]);
    }

    public static function verTel($numTel) {
        
        $expresionFijo = '/^[2|3|4][0-9]{6}$/';
        $expresionCel = '/^[6|7|8][0-9]{7}$/';
        $tel="".$numTel;
        
         //dd(preg_match($expresionFijo, '75498977')."<->".preg_match($expresionCel, '75498977'));
        if (is_numeric($numTel)) {           
            if (preg_match($expresionFijo, $numTel)>0) {
             $tel = $numTel;   
            }

            if (preg_match($expresionCel, $numTel)>0) {
             $tel = '<a href="https://wa.me/591'.$numTel.'?text=C.C.C Urgente!!!" target="_blanck"><i class="fa fa-whatsapp" aria-hidden="true"></i> '.$numTel.'</a>';
            }
        }
        return ($tel=="0")? "-":$tel;
    }

}
