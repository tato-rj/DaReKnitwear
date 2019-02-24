<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Inventory, Sweater};

class HomeController extends Controller
{
    public function index()
    {
        $products = Inventory::display(6);
        
        return view('pages.welcome.index', compact('products'));
    }

    public function about()
    {
        return view('pages.about.index');
    }
}
