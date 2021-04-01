<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;




class UserController extends Controller
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
        $data= User::orderBy('id','desc')->where('status', 1)->paginate(5);        
        return view('admin.user.userview',compact('data'));
	    //return view('userview', [‘users' => 'data']);
	    //return view('userview')
	            // ->with('users', 'data')
	            // ->with('name', 'value’')
	    //return view('userview', compact('data1','data2','data3'));
       }

    public function addUser()
    {
        return view('admin.user.addform');
    }

    public function addNewUser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]);


        $extUser = null;
        $extuser = User::where('email', $request->email)->first();

        if ($extuser) {
            $user = $extuser;
            if ($user->status == 3) {
                $user->name = $request->name;
                $user->fullname = $request->fullname;
                $user->email = $request->email;
                $user->mobile = $request->mobile;
                $user->picture = $request->picture;
                $user->role = $request->role;
                $user->status = $request->status;
                $user->password = Hash::make(12345678);

                if ($file = $request->file('picture')) {
                    $request->validate([
                        'picture' =>'mimes:jpg,png,bmp',
                    ]);
                    $image = $request->file('picture');
                    $imgExt = $image->getClientOriginalExtension();
                    $fullname = time().".".$imgExt;
                    $result = $image->storeAs('images',$fullname);
                }

            } 
            else{
                $fullname = "avatar7.png";              
            }

            $user->picture = $fullname;

        }

        else {
            
            $user = new User;
            $user->name = $request->name;
            $user->fullname = $request->fullname;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->picture = $request->picture;
            $user->role = $request->role;
            $user->status = $request->status;
            $user->password = Hash::make(12345678);

            if ($file = $request->file('picture')) {
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

        $user->picture = $fullname;


        if ($user->save()) {

            return redirect('admin/users/')->with('success', 'New User Added Successfully');
        }

        return redirect('admin/users/')->with('errors', ['Sorry Some Error Occured.Please Try Again']);

    }

}

   

    public function editUser($id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.user.editform', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]
        );

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->role = $request->role;
        $user->status = $request->status;



        
        if ($user->save()) {
           
             return redirect('admin/users/')->with('success', 'User Updated Successfully.');


        }

        return redirect('admin/users/edit-user/' . $id)->with('errors', ['Sorry Some Error Occured.Please Try Again']);
    }


    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->status = 3;
        $result = $user->save();
        
        if ($result) {
        	return redirect('admin/users/')->with('success', 'User deleted Successfully.');
        }
        
    }

    public function searchuserForAdmin(Request $request){

        $searched=$request->searched;
        $data= User::Where('name','Like',"%$searched%")->orWhere('fullname','Like',"%$searched%")->orWhere('email','Like',"%$searched%")->orWhere('mobile','Like',"%$searched%")->get();
        return view('admin.user.search',compact('data','searched'));
    }

    

}

