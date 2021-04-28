<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendEmailRequestRestorePassword;
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
        $this->middleware('guest');
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
            return Redirect::back()->with('ErrorDNI','El DNI introducido no es válido');
        } else {
            Mail::to('gestionatunegocioccr@gmail.com')->queue(new sendEmailRequestRestorePassword($request->dni));

            return redirect()->route('welcome');
        }
    }

  
}
