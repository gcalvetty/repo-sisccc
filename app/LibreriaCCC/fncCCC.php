<?php

namespace sis_ccc\libreriaCCC;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;
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

    public static function getAvatar($idUsu){
        $user = User::find($idUsu);
        $urlAvatar = $user->avatar;
        return $urlAvatar;
    } 

    public static function getDateAttribute($value) {
        return Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y');
    }

    public static function setDateAttribute($value) {
        return Carbon::createFromFormat('d/m/Y', $value)->toDateString();
    }


}
