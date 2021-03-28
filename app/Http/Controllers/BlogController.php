<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blogs;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function index(Request $request){
        $data= Blogs::orderBy('id','desc')->get();
        return view('admin.blog.blogview',compact('data'));
       }

    
    
       public function addBlog()
    {
        return view('admin.blog.addform');
    }

    public function addNewBlog(Request $request)
    {
        $this->validate($request, [
            'picture' => 'required',
            'title' => 'required',
            'body' => 'required',
        ]);
  
            $blog = new Blogs;
            $blog->picture = $request->picture;
            $blog->title = $request->title;
            $blog->body = $request->body;
            $blog->status = $request->status;
            $blog->u_id = Auth::user()->id;

            if ($file = $request->file('picture')) {
                $uplodaDesc = $this->uploadFiles($file, 'members', $blog->id);
                if(File::exists(storage_path('app/public/uploads/members/'). $blog->picture)){
                    File::delete(storage_path('app/public/uploads/members/'). $blog->picture);
                }
                if ( $uplodaDesc) {
                    $blog->picture = $uplodaDesc['filename'];
                }
            }
            
            if ($blog->save()) {

                return redirect('admin/blog/')->with('success', 'New blogs Added Successfully');
            }
    
            return redirect('admin/blog/')->with('errors', ['Sorry Some Error Occured.Please Try Again']);
}


public function editBlog($id)
    {
        $blog = Blogs::where('id', $id)->first();
        return view('admin.blog.editform', compact('blog'));
    }

    public function deleteBlog($id)
    {
        $blog = User::findOrFail($id);
        $blog->status = 3;
        $result = $blog->save();

        $data= User::orderBy('id','desc')->where('status',1)->get();
        if ($result) {
        	return view('admin.blog.blogview',compact('data'));
        }
        
    }
}