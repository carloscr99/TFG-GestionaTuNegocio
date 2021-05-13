<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

        $owner = Auth::user();

        if ($owner->rol == 'superadmin') {

            $employers = DB::table('users')->get();

        } else {

            $employers = DB::table('users')->where('workAt', $owner->workAt)->get();

        }

        return view('employers', ['employers' => $employers]);

    }

    public function newEmployer()
    {

        return view('newEmployer');

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
        $validateData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'dni' => ['required', 'string', 'max:9', 'regex:/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/i', 'unique:users'],
            'iban' => ['string', 'max:26', 'regex:/ES\d{2}[ ]\d{4}[ ]\d{4}[ ]\d{4}[ ]\d{4}[ ]\d{4}|ES\d{22}/i'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'rol' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $owner = Auth::user(); //Obtenemos la información del usuario loggeado

        $employer = new User;
        $employer->name = $request->name;
        $employer->dni = $request->dni;
        $employer->iban = $request->iban;
        $employer->email = $request->email;
        $employer->rol = $request->rol;
        $employer->password = Hash::make($request->password);
        $employer->workAt = $owner->workAt; //Introducimos el cif de la empresa obteniendolo del usuario loggeado

        $employer->save();

        return redirect('NewEmployer');

    }

    public function openEdit(Request $request, $dniEmployer)
    {

        $employer = DB::table('users')->where('dni', $dniEmployer)->first();

        return view('newEmployer', ['employer' => $employer]);

    }

    public function edit(Request $request)
    {

        $validateData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'iban' => ['nullable', 'string', 'max:26', 'regex:/ES\d{2}[ ]\d{4}[ ]\d{4}[ ]\d{4}[ ]\d{4}[ ]\d{4}|ES\d{22}/i'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'rol' => ['string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if (Auth::user()->rol == 'superadmin') {

            if ($request->rol === 'Seleciona su rol') {
                DB::update("update users set name=?, iban=?, email=?, password=?, restablished=1 where workAt=? and dni=?",
                    [$request->name, $request->iban, $request->email, Hash::make($request->password), $request->workAt, $request->dni]);
            } else {
                DB::update("update users set name=?, iban=?, email=?, rol=?, password=?, restablished=1 where workAt=? and dni=?",
                    [$request->name, $request->iban, $request->email, $request->rol, Hash::make($request->password), $request->workAt, $request->dni]);
            }

        } elseif (Auth::user()->rol != 'propietario') {

            DB::update("update users set name=?, iban=?, email=?, password=?, restablished=0 where workAt=? and dni=?",
                [$request->name, $request->iban, $request->email, Hash::make($request->password), $request->workAt, $request->dni]);

        } else {

            if ($request->rol === 'Seleciona su rol') {

                DB::update("update users set name=?, iban=?, email=?, password=?, restablished=0 where workAt=? and dni=?",
                    [$request->name, $request->iban, $request->email, Hash::make($request->password), $request->workAt, $request->dni]);

            } else {

                DB::update("update users set name=?, iban=?, email=?, rol=?, password=?, restablished=0 where workAt=? and dni=?",
                    [$request->name, $request->iban, $request->email, $request->rol, Hash::make($request->password), $request->workAt, $request->dni]);

            }

        }

        return redirect('Employers');

    }

    public function delete(Request $request, $employer)
    {

        $owner = Auth::user();

        $product = DB::table('users')->where('dni', $employer)->delete();

    }

}
