<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function Index () {
        return "<h1> Página Inicial </h1>";
    }

    public function MyProfile ($name, $age) {
        return view('teste', compact("name", "age"));
    }

    public function MyName ($name) {
        return view('teste', compact("name"));
    }

    public function MyAge ($age) {
        return view('teste', compact("age"));
    }
}
