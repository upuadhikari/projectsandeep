<?php

namespace App\Http\Controllers;
use App\Models\Blogs;
use Illuminate\Http\Request;

class FrontblogController extends Controller
{
    public function index(){
        $blogs = Blogs::paginate(3);
        return view('blog',compact('blogs'));
    }

    public function viewBlog($id)
    {
        $blog = Blogs::where('id', $id)->first();
        return view('view-blog', compact('blog'));
    }
}
