<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Mail\SendEmailDeleteShop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Log;

class ShopController extends Controller
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

    public function index()
    {

        $shops = DB::table('shops')->get();

        return view('shops', ['shops' => $shops]);
    }

    
    public function edit(Request $request)
    {

        $owner = Auth::user();

            DB::update("update shops set nameShop=?, direction=?, city=?, country=? where cif=?", 
            [$request->nameShop, $request->direction, $request->city, $request->country, $request->cif]);
     
      if($owner->rol == 'propietario'){
        return redirect('home');
      }else{
        return redirect('shops');
      }
        

    }

    public function openEdit(Request $request, $cif)
    {

        $shop = DB::table('shops')->where('cif', $cif)->first();

        return view('editShop', ['shop' => $shop]);

    }

    public function delete(Request $request, $cif){


         DB::table('shops')->where('cif', $cif)->delete();
         DB::table('products')->where('storedAt', $cif)->delete();
         DB::table('users')->where('workAt', $cif)->delete();

         return $this->sendEmail($cif);

    }
    
    public function sendEmail($cif){

        Mail::to('gestionatunegocioccr@gmail.com')->queue(new SendEmailDeleteShop($cif));

        Auth::logout();

    }

}