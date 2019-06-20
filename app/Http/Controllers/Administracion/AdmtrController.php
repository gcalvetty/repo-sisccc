<?php

namespace sis_ccc\Http\Controllers\Administracion;

use Carbon\Carbon;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use sis_ccc\Http\Controllers\Controller;
use sis_ccc\libreriaCCC\fncCCC as fGECN;
use sis_ccc\libreriaCCC\queryCCC as qGECN;
use sis_ccc\ModeloCCC\Grd_Nivel;
use sis_ccc\ModeloCCC\RUDE;
use sis_ccc\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdmtrController extends Controller {

    public static $gyear = "";

    public function __construct() {
        $dt = Carbon::now();
        self::$gyear = $dt->year;
    }

    public function index(Request $request) {        
        $sql = new qGECN;
        $lGECN = $sql::listAlumnContador($request);
        $lGECNcnt = $sql::listAlumnXAul($request);
        $lGECNInc = $sql::sqlInscXdia($request);
        $lgestion = self::$gyear;

        if (!$request->session()->exists('userConectado')) {
            $Niveles = Grd_Nivel::get();
            $user = fGECN::obt_nombre();
            $request->session()->put('Niveles', $Niveles);
            $request->session()->put('userConnectado', $user);
        } else {
            $Niveles = Session::get('Niveles');
            $user = Session::get('userConnectado');
        }

        return view('layouts_administracion/view_admtr', [
            'usuactivo' => $user,
            'Lista' => $lGECN,
            'Niveles' => $Niveles,
            'CantAlm' => $lGECNcnt,
            'CantAlmIns' => $lGECNInc,
            'Gestion' => $lgestion,
        ]);
    }

    /*
     * Profesores
     */

    public function verProfesor(Request $request) {
        $sql = new qGECN;
        $user = fGECN::obt_nombre();
        $Niveles = Grd_Nivel::get();

        $listDoc = $sql::list_Docentes($request->grd_nivel);
        return view('layouts_administracion/view_admtr_profesor', [
            'usuactivo' => $user,
            'Niveles' => $Niveles,
            'Lista' => $listDoc,
        ]);
    }

    public function listDocentes() {
        $sql = new qGECN;
        $user = fGECN::obt_nombre();
        $Niveles = Grd_Nivel::get();
        $listDoc_noAsg = $sql::list_Docentes_sinA();
        $listDoc_Sen = $sql::list_Docentes(1);
        $listDoc_Pri = $sql::list_Docentes(2);
        $listDoc_Sec = $sql::list_Docentes(3);
        $listDoc_Tll = $sql::list_Docentes(4);
        return view('layouts_administracion/view_admtr_docente', [
            'usuactivo' => $user,
            'Niveles' => $Niveles,
            'l0' => $listDoc_noAsg,
            'l4' => $listDoc_Tll,
            'l1' => $listDoc_Sen,
            'l2' => $listDoc_Pri,
            'l3' => $listDoc_Sec,
            'Grd' => 0,
        ]);
    }

    /*
     * ---- Alumnos
     */

    public function verAlumnos(Request $request) {
        $sql = new qGECN;
        $user = fGECN::obt_nombre();
        $Niveles = Grd_Nivel::get();
        $lGECN = $sql::listAlumn($request);
        return view('layouts_administracion/view_admtr_alumnos', [
            'usuactivo' => $user,
            'Niveles' => $Niveles,
            'Lista' => $lGECN,
        ]);
    }

    public function listAlumnos(Request $request) {
        $sql = new qGECN;
        $user = fGECN::obt_nombre();
        $Niveles = Grd_Nivel::get();
        $lGECN = $sql::listAlumn($request);
        return view('layouts_administracion/view_admtr_alumnos', [
            'usuactivo' => $user,
            'Niveles' => $Niveles,
            'Lista' => $lGECN,
        ]);
    }

    /* ----------- */

    public function AlumnoImprimir(RUDE $alumno) {
        $sql = new qGECN;
        $retInf = $sql::sqlImprRude($alumno);

        return view('layouts_imprimir/view_rude_imprimir', ['datos' => $retInf[1],
            'gestion' => collect($retInf[2]), 'lugnac' => collect($retInf[3]),
            'dir' => collect($retInf[4]), 'idioma' => collect($retInf[5]),
            'salud' => collect($retInf[6]), 'serBas' => collect($retInf[7]),
            'activ' => collect($retInf[8]), 'net' => collect($retInf[9]),
            'transp' => collect($retInf[10]), 'tutor' => collect($retInf[11]),
        ]);
    }

    /*
     * ---- Agenda
     */

    public function verAgenda() {
        $user = fGECN::obt_nombre();
        $Niveles = Grd_Nivel::get();
        return view('layouts_administracion/view_admtr_agenda', [
            'usuactivo' => $user,
            'Niveles' => $Niveles,
        ]);
    }

    /*
     * ---- Actividades
     */

    public function verActividades() {
        $user = fGECN::obt_nombre();
        $Niveles = Grd_Nivel::get();
        return view('layouts_administracion/view_admtr_actividades', [
            'usuactivo' => $user,
            'Niveles' => $Niveles,
        ]);
    }
    
    /* ----- Actividades Secretaria -----*/
    public function secActividades() {
        $user = fGECN::obt_nombre();
        $Niveles = Grd_Nivel::get();
        return view('layouts_administracion/view_admtr_secactividades', [
            'usuactivo' => $user,
            'Niveles' => $Niveles,
        ]);
    }
    public function mostrarCalActividad() {
        $sql = new qGECN;
        $lisCom  = $sql::listActividad2();
        return $lisCom;
    }


    /*
     * ---- Comportamiento
     */

    public function regecomportamiento(Request $request) {
        $sql = new qGECN;
        $lGECN = $sql::listAlumn($request);
        $lComp = $sql::listComp();
        $NivSel = $request->grd_nivel;
        $Niveles = Grd_Nivel::find(["1", "2","3", "4"]);
        $user = fGECN::obt_nombre();
        return view('layouts_administracion/view_admtr_alumcomportamiento', [
            'usuactivo' => $user,
            'Lista' => $lGECN,
            'ListaComp' => $lComp,
            'Niveles' => $Niveles,
            'NivSel' => $NivSel
        ]);
    }
    public function PDFComportamiento(Request $req) {
        $comprt = qGECN::listCompEst($req->AlmId,0);
        $datAlm = User::find($req->AlmId);
        
        $pdf = PDF::loadView("layouts_reportes.pagsis_comportamiento_pdf", [
            'alumno' => $datAlm->nombre." ".$datAlm->ape_paterno." ".$datAlm->ape_materno,
            'comp'   => $comprt,            
        ]);        
        return $pdf->stream(); // download - stream
        
       /* 
       $comprt = qGECN::listCompEst($req->AlmId,0);
       $datAlm = User::find($req->AlmId);
       return view('layouts_reportes.pagsis_comportamiento_pdf', [
            'alumno' => $datAlm->nombre." ".$datAlm->ape_paterno." ".$datAlm->ape_materno,
            'comp'   => $comprt,            
        ]);
       */
    } 
    
    /* ----------- Psicologa ------ */
    public function Psicomportamiento() {
        $sql = new qGECN;
        $lGECN = $sql::listAlumnComportamientoPsico();        

        $Niveles = Grd_Nivel::get();
        $user = fGECN::obt_nombre();

        return view('layouts_administracion/view_admtr_psicocomportamiento', [
            'usuactivo' => $user,
            'Lista' => $lGECN,            
            'Niveles' => $Niveles,
        ]);
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
