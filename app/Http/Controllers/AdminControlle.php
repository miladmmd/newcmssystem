<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminControlle extends Controller
{
    public function index(){
        return view('admin.index');
    }

    // public function create() {
    //     return view('admin.posts.create');
    //   }
}
