<?php

namespace sis_ccc\Http\Controllers\Secretaria;

use Illuminate\Http\Request;
use sis_ccc\Http\Controllers\Controller;
use sis_ccc\ModeloCCC\Grd_Nivel;
use Illuminate\Support\Facades\DB;
use sis_ccc\libreriaCCC\queryCCC as qGECN;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\User;
use sis_ccc\libreriaCCC\fncCCC as fGECN;
use Carbon\Carbon;

class SecrController extends Controller {

    public static $gyear = "";

    public function __construct() {
        $dt = Carbon::now();
        self::$gyear = $dt->year;
    }

    public function index(Request $request) {
        $sql = new qGECN;
        $lGECN = $sql::listAlumn($request);
        $lGECNcnt = $sql::listAlumnXAul($request);
        $Niveles = Grd_Nivel::get();
        $user = fGECN::obt_nombre();
        $lgestion = self::$gyear;

        $lisCom = $sql::listComunicado(0, 5); // tipo, cantidad
        $lisAct = $sql::listActividad(5);

        return view('layouts_secretaria/view_secr', [
            'usuactivo' => $user,
            'Lista' => $lGECN,
            'Niveles' => $Niveles,
            'CantAlm' => $lGECNcnt,
            'Gestion' => $lgestion,
            'ListaC' => $lisCom,
            'ListaA' => $lisAct,
        ]);
    }

    /*
     * Reportes de Alumnos x Nivel
     */

    public function ReporteNivel(Request $request) {
        $sql = new qGECN;
        $sql::Reporte_Alumnos($request);
    }

    /*
     * Reportes RUDE completo
     */

    public function ReporteRude() {
        $sql = new qGECN;
        $sql::Reporte_RUDE();
    }

    /*
     * Reporte de Tareas por Curso: Seccion - Primaria - Secundaria
     */

    public function ReporteTareaNivel(Request $request) {

        $sql = new qGECN;
        $sql::Reporte_TareasNivel($request);
    }

    /*
     * Reportes de Apoyo
     */

    public function ReporteRegencia() {
        $sql = new qGECN;
        $sql::Reporte_Regencia();
    }

    public function ReporteComunicado() {
        $sql = new qGECN;
        $sql::Reporte_Comunicado();
    }

    public function ReportePsico() {
        $sql = new qGECN;
        $sql::Reporte_psico();
    }

    /*
     * ---- Agenda
     */

    public function verAgenda() {
        $user = fGECN::obt_nombre();
        $Niveles = Grd_Nivel::get();
        return view('layouts_secretaria/view_secr_agenda', [
            'usuactivo' => $user,
            'Niveles' => $Niveles,
        ]);
    }

    /*
     * ---- Calendario de Actividades
     */

    public function verActividades() {
        $user = fGECN::obt_nombre();
        $Niveles = Grd_Nivel::get();

        return view('layouts_secretaria/view_secr_actividades', [
            'usuactivo' => $user,
            'Niveles' => $Niveles,
        ]);
    }

    /*
     * ---- Actividades
     */

    public function verReportes() {
        $user = fGECN::obt_nombre();
        $Niveles = Grd_Nivel::get();
        $lgestion = self::$gyear;

        return view('layouts_secretaria/view_secr_reportes', [
            'usuactivo' => $user,
            'Niveles' => $Niveles,
            'Gestion' => $lgestion,
        ]);
    }

    /*
     * ---- Calendario de Actividades
     */

    public function mostrarCalActividad() {
        $sql = new qGECN;
        $lisCom = $sql::listActividad2();


        return $lisCom;
    }

    /*
     * ---- Acciones de Calendario de Actividades
     */

    public function store(Request $request) {
        $func = new fGECN;
        $fec = $func::setDateAttribute($request->act_fec);
        $fec2 = $func::setDateAttribute($request->act_fecfin);
        $this->validate($request, [
            'act_tit' => ' required',
            'act_fec' => 'required'
        ]);

        DB::table('cal_actividad')->insert(
                [
                    'act_titulo' => $request->act_tit,
                    'act_fec' => $fec,
                    'act_fecfin' => $fec2,
                ]
        );
        return;
    }

