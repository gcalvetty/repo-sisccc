<?php

namespace sis_ccc\Http\Controllers\Psico;

use Illuminate\Http\Request;
use sis_ccc\Http\Requests;
use sis_ccc\Http\Controllers\Controller;
use sis_ccc\ModeloCCC\Grd_Nivel;
use sis_ccc\libreriaCCC\queryCCC as qGECN;
use sis_ccc\libreriaCCC\fncCCC as fGECN;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PsicoController extends Controller {
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

        $Niveles = Grd_Nivel::get();
        $user = fGECN::obt_nombre();

        return view('layouts_psico/view_psico_new', [
            'usuactivo' => $user,
            'Lista' => $lGECN,
            'ListaComp' => $lComp,
            'Niveles' => $Niveles,
        ]);
    }

    public function comportamiento() {
        $sql = new qGECN;
        $lGECN = $sql::listAlumnComportamientoPsico();        

        $Niveles = Grd_Nivel::get();
        $user = fGECN::obt_nombre();

        return view('layouts_psico/view_psico_comportamiento', [
            'usuactivo' => $user,
            'Lista' => $lGECN,            
            'Niveles' => $Niveles,
        ]);
    }
    
    /*
     * CRUD
     */
    public function insComportamiento(Request $req) {        
        $validatedData = $req->validate([
            'editor' => 'required',
            'ArcDoc' => 'required|file|mimes:pdf,docx',
        ]);
        $file = $req->file('ArcDoc');
                
        
        $data = $req->all();
        $dateBD = $this->setDateAttribute($data['fec']);
        $ruta= fGECN::constRuta(4, $req->AlmId, $req->file('ArcDoc'));  
        $path = Storage::disk('publicLib')->putFileAs($ruta, $req->file('ArcDoc'),'psico'.$dateBD.'.'.$file->extension()); 

        DB::Table('psico_comportamiento')->insert(
                ['user_id' => $data['AlmId'],                    
                 'reg_obser' => $data['editor'],
                 'reg_fec' => $dateBD,
                 'reg_doc' => asset($path),
                ]
        );
        return redirect()->route('Psico.Reg')->withSuccess('OK');
    }
    
    public function delComportamiento(Request $req) {
        $data = $req->all();

        $usuReg = DB::select('select * '
                        . ' From psico_comportamiento'
                        . ' where reg_id=' . $req->AlmId);        

        $ruta= fGECN::constRuta(4, $usuReg[0]->user_id, '').'/'; 
        $rutaFileURL  = $usuReg[0]->reg_doc;
        $rutaNomb = explode($usuReg[0]->user_id."/", $rutaFileURL);                             
        $borrFile = $ruta."".$rutaNomb[1];        
        Storage::disk('publicLib')->delete($borrFile);
                                
        $eliDocente = DB::delete('Delete '
                        . ' From psico_comportamiento'
                        . ' where reg_id=' . $req->AlmId);                                        
        return redirect()->route('Psico.Comp')->withSuccess('OK');

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
            'NivelSel' => $NivSel,            
        ]);
    }

}
