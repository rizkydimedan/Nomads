<?php

namespace App\Http\Controllers;

use App\Models\TravelPackage;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(){

        $item = TravelPackage::with(['galleries'])->get();
        return view('pages.home',[
            'items' => $item
        ]);

    }
  
}
