<?php

namespace sis_ccc\Http\Controllers\Auth;

use sis_ccc\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
//-- Adicionado USE desde aqui
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */
    protected $redirectTo = '/direccion';
    use ResetsPasswords;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('Grp_Dir');                
    }
    /*
    * una vez modificado la contraseña
    */
    protected function resetPassword($user, $password)
    {
        $user->password = Hash::make($password);
        $user->setRememberToken(Str::random(60));
        $user->save();
        event(new PasswordReset($user));
        $this->guard();        
        return redirect()->Route('Dir.Reg');
    }
}
