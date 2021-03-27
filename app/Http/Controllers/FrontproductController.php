<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Http\Request;

class FrontproductController extends Controller
{
    public function index(){
        $products = Products::all();
        return view('welcome',compact('products'));
    }

    public function viewProduct($id)
    {
        $product = Products::where('id', $id)->first();
        return view('products-detail', compact('product'));
    }

    
}
