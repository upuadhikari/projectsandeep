<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Products;
use App\Models\Cart;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function __construct()
    {
    	$this->middleware(function ($request, $next) {  
        if (!Auth::user()->role == 3) {
        	dd("error");
            abort(404);
        }
            return $next($request);
        });
    }
    public function index(Request $request){

        $data= Products::orderBy('id','desc')->paginate(2);
        return view('admin.product.productview',compact('data'));
	    //return view('userview', [‘users' => 'data']);
	    //return view('userview')
	            // ->with('users', 'data')
	            // ->with('name', 'value’')
	    //return view('userview', compact('data1','data2','data3'));
       }

    public function addProduct()
    {
        return view('admin.product.addform');
    }

    public function addNewProduct(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'detail' => 'required',
            'price' => 'required',
        ]);

            
            $product = new Products;
            $product->name = $request->name;
            $product->detail = $request->detail;
            $product->price = $request->price;
            $product->discount = $request->discount;
            $product->status = $request->status;
            $product->u_id = Auth::user()->id;


            if ($request->hasFile('picture')) {
                $request->validate([
                    'picture' =>'mimes:jpg,png,bmp',
                ]);
                $image = $request->file('picture');
                $imgExt = $image->getClientOriginalExtension();
                $fullname = time().".".$imgExt;
                $result = $image->storeAs('images/product',$fullname);
            }

        else{
            $fullname = "avatar7.png";              
        }


        $product->picture = $fullname;




        if ($product->save()) {

            return redirect('admin/products/')->with('success', 'New Products Added Successfully');
        }

        return redirect('admin/products/')->with('errors', ['Sorry Some Error Occured.Please Try Again']);

    }

   

    public function editProduct($id)
    {
        $product = Products::where('id', $id)->first();
        return view('admin.product.editform', compact('product'));
    }

    public function updateProduct(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'detail' => 'required',
            'price' => 'required',
        ]
        );


        $product = Products::findOrFail($id);
        $product->name = $request->name;
        $product->detail = $request->detail;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->status = $request->status;



        
        if ($product->save()) {
           
             return redirect('admin/products/')->with('success', 'Product Updated Successfully.');


        }

        return redirect('admin/products/edit-product/' . $id)->with('errors', ['Sorry Some Error Occured.Please Try Again']);
    }


    public function deleteProduct($id)
    {
        $product = User::findOrFail($id);
        $product->status = 3;
        $result = $product->save();

        $data= User::orderBy('id','desc')->where('status',1)->get();
        if ($result) {
        	return view('admin.product.productview',compact('data'));
        }
        
    }

    public function searchproductForAdmin(Request $request){

        $searched=$request->searched;
        $data= Products::Where('name','Like',"%$searched%")->orWhere('price','Like',"%$searched%")->get();
        return view('admin.product.search',compact('data','searched'));
    }

    public function addToCart(Request $request ,$productid){

        $productId = $productid;
        $cart_id = session()->get('cartid');
        if(!$cart_id) {
            $cart_id= uniqid();
            session()->put('cartid', $cart_id);
        }
         $product = Products::findOrFail($productId);

        $product_exist= Cart::where('cart_number',$cart_id)->Where('product_id',$productId)->first();
        if($product_exist){
            $product_exist->quantity = $product_exist->quantity+1;
            $product_exist->save();
        }
        else{
            $cart = new Cart;
            $cart->cart_number = $cart_id;
            $cart->product_id = $productId;
            $cart->product_name = $product->name ;
            $cart->price = $product->price ;
            $cart->status = 1 ;
            $cart->quantity = 1;
            $cart->save();
        }

        
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

}
