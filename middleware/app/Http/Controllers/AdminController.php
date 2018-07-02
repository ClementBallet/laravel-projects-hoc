<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Le constructeur associé à un middleware permet d'isoler cette classe à un middleware donné
     */
    public function __construct() {
        $this->middleware('isAdmin');
    }

    public function index()
    {
        return "Coucou je suis admin !!!";
    }
}
