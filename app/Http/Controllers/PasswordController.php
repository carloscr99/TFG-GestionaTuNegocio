<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\sendEmailRequestRestorePassword;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Redirect;

class PasswordController extends Controller
{

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::NEWEMPLOYER;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('RequestresetPassword');

    }

    public function resetPassword(Request $request)
    {

        $validateData = $request->validate([
            'dni' => ['required', 'string', 'max:9', 'regex:/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/i'],
        ]);

        $employer = DB::table('users')->where('dni', $request->dni)->first();

        if (empty($employer)) {
            return Redirect::back()->with('ErrorDNI', 'El DNI introducido no es válido');
        } else {

            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomPassword = '';
            for ($i = 0; $i < 20; $i++) {
                $randomPassword .= $characters[rand(0, $charactersLength - 1)];
            }

            DB::table('users')->where('dni', $employer->dni)->update(['password' => Hash::make($randomPassword), 'restablished' => 1]);

            Mail::to($employer->email)->queue(new sendEmailRequestRestorePassword($randomPassword));

            return redirect()->route('welcome');
        }
    }

    public function openChangePassword(Request $request, $dniEmployer)
    {

        return view('changePassword', ['dniEmployer' => $dniEmployer]);

    }

    public function changePassword(Request $request){

        $validateData =  $request->validate ([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        DB::table('users')->where('dni', $request->dni)->update(['password' => Hash::make($request->password), 'restablished' => 0]);
        
        return redirect()->route('home');

    }

}
