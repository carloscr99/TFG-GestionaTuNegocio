<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

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
        $product->storedAt = $owner->workAt;  //Introducimos el cif de la empresa obteniendolo del usuario loggeado

        $product->save();
        return redirect('home');

    }
}
