<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $roles = Role::get();
        $user = User::find(Auth::user()->id);
        return view('admin.home', compact('roles', 'user'));
    }
    public function addUser()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $user =  User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'role_id' => $role,
        ]);
        return redirect(url()->previous());
    }
    public function showEditProfile(){
        $user = User::find(Auth::user()->id);
        return view('admin.editprofile',compact('user'));
    }
    public function updateProfile(){
        $id=$_POST['id'];
        $name=$_POST['name'];
        $email=$_POST['email'];
        if(isset($_POST['id']))
        {
            User::find($id)->update([
                'name'=>$name,
                'email'=>$email,

            ]);
            return redirect(url()->previous());
        }
        return redirect(url()->previous());
    }
}
