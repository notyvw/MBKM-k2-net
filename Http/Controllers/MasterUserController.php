<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class MasterUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $users = User::where('type', 'user')->get();
        $counter = 1;
        return view('admin.masteruser.index', compact('users', 'counter'));
    }
}
