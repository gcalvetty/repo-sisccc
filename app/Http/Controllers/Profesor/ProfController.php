<?php

namespace sis_ccc\Http\Controllers\Profesor;

use Illuminate\Http\Request;
use sis_ccc\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use sis_ccc\Http\Controllers\Controller;
use sis_ccc\ModeloCCC\Grd_Nivel;
use Carbon\Carbon;
use sis_ccc\libreriaCCC\queryCCC as qGECN;
use sis_ccc\libreriaCCC\fncCCC as fGECN;
use Illuminate\Support\Facades\Storage;

class ProfController extends Controller {
    var $idUser, $user, $Tar, $comprt, $lisCom, $lisAct, $almAct;
    var $curDoc;
    
    function __get($a) {
        $this->idUser = Auth::user()->id;
        $this->user     = fGECN::obt_nombre();       
        $this->lisCom   = qGECN::listComunicado(0, 5);//1 = docentes - 2 = alumnos
        $this->lisAct   = qGECN::listActividad(5);       
        
        $this->curDoc = DB::select('select Distinct(pm.grd_id) from prof_materia pm where pm.user_id=' . $this->idUser);
   }

   public function setDateAttribute($value) {
        return Carbon::createFromFormat('d/m/Y', $value)->toDateString();
    }

    public function index(Request $request) {
        $this->__get(1);
        $sql = new qGECN;
        $CursoAlm = array();                
        foreach ($this->curDoc as $Curso) {
            $CursoAlm = array_filter(explode(",", $Curso->grd_id));
        }        
        
        $listAl = array();
        foreach ($CursoAlm as $Alumn) {
            $listAl[] = qGECN::listAlumnDoc($Alumn);
        }
        $lGECN1 = array();    $lGECN2 = array();
        $lGECN3 = array();    $lGECN4 = array();
        $lGECN5 = array();    $lGECN6 = array();
        $lGECN7 = array();    $lGECN8 = array();
        $lGECN9 = array();    $lGECN10 = array();
        $lGECN11 = array();   $lGECN12 = array();

        if (isset($listAl[0])) { $lGECN1 = $listAl[0]; }
        if (isset($listAl[1])) { $lGECN2 = $listAl[1]; }
        if (isset($listAl[2])) { $lGECN3 = $listAl[2]; }
        if (isset($listAl[3])) { $lGECN4 = $listAl[3]; }
        if (isset($listAl[4])) { $lGECN5 = $listAl[4]; }
        if (isset($listAl[5])) { $lGECN6 = $listAl[5]; }
        if (isset($listAl[6])) { $lGECN7 = $listAl[6]; }
        if (isset($listAl[7])) { $lGECN8 = $listAl[7]; }
        if (isset($listAl[8])) { $lGECN9 = $listAl[8]; }
        if (isset($listAl[9])) { $lGECN10 = $listAl[9];}
        if (isset($listAl[10])){ $lGECN11 = $listAl[10];}
        if (isset($listAl[11])){ $lGECN12 = $listAl[11];}

        $resultado = array_merge($lGECN1, $lGECN2, $lGECN3, $lGECN4, $lGECN5, $lGECN6, $lGECN7, $lGECN8, $lGECN9, $lGECN10, $lGECN11, $lGECN12);
        
        return view('layouts_profesor/view_prof', [
            'usuactivo' => $this->user,
            'Lista1' => $resultado,
            'ListaC' => $this->lisCom,
            'ListaA' => $this->lisAct,
        ]);
    }    
     /*
     * ---- Cuaderno de Seguimiento
     */
    public function mostrarSeguimiento() {    
        $prof = Auth::user()->id;        
        $lisActi = DB::select('select *
        from prof_cuad_seg
	where (user_id = "' . $prof . '") order by pc_id Desc LIMIT 10');
        return $lisActi;
    }
    public function guardarSeguimiento(Request $request){
        $prof = Auth::user()->id;
        $fec = date("Y/m/d");   
        
        DB::table('prof_cuad_seg')->insert(
                ['user_id' => $prof,
                 'pc_fec' => $fec,
                 'pc_nivel' => 0,
                 'pc_curso' => 0,
                 'pc_materia' => 0,   
                 'pc_desc' => $request->Seguimiento]
        );
        return 1;
    }
    
    public function borrarSeguimiento($id) {    
        DB::delete('delete from prof_cuad_seg where pc_id=' . $id);
        return;
    }
    
    
    public function verCuaderno() {
       $this->__get(1); 
        $Niveles = Grd_Nivel::get();
        return view('layouts_profesor/view_prof_cuaderno', [
            'usuactivo' => $this->user,
            'Niveles' => $Niveles,            
        ]);
    }

    /*
     * ---- Agenda
     */

    public function verAgenda() {
        $this->__get(1);
        $Niveles = Grd_Nivel::get();
        return view('layouts_profesor/view_prof_agenda', [
            'usuactivo' => $this->user,
            'Niveles' => $Niveles,
            'ListaC' => $this->lisCom,    // --- comunicados
            'ListaA' => $this->lisAct,    // --- actividades
        ]);
    }

    /*
     * ---- Tarea
     * Aqui se genera las Materias x Profesor
     */    
    
    public function verActividades() {        
        $this->__get(1);
        $curMat = qGECN::list_Cursos_materia();              
        $estMat = "";        
        foreach($curMat as $aux)
        {
            $reg=count($aux);            
            for($i=0;$i<$reg;$i++){
                if($i==0){
                  $curlit = qGECN::curso_materia($aux[$i]);  
                  $estMat.= htmlspecialchars_decode('<optgroup label="'.$curlit.'">');                   
                }else{
                    $estMat.= htmlspecialchars_decode('<option value="'.$curlit.','.$aux[$i]->id.'">'.$aux[$i]->materia.'</option>');                    
                }
            }
            $estMat .= htmlspecialchars_decode("</optgroup>");            
        }
        return view('layouts_profesor/view_prof_tarea', [
            'usuactivo' => $this->user,
            'Lista' => $estMat,                        
        ]);
    }

    /*
    * --- Cargamos todas las Tareas x Prof
    */
    public function mostrarActividades(Request $request) {
        /* $prof = Auth::user()->id;        
        setlocale(LC_ALL,"es_ES");
        //setlocale(LC_TIME, 'spanish');
        $lisActi = DB::select('select *, DATE_FORMAT(tar_fec_ini,"%d de %M") AS tar_fec,  DATE_FORMAT(tar_fec_fin,"%d de %M") AS tar_fecFin
        from prof_tareas
    where (user_id = "' . $prof . '") order by tar_id Desc');      
        return $lisActi;
        */

        $prof = Auth::user()->id;              
        $Tareas = DB::table('prof_tareas')
                   ->select('*')
                   ->where('user_id',$prof)
                   ->orderBy('tar_fec_ini', 'DESC')
                   ->paginate(7);
                
        return ['paginacion' =>[
                'total'     => $Tareas->total(),
                'act_pag'   => $Tareas->currentPage(),
                'por_pag'   => $Tareas->perPage(),
                'ult_pag'   => $Tareas->lastPage(),
                'de'        => $Tareas->firstItem(),
                'al'        => $Tareas->lastItem(),
                ],
                'lisTareas' => $Tareas,
        ];


    }
    /*
    * Guardar Actividad
    */
    public function insActividad(Request $req){
        $validatedData = $req->validate([
            'editor' => 'required',
            'ArcDoc' => 'file|mimes:pdf,docx,jpeg,png',
        ]);


        $prof = Auth::user()->id;
        $urlDoc = "";
        
        
        $data = $req->all();
        $file = $req->file('ArcDoc');
        $dateIniBD = $this->setDateAttribute($data['fec']);
        $dateFinBD = $this->setDateAttribute($data['fecFin']);
        if($file != ""){            
            $ruta= fGECN::constRuta(5, $prof, $req->file('ArcDoc')).''.$data['Curso'];  
            $path = Storage::disk('publicLib')->putFileAs($ruta, $req->file('ArcDoc'),'apoyo-'.$data['Mat_Tit'].'-'.$dateIniBD.'.'.$file->extension()); 
            $urlDoc = asset($path);
        }

        DB::table('prof_tareas')->insert(
            ['user_id' => $prof,
                'tar_curso' => $data['Curso'],
                'tar_mat_id' => $data['Materia'],
                'tar_materia' => $data['Mat_Tit'],
                'tar_fec_ini' => $dateIniBD,
                'tar_fec_fin' => $dateFinBD,
                'tar_desc' => $data['editor'],
                'tar_doc' => $urlDoc,
            ]
        );

        return redirect()->route('Prof.actividades')->withSuccess('OK');

    }


    public function borrarActividad($id) {        
        $prof = Auth::user()->id;     
        $tarReg = DB::select('select * '
                        . ' From prof_tareas'
                        . ' where tar_id=' . $id);         
        if($tarReg[0]->tar_doc!=""){            
            $ruta= fGECN::constRuta(5, $prof, '').$tarReg[0]->tar_curso.'/';             
            $rutaFileURL  = $tarReg[0]->tar_doc;            
            $rutaNomb = explode($tarReg[0]->tar_curso."/", $rutaFileURL);                                         
            $borrFile = $ruta."".$rutaNomb[1];                    
            Storage::disk('publicLib')->delete($borrFile);
        }
        DB::delete('delete from prof_tareas where tar_id=' . $id);
        
    }



    /*
    * Antiguo guardar actividad
    */
    public function store(Request $request) {
        $prof = Auth::user()->id;        
        $this->validate($request, [
            'Materia' => ' required',
            'Tarea' => 'required'
        ]);
        DB::table('prof_tareas')->insert(
                ['user_id' => $prof,
                    'tar_curso' => $request->Curso,
                    'tar_mat_id' => $request->Materia,
                    'tar_materia' => $request->Mat_Tit,
                    'tar_fec_ini' => $request->fec,
                    'tar_fec_fin' => $request->fec,
                    'tar_desc' => $request->Tarea
                ]
        );
        return;
    }



    public function destroy($id) {
        $prof = Auth::user()->id;     
        $tarReg = DB::select('select * '
                        . ' From prof_tareas'
                        . ' where tar_id=' . $id); 
        if($tarReg[0]->tar_doc!=""){            
            $ruta= fGECN::constRuta(5, $prof, '').$tarReg[0]->tar_curso.'/';             
            $rutaFileURL  = $tarReg[0]->tar_doc;            
            $rutaNomb = explode($tarReg[0]->tar_curso."/", $rutaFileURL);                                         
            $borrFile = $ruta."".$rutaNomb[1];                    
            Storage::disk('publicLib')->delete($borrFile);
        }
        
        DB::delete('delete from prof_tareas where tar_id=' . $id);
        return;
    }

/*
* ---- Comportamiento de los Alumnos
*/
public function comportamiento(Request $request) {
    
    $sql = new qGECN;
    $NivSel = $request->grd_nivel;
    $lGECN = $sql::listAlumnComportamiento($NivSel);
    $Niveles = Grd_Nivel::find(["2", "3"]);
    $user = fGECN::obt_nombre();
    
    return view('layouts_profesor/view_prof_comportamiento', [
        'usuactivo' => $user,
        'Lista' => $lGECN,
        'Niveles' => $Niveles,
        'NivSel' => $NivSel
    ]);
}

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
    return redirect()->route('Prof.Reg')->withSuccess('OK');
}

public function delComportamiento(Request $req) {
    $data = $req->all();        
    $eliDocente = DB::delete('Delete '
                    . ' From reg_comportamiento'
                    . ' where reg_id=' . $req->AlmId);
    return redirect()->route('Prof.Comp')->withSuccess('OK');
}

static function haveComportamiento($AlmId){
    
    $comprt = qGECN::listCompEst($AlmId,0);
    $totReg = count($comprt);        
    return $totReg;        
    
}
public function PDFComportamiento(Request $req) {                      
        
    $comprt = qGECN::listCompEst($req->AlmId,0);
    $datAlm = User::find($req->AlmId);
    
    $pdf = PDF::loadView("layouts_reportes.pagsis_comportamiento_pdf", [
        'alumno' => $datAlm->nombre." ".$datAlm->ape_paterno." ".$datAlm->ape_materno,
        'comp'   => $comprt,            
    ]);        
    return $pdf->stream(); // download - stream
}   

}
