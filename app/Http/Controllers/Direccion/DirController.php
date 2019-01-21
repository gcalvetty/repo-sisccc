<?php

namespace sis_ccc\Http\Controllers\Direccion;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use sis_ccc\Http\Controllers\Controller;
use sis_ccc\libreriaCCC\fncCCC as fGECN;
use sis_ccc\libreriaCCC\queryCCC as qGECN;
use sis_ccc\ModeloCCC\Grd_Nivel;
use sis_ccc\ModeloCCC\Perfil;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\User;

class DirController extends Controller
{

    public static $gyear = "";

    public function __construct()
    {
        $dt          = Carbon::now();
        self::$gyear = $dt->year;
    }
    
    /*
     * Subir Libreta
     */
    public function verlibreta(Request $request) {
        $sql = new qGECN;
        $lGECN = $sql::listAlumn($request);
        $lGECNcnt = $sql::listAlumnXAul($request);
        $lgestion = self::$gyear;
        $Niveles = Grd_Nivel::get();
        $user = fGECN::obt_nombre();

        return view('layouts_direccion/view_dir_libreta', [
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
        return view('layouts_direccion/view_dir_libreta_sub', [
            'usuactivo' => $user,
            'Lista' => $lGECN,
            'Niveles' => $Niveles,
            'CantAlm' => $lGECNcnt,
            'Gestion' => $lgestion,
            'IdAlum' => $request->alumno,
            'Grd' => 0
        ]);
    }
    
     public function storeLibreta(Request $request) {
        $validatedData = $request->validate([
            'ArcPdf' => 'required|file|mimes:pdf',
        ]);


        if ($request->file('ArcPdf')) {
           $path = Storage::disk('publicLib')->putFileAs('uploads/alumno-' . $request->idAlum , $request->file('ArcPdf'),'libreta-'.self::$gyear.'.pdf');                        
            $alm = User::find($request->idAlum);
            $alm->libreta = asset($path);
            $alm->save();
        }
        return redirect()->route('Dir.libreta')->with('info', 'Guardado Correctamente');
    }
    
    /*
     * INDEX
     */

    public function index(Request $request)
    {
        $sql      = new qGECN;
        $lGECN    = $sql::listAlumn($request);
        $lGECNcnt = $sql::listAlumnXAul($request);
        $Niveles  = Grd_Nivel::get();
        $user     = fGECN::obt_nombre();
        $lgestion = self::$gyear;               

        $lisCom = $sql::listComunicado(0,5); // tipo, cantidad
        $lisAct = $sql::listActividad(5);

        return view('layouts_direccion/view_dir', [
            'usuactivo' => $user,
            'Lista'     => $lGECN,
            'Niveles'   => $Niveles,
            'Grd'       => $request->grd_nivel,
            'CantAlm'   => $lGECNcnt,
            'Gestion'   => $lgestion,
            'ListaC'    => $lisCom,
            'ListaA'    => $lisAct,
        ]);
    }

    public function perfil()
    {
        $user        = fGECN::obt_nombre();
        $Niveles     = Grd_Nivel::get();
        $rutaActl    = 'Dir.perfil.actl';
        $rutaActlFot = 'Dir.perfil.actl.fot';
        return view('layouts_perfil/view_perfil', ['usuactivo' => $user,
            'Niveles'                                              => $Niveles,
            'ruta1'                                                => $rutaActl,
            'ruta2'                                                => $rutaActlFot,
        ]);
    }

    public function perfil_Actl(Request $request)
    {
        Perfil::updateOrCreate($request);
        return redirect()->to('DirController@perfil');
    }

    public function perfil_Actl_Fot()
    {
        return 'Actualizar Foto';
    }

    /*
     * ---- Direccion ----
     */

    public function listDocentes()
    {
        $sql           = new qGECN;
        $user          = fGECN::obt_nombre();
        $Niveles       = Grd_Nivel::get();
        $listDoc_noAsg = $sql::list_Docentes_sinA();
        $listDoc_Sen   = $sql::list_Docentes(1);
        $listDoc_Pri   = $sql::list_Docentes(2);
        $listDoc_Sec   = $sql::list_Docentes(3);
        $listDoc_Tll   = $sql::list_Docentes(4);
        return view('layouts_direccion/view_dir_docente', [
            'usuactivo' => $user,
            'Niveles'   => $Niveles,
            'l0'        => $listDoc_noAsg,
            'l4'        => $listDoc_Tll,
            'l1'        => $listDoc_Sen,
            'l2'        => $listDoc_Pri,
            'l3'        => $listDoc_Sec,
            'Grd'       => 0,
        ]);
    }

    public function asignarMaterias(Request $req)
    {
        $mater    = "";
        $curso    = "";
        $contador = 0;

        $this->validate($req, [
            'DocId' => ' required',
        ]);

        DB::table('prof_materia')->where('user_id', '=', $req->DocId)->delete();

        foreach ($req->request as $key => $val) {
            if (is_array($val)) {
                foreach ($val as $key1 => $val2) {
                    $curso .= $val2 . ",";
                }
                if ($mater != "") {
                    $insDocente = DB::table('prof_materia')->insert(
                        ['user_id' => $req->DocId,
                            'gmat_id'  => $mater,
                            'grd_id'   => $curso,
                        ]);
                    $mater = "";
                    $curso = "";
                    $contador++;
                }
            } else {
                $mater = "" . $val;
                $curso = "";
            }
        }
        return redirect()->route('Dir.Doc')->withSuccess('Se guardo el registro Correctamente!!!');
    }

    /*
     * ---- Agenda
     */

    public function verAgenda()
    {
        $user    = fGECN::obt_nombre();
        $Niveles = Grd_Nivel::get();

        return view('layouts_direccion/view_dir_agenda', [
            'usuactivo' => $user,
            'Niveles'   => $Niveles,
            'Grd'       => 0,
        ]);
    }

    /*
     * ---- Actividades
     */

    public function verActividades()
    {
        $user    = fGECN::obt_nombre();
        $Niveles = Grd_Nivel::get();
        $this->lisCom   = qGECN::listComunicado(2,0); // tipo, cantidad 
        $this->lisAct   = qGECN::listActividad(5);
        return view('layouts_direccion/view_dir_actividades', [
            'usuactivo' => $user,
            'Niveles'   => $Niveles,
            'ListaC'    => $this->lisCom,
            'ListaA'    => $this->lisAct,
            'Grd'       => 0,
        ]);
    }

    /*
     * ---- Comunicado
     */
    public function verComunicado()
    {
        $sql     = new qGECN;
        $user    = fGECN::obt_nombre();
        $Niveles = Grd_Nivel::get();
        $lComTip = $sql::listComTipo();       
        
        return view('layouts_direccion/view_dir_comunicado', [
            'usuactivo'   => $user,
            'Niveles'     => $Niveles,
            'ListaComTip' => $lComTip,
            'Grd'       => 0,
        ]);
    }

    public function mostrarComunicado()
    {
        $sql    = new qGECN;
        $lisCom = $sql::listComunicado(0,0); // tipo, cantidad 0 = todos
        return $lisCom;
    }

    /*
     * ---- Acciones de Comunicado
     */
    public function store(Request $request)
    {
        $func = new fGECN;
        $fec  = $func::setDateAttribute($request->com_fec);
        $this->validate($request, [
            'com_tit'  => ' required',
            'com_desc' => 'required',
        ]);
        DB::table('comunicado')->insert(
            [
                'com_tipo'   => $request->com_tipo,
                'com_titulo' => $request->com_tit,
                'com_desc'   => $request->com_desc,
                'com_fec'    => $fec,
            ]
        );
        return;
    }

    public function destroy($id)
    {
        DB::delete('delete from comunicado where com_id=' . $id);
        return;
    }
    /* Cancelar Suscripcion */
    public function bajaAlumno($id){        
        $userBaja = DB::select('select * from users where id = ?', [$id]);
        
        if(sizeof($userBaja)!= 0){            
            if($userBaja[0]->tipo_Usu!='Est_ccc'){
                return redirect()->route('Dir.Reg')->with('warning', 'No es un alumno Inscrito!!!');
            }            
            else{
            $gestion = self::$gyear - 1;      
            DB::table('rude_1_gestion')
                ->where('user_id', $id)
                ->update(['gst_gestion' =>$gestion]);

            return redirect()->route('Dir.Reg')->with('success', 'Alumn@ dado de BAJA!!!');
            }
        }  
        else{            
            return redirect()->route('Dir.Reg')->with('warning', 'Alumno no esta Inscrito en el Colegio!!!');
        } 
    }

    /* Borrar Estudiante  */
    public function borrEst($id){
    	        
        $userDel = DB::select('select * from users where id = ?', [$id]);
        
        if(sizeof($userDel)!= 0){
            if($userDel[0]->tipo_Usu=='SuperAdm'){
                return redirect()->route('Dir.Reg')->with('warning', 'No debe borrar este Usuario!!!');
            }

            if((sizeof($userDel)>0)){        
            DB::delete('delete from rude where user_id='.$id);
            DB::delete('delete from rude_1_gestion where user_id='.$id);
            DB::delete('delete from rude_2_lug_nac where user_id='.$id);
            DB::delete('delete from rude_4_direccion where user_id='.$id);
            DB::delete('delete from rude_5_1_idioma where user_id='.$id);
            DB::delete('delete from rude_5_2_salud where user_id='.$id);
            DB::delete('delete from rude_5_3_serbasicos where user_id='.$id);
            DB::delete('delete from rude_5_4_actividades where user_id='.$id);
            DB::delete('delete from rude_5_5_internet where user_id='.$id);
            DB::delete('delete from rude_5_6_transporte where user_id='.$id);
            DB::delete('delete from rude_6_tutor where user_id='.$id);
            DB::delete('delete from psico_comportamiento where user_id='.$id);
            DB::delete('delete from reg_comportamiento where user_id='.$id);        

            // ---- Borramos todos sus datos en disco ----
            $ruta= fGECN::constRuta(4, $id, ''); 
            $rutaAux = str_replace ( '/' , "\\" , $ruta."_a");    
            
            $dir = Storage::disk('publicLib')->files($rutaAux);
            if (sizeof($dir)>0) {  
                Storage::disk('publicLib')->deleteDirectory($rutaAux);  
                } 
            // ---- Eliminacion Exitosa ----    
            DB::delete('delete from users where id = ?', [$id]);
            return redirect()->route('Dir.Reg')->with('success', 'RUDE Borrado!!!');
            }
            else{
            return redirect()->route('Dir.Reg')->with('warning', 'RUDE ya fue Borrado, eliminar el cache del navegador con CTRL+F5!!!');    
            }
        }else{
            return redirect()->route('Dir.Reg')->with('warning', 'NAVEGADOR no compatible');    
        }
        
    }

}
