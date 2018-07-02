<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $arrays = [
            1 => [
                'Quentin',
                27
            ],
            2 => [
                'Clément',
                29
            ],
            3 => [
                'Victor',
                30
            ]
        ];

        return view('home', compact('arrays'));
    }
}
