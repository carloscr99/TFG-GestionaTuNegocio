<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {

        return view('NewProduct');
    }

    public function create(Request $request)
    {
        $product = new Product;

        $owner = Auth::user(); //Obtenemos la información del usuario loggeado

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->reference = $request->reference;
        $product->urlImagen = $request->urlProducto;
        $product->storedAt = $owner->workAt; //Introducimos el cif de la empresa obteniendolo del usuario loggeado

        $product->save();
        return redirect('home');

    }

    public function edit(Request $request)
    {

        $owner = Auth::user();

        if($request->urlProducto){
            DB::update("update products set name=?, description=?, price=?, stock=?, urlImagen=? where storedAt=? and reference=?", 
            [$request->name, $request->description, $request->price, $request->stock, $request->urlProducto, $owner->workAt , $request->reference]);
        }else{
            DB::update("update products set name=?, description=?, price=?, stock=? where storedAt=? and reference=?", 
            [$request->name, $request->description, $request->price, $request->stock, $owner->workAt , $request->reference]);
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