<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function contact() {
        return view('admin/posts/contact');
    }
}
