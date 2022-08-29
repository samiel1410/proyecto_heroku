<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Snack;

class PublicController extends Controller
{
    public function __construct()
    {
       
       
    }
    public function index()
    {  
        $menus = Menu::paginate(3);
        $snacks= Snack::paginate(3);
        return view('welcome',compact('snacks','menus'));
    }
    
}
