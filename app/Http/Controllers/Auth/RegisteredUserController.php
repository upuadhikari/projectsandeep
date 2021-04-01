<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'picture' =>'mimes:jpg,png,bmp',
            ]);
            $fullname = "user.png";
        if ($request->hasFile('picture')) {         
            $image = $request->file('picture');
            $imgExt = $image->getClientOriginalExtension();
            $fullname = time().".".$imgExt;
            $result = $image->storeAs('images/users/',$fullname);
        }
        
        Auth::login($user = User::create([
            'name' => $request->name,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'mobile' => $request->mobile,
            'picture' => $fullname,

            
        ]));

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }

}
