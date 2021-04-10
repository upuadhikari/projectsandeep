<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Products;
use Illuminate\Support\Facades\File;

class SellerviewController extends Controller
{
    
    public function index(Request $request){

        $data= Products::orderBy('id','desc')->paginate(2);
        return view('seller.product.productview',compact('data'));
       }

    public function addProduct()
    {
        return view('seller.product.addform');
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

            return redirect('seller/products/')->with('success', 'New Products Added Successfully');
        }

        return redirect('seller/products/')->with('errors', ['Sorry Some Error Occured.Please Try Again']);

    }

   

    public function editProduct($id)
    {
        $product = Products::where('id', $id)->first();
        return view('seller.product.editform', compact('product'));
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
           
             return redirect('seller/products/')->with('success', 'Product Updated Successfully.');


        }

        return redirect('seller/products/edit-product/' . $id)->with('errors', ['Sorry Some Error Occured.Please Try Again']);
    }


    public function deleteProduct($id)
    {
        $product = User::findOrFail($id);
        $product->status = 3;
        $result = $product->save();

        $data= User::orderBy('id','desc')->where('status',1)->get();
        if ($result) {
        	return view('seller.product.productview',compact('data'));
        }
        
    }

    public function searchproductForseller(Request $request){

        $searched=$request->searched;
        $data= Products::Where('name','Like',"%$searched%")->orWhere('price','Like',"%$searched%")->get();
        return view('seller.product.search',compact('data','searched'));
    }
}
