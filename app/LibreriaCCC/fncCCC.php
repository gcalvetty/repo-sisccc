<?php

namespace sis_ccc\libreriaCCC;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class fncCCC {    
    
    public static function CorrDatInsc($a) {
        return ucwords(strtolower(trim($a)));
    }

    public static function obt_nombre() {
        $user = Auth::user()->ape_paterno . ' ' .
                Auth::user()->ape_materno.' '.
                Auth::user()->nombre;
        return $user;
    }
    public static function getId(){
        $user = Auth::user()->id;
        return $user;
    }

    public static function usuNom($idUsu){
        $user = User::find($idUsu);
        $nomComp = $user->ape_paterno . ' ' . 
                   $user->ape_materno.', '.
                   $user->nombre;

        return $nomComp;
    } 

    public static function getAvatar($idUsu,$tamImg){
        $user = User::find($idUsu);
        $urlAvatar = $user->avatar;
        if(( $urlAvatar!='') && ($urlAvatar!=null)){
            $imgAva = '<img src="'.$urlAvatar.'" height="'.$tamImg.'" width="'.$tamImg.'" class="img-circle" alt="Avatar">';
        }else{
            $imgAva ='<img src="'.asset('imagenes/avatar/user-ccc-peq.png').'"  class="img-circle" alt="Avatar" height="'.$tamImg.'" width="'.$tamImg.'">';
        }
        return $imgAva;
    } 

    public static function getDateAttribute($value) {
        if($value!=null){
            return Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y');
        }else{
            return "-";
        }
    }

    public static function setDateAttribute($value) {
        return Carbon::createFromFormat('d/m/Y', $value)->toDateString();
    }

    public static function constRuta($opc, $id, $file){        
        $usuReg = User::find($id);
        $email  = $usuReg->email;
        $emailUsu = explode("@", $email);        
        $ruta= 'uploads/'.$usuReg->tipo_Usu.'/'.$emailUsu[0].'_'.$id;

        $dt = Carbon::now();
        $gyear = $dt->year;

        if($opc == 1){ // ---- libreta .PDF ----
            $path = Storage::disk('publicLib')->putFileAs($ruta, $file,'libreta-'.$gyear.'.pdf');            
            $usuReg->libreta = asset($path);          
            $usuReg->save(); 
        }   

        if($opc == 2){ // ---- Avatar ----            
            $image_file = $file;
            list($type, $image_file) = explode(';', $image_file);
            list(, $image_file)      = explode(',', $image_file);
            $image_file = base64_decode($image_file);
            $image_name= 'avatar-'.$gyear.'.png';
            $rutaImg = $ruta.'/'.$image_name;
            $usuReg->avatar = asset($rutaImg);
            //Funciona ->         
            Storage::disk('publicLib')->put($rutaImg, $image_file);            
            $usuReg->save(); 
        }
        
        if($opc == 3){ // ---- CV.PDF ----
            $path = Storage::disk('publicLib')->putFileAs($ruta, $file,'cv.pdf');            
            $usuReg->libreta = asset($path);          
            $usuReg->save(); 
        }

        if($opc == 4){ // ---- Psicologo .Pdf, .Doc
           return $ruta;
        }             
    }
}
