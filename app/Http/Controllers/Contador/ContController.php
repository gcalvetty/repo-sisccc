<?php
namespace sis_ccc\Http\Controllers\Contador;

use Illuminate\Http\Request;
use sis_ccc\Http\Controllers\Controller;
use sis_ccc\ModeloCCC\Grd_Nivel;
use sis_ccc\libreriaCCC\queryCCC as qGECN;
use sis_ccc\libreriaCCC\fncCCC as fGECN;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContController extends Controller {

    public function index(Request $request) {
        $NivSel = ($request->grd_nivel!=null)?$request->grd_nivel:0;        
        $sql = new qGECN;
        $lGECN = $sql::listAlumnContador($request);
        $Niveles = Grd_Nivel::get();
        $user = fGECN::obt_nombre();
        return view('layouts_contador/view_cont', [
            'usuactivo' => $user,
            'Lista' => $lGECN,
            'Niveles' => $Niveles,
            'NivelSel' => $NivSel, 
        ]);        
    }

    public static function verTel($numTel) {        
        $expresionFijo = '/^[2|3|4][0-9]{6}$/';
        $expresionCel = '/^[6|7|8][0-9]{7}$/';
        $tel="".$numTel;                 
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
    
    /*
    * Cuaderno de Seguimiento 
    */    
    public function mostrarSeguimiento(Request $request) {    
        $usuId = Auth::user()->id;                
        $cuadSeg = DB::table('cuad_seg')
                   ->select('*')
                   ->where('user_id',$usuId)
                   ->orderBy('pc_fec', 'DESC')
                   ->paginate(5);
                
        return ['paginacion' =>[
                'total'     => $cuadSeg->total(),
                'act_pag'   => $cuadSeg->currentPage(),
                'por_pag'   => $cuadSeg->perPage(),
                'ult_pag'   => $cuadSeg->lastPage(),
                'de'        => $cuadSeg->firstItem(),
                'al'        => $cuadSeg->lastItem(),
                ],
                'lisCuaderno' => $cuadSeg,
        ];
    }

    public function guardarSeguimiento(Request $request){
        $usuId = Auth::user()->id;
        $fec = date("Y/m/d"); 
        DB::table('cuad_seg')->insert(
                ['user_id' => $usuId,
                 'pc_fec' => $fec,                 
                 'pc_desc' => $request->Seguimiento]
        );
        return 1;
    }
    public function borrarSeguimiento($id) {    
        DB::delete('delete from cuad_seg where pc_id=' . $id);
        return;
    }
    public function verCuaderno(Request $request) {
        $Niveles = Grd_Nivel::get();
        $NivSel = ($request->grd_nivel!=null)?$request->grd_nivel:0;
        $user   = fGECN::obt_nombre();             
        return view('layouts_sisccc/pagsis_cuaderno', [
            'usuactivo' => $user,            
            'Niveles' => $Niveles,
            'NivelSel' => $NivSel,            
        ]);
    }


}
