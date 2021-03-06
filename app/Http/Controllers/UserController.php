<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{

    public function index(){
        $users = User::all();
        return view('admin.users.index',['users'=>$users]);
    }

    public function show(User $user){
        return view('admin.users.profile',['user'=>$user,'roles'=>Role::all()]);
    }

    public function update(User $user){
        $inputs = request()->validate([
            'username'=>['required','string','max:25','alpha_dash'],
            'name'=>['required','string','max:255'],
            'email' =>['required','email','max:255'],
            'avatar'=>['file']
            ]);
        if(request('avatar')){
            $iputs['avatar'] = request('avatar')->store('image');
            $user->avatar =  $iputs['avatar'];
        }
        $user->username = $inputs['username'];
        $user->name = $inputs['name'];
        $user->email = $inputs['email'];

        $user->update();
        

        return back();
        
    }

    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('message-user-delete','User was deleted');
        return redirect()->route('users.index');
    }
}