    public function destroy($id) {
        DB::delete('delete from cal_actividad where act_id=' . $id);
        return;
    }

    /*
     * Libretas
     */

    public function verlibreta(Request $request) {
        $sql = new qGECN;
        $lGECN = $sql::listAlumn($request);
        $lGECNcnt = $sql::listAlumnXAul($request);
        $lgestion = self::$gyear;
        $Niveles = Grd_Nivel::get();
        $user = fGECN::obt_nombre();

        return view('layouts_secretaria/view_secr_libreta', [
            'usuactivo' => $user,
            'Lista' => $lGECN,
            'Niveles' => $Niveles,
            'CantAlm' => $lGECNcnt,
            'Gestion' => $lgestion,
            'Grd' => 0,
        ]);
    }

    public function editlibreta(Request $request) {
        $sql = new qGECN;
        $lGECN = $sql::listAlumn($request);
        $lGECNcnt = $sql::listAlumnXAul($request);
        $lgestion = self::$gyear;
        $Niveles = Grd_Nivel::get();
        $user = fGECN::obt_nombre();
        return view('layouts_secretaria/view_secr_libreta_sub', [
            'usuactivo' => $user,
            'Lista' => $lGECN,
            'Niveles' => $Niveles,
            
            'Gestion' => $lgestion,
            'IdAlum' => $request->alumno,
        ]);
    }

    public function storeLibreta(Request $request) {
        $validatedData = $request->validate([
            'ArcPdf' => 'required|file|mimes:pdf',
        ]);

        if ($request->file('ArcPdf')) {
            //--- almacebar Libreta del estudiante
            $alm = User::find($request->idAlum);
            $ruta= 'uploads/'.$alm->tipo_Usu.'/'.$request->idAlum.'';
            $path = Storage::disk('publicLib')->putFileAs($ruta, $request->file('ArcPdf'),'libreta-'.self::$gyear.'.pdf');
            $alm->libreta = asset($path);
            $alm->save();            
        }
        return redirect()->route('Secr.libreta')->with('info', 'Guardado Correctamente');
    }
    /*
    * Avatar
    */
    public function verAvatar(Request $request){
        $sql = new qGECN;
        $lGECN = $sql::listAlumn($request);
        $lGECN2 = $sql::listUsu($request);        
        $lgestion = self::$gyear;        
        $user = fGECN::obt_nombre();

        return view('layouts_secretaria/view_secr_avatar', [
            'usuactivo' => $user,
            'Lista' => $lGECN,
            'Lista2' => $lGECN2,
            'Gestion' => $lgestion,
            'Grd' => 0,
        ]);
    }
    public function editAvatar(Request $request) {
        $sql = new qGECN;
        $lgestion = self::$gyear;        
        $user = fGECN::obt_nombre();
        $usuNom = fGECN::usuNom($request->idUsu);
        
        return view('layouts_secretaria/view_secr_avatar_sub', [
            'usuactivo' => $user,
            'Gestion' => $lgestion,
            'idUsu' => $request->idUsu,
            'usuNombre' => $usuNom, 
        ]);
    }
    public function storeAvatar(Request $request){
        $image_file = $request->imgAvatar;
        list($type, $image_file) = explode(';', $image_file);
        list(, $image_file)      = explode(',', $image_file);
        $image_file = base64_decode($image_file);
        $image_name= 'avatar-'.self::$gyear.'.png';

        $usuAva = User::find($request->idUsu);   
        $rutaImg = 'uploads/'.$usuAva->tipo_Usu.'/'.$request->idUsu.'/'.$image_name;       
        $usuAva->avatar = asset($rutaImg);
        $usuAva->save();        
        
        //Funciona ->         
        Storage::disk('publicLib')->put($rutaImg, $image_file);
        
        return response()->json([$request->all()]);          
    }

}
