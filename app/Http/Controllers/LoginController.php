<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login_proses(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($data)){
            return redirect()->route('admin.dashboard');
        }else {
            return redirect()->route('login')->with('failed','email atau password salah');
        }
    }

    public function register(){
        return view('auth.register');
    }

public function register_proses(Request $request){
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'name' => 'required',
        'password' => 'required',
        'image' => 'required|mimes:png,jpg,jpeg|max:5048',
    ]);

    if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

    $photo = $request->file('image');
    $filename = date('Y-m-d') . $photo->getClientOriginalName();
    $path = 'photo-user/' . $filename;

    Storage::disk('public')->put($path, file_get_contents($photo));

    $data['email'] = $request->email;
    $data['name'] = $request->name;
    $data['password'] = Hash::make($request->password);
    $data['image'] = $filename;

    User::create($data);
    return redirect()->route('login')->with('Success','kamu berhasil Register!');

}

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('Success','kamu Berhasil Logout');
    }
}
