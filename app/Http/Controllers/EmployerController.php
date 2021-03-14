<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EmployerController extends Controller
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('employer');

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function create(Request $request)
    {
        //Validamos los datos
        $validateData =  $request->validate ([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'rol' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $owner = Auth::user(); //Obtenemos la información del usuario loggeado

        $employer = new User;
        $employer->name = $request->name;
        $employer->email = $request->email;
        $employer->rol = $request->rol;
        $employer->password = $request->password;
        $employer->workAt = $owner->workAt;  //Introducimos el cif de la empresa obteniendolo del usuario loggeado

        $employer->save();

        return redirect('NewEmployer');

    }
}
