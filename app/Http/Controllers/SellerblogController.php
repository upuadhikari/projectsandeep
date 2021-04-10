<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blogs;
use Illuminate\Support\Facades\File;

class SellerblogController extends Controller
{
    public function index(Request $request){

        $data= Blogs::orderBy('id','desc')->paginate(2);
        return view('seller.blog.blogview',compact('data'));
       }

    
    
       public function addBlog()
    {
        return view('seller.blog.addform');
    }

    public function addNewBlog(Request $request)
    {
        $this->validate($request, [
            'picture' => 'required',
            'title' => 'required',
            'body' => 'required',
        ]);
  
            $blog = new Blogs;
            if ($request->hasFile('picture')) {                
                $request->validate([
                    'picture' =>'mimes:jpg,png,bmp',
                ]);
                $image = $request->file('picture');
                $imgExt = $image->getClientOriginalExtension();
                $fullname = time().".".$imgExt;
                $result = $image->storeAs('images',$fullname);
            }

        else{
            $fullname = "avatar7.png";              
        }


        $blog->picture = $fullname;
        $blog->title = $request->title;
        $blog->body = $request->body;
        $blog->status = $request->status;
        $blog->u_id = Auth::user()->id;

            
            if ($blog->save()) {

                return redirect('/seller/blogView/')->with('success', 'New blogs Added Successfully');
            }
    
            return redirect('/seller/blogView/')->with('errors', ['Sorry Some Error Occured.Please Try Again']);
}


public function editBlog($id)
    {
        $blog = Blogs::where('id', $id)->first();
        return view('seller.blogView.editform', compact('blog'));
    }

    public function deleteBlog($id)
    {
        $blog = Blogs::findOrFail($id);
        $blog->status = 3;
        $result = $blog->save();


        if ($result) {
        	return redirect('/seller/blogView/')->with('success', 'Blogs deleted successfully');
        }
        
    }

    public function searchblogForseller(Request $request){

        $searched=$request->searched;
        $data= Blogs::Where('title','Like',"%$searched%")->get();
        return view('seller.blog.search',compact('data','searched'));
    }
}