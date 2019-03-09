<?php

namespace sis_ccc\Http\Controllers\Regente;

use Illuminate\Http\Request;
use PDF;
use sis_ccc\Http\Controllers\Controller;
use sis_ccc\ModeloCCC\Grd_Nivel;
use sis_ccc\libreriaCCC\queryCCC as qGECN;
use sis_ccc\libreriaCCC\fncCCC as fGECN;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use sis_ccc\User;

use Illuminate\Support\Facades\Auth;



class RegeController extends Controller {
    /*
     * Obtener fecha para la BD
     */
    public function getDateAttribute($value) {
        return Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y');
    }

    public function setDateAttribute($value) {
        return Carbon::createFromFormat('d/m/Y', $value)->toDateString();
    }

    /*
     * ----------------------
     */

    public function index(Request $request) {
        $sql = new qGECN;
        $lGECN = $sql::listAlumn($request);
        $lComp = $sql::listComp();
        $NivSel = $request->grd_nivel;
        $Niveles = Grd_Nivel::find(["2", "3"]);
        $user = fGECN::obt_nombre();

        

        return view('layouts_regente/view_rege', [
            'usuactivo' => $user,
            'Lista' => $lGECN,
            'ListaComp' => $lComp,
            'Niveles' => $Niveles,
            'NivSel' => $NivSel
        ]);
    }

    public function comportamiento(Request $request) {
        $sql = new qGECN;
        $NivSel = $request->grd_nivel;
        $lGECN = $sql::listAlumnComportamiento($NivSel);
        $Niveles = Grd_Nivel::find(["2", "3"]);
        $user = fGECN::obt_nombre();
        
        return view('layouts_regente/view_rege_comportamiento', [
            'usuactivo' => $user,
            'Lista' => $lGECN,
            'Niveles' => $Niveles,
            'NivSel' => $NivSel
        ]);
    }

    /*
     * CRUD
     */

    public function insComportamiento(Request $req) {
        $data = $req->all();
        $dateBD = $this->setDateAttribute($data['fec']);
        DB::Table('reg_comportamiento')->insert(
                ['user_id' => $data['AlmId'],
                    'reg_tipComp' => $data['tarSelMem'],
                    'reg_tipTarj' => $data['tarSel'],
                    'reg_obser' => $data['editor'],
                    'reg_fec' => $dateBD
                ]
        );
        return redirect()->route('Rege.Reg')->withSuccess('OK');
    }

    public function delComportamiento(Request $req) {
        $data = $req->all();        
        $eliDocente = DB::delete('Delete '
                        . ' From reg_comportamiento'
                        . ' where reg_id=' . $req->AlmId);
        return redirect()->route('Rege.Comp')->withSuccess('OK');
    }
    
    static function haveComportamiento($AlmId){
        
        $comprt = qGECN::listCompEst($AlmId,0);
        $totReg = count($comprt);        
        return $totReg;        
        
    }
    public function PDFComportamiento(Request $req) {                      
        
        // $pdf = PDF::loadHTML('welcome2')->setPaper('a4', 'landscape')->setWarnings(false)->save('myfile.pdf');
        $comprt = qGECN::listCompEst($req->AlmId,0);
        $datAlm = User::find($req->AlmId);
        
        $pdf = PDF::loadView("layouts_reportes.pagsis_comportamiento_pdf", [
            'alumno' => $datAlm->nombre." ".$datAlm->ape_paterno." ".$datAlm->ape_materno,
            'comp'   => $comprt,            
        ]);        
        return $pdf->stream(); // download - stream
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
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
            'NivSel' => $NivSel,            
        ]);
    }

}
