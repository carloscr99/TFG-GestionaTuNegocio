<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
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

        return view('NewProduct');
    }

    public function create(Request $request)
    {

        $product = new Product;

        $owner = Auth::user(); //Obtenemos la información del usuario loggeado

        $validateData =  $request->validate ([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable','string', 'max:300'],
            'reference' => ['required', 'string', 'max:30', Rule::unique('products')->where('storedAt', $owner->workAt)],
            'price' => ['required','regex:/^\d*(\.\d{2})?$/'],
            'stock' => ['required', 'int'],
        ]);

        if(empty($request->description)){

        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->reference = $request->reference;
        $product->urlImagen = $request->urlProducto;
        $product->storedAt = $owner->workAt; //Introducimos el cif de la empresa obteniendolo del usuario loggeado


        }else{

            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->stock = $request->stock;
            $product->reference = $request->reference;
            $product->urlImagen = $request->urlProducto;
            $product->storedAt = $owner->workAt; //Introducimos el cif de la empresa obteniendolo del usuario loggeado
    
        }

        
        $product->save();
        return redirect('home');

    }

    public function edit(Request $request)
    {

        $owner = Auth::user(); 

        $validateData =  $request->validate ([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable','string', 'max:300'],
            'reference' => ['required', 'string', 'max:30'],
            'price' => ['required','regex:/^\d*(\.\d{2})?$/'],
            'stock' => ['required', 'int'],
        ]);

        if($request->urlProducto === 'https://via.placeholder.com/300x200'){
            DB::update("update products set name=?, description=?, price=?, stock=? where storedAt=? and reference=?", 
            [$request->name, $request->description, $request->price, $request->stock, $owner->workAt , $request->reference]);
        }else{
            DB::update("update products set name=?, description=?, price=?, stock=?, urlImagen=? where storedAt=? and reference=?", 
            [$request->name, $request->description, $request->price, $request->stock, $request->urlProducto, $owner->workAt , $request->reference]);
        }

     
        
        return redirect('home');

    }

    public function openEdit(Request $request, $product)
    {

        $owner = Auth::user();

        $product = DB::table('products')->where('reference', $product)->where('storedAt', $owner->workAt)->first();

        return view('NewProduct', ['product' => $product]);

    }

    public function delete(Request $request, $product){

        $owner = Auth::user();

        $product = DB::table('products')->where('reference', $product)->where('storedAt', $owner->workAt)->delete();

    }
}