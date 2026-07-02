<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chirp;

class ChirpController extends Controller
{
    public function index(){
        // $chirps=[
        //     ['author'=>'John Doe','message'=>'Hello World!','time'=>'1 minutes ago'],
        //     ['author'=>'Jane Doe','message'=>'Hello Laravel!','time'=> '1 hour'],
        //     ['author'=>'Jane Doe','message'=>'Hello Laravel!','time'=> '1 hour'],
        //     ['author'=>'Jane Doe','message'=>'Hello Laravel!','time'=> '1 hour'],

        // ];
        $chirps= Chirp::with('user')
        ->latest()
        ->take(10)->get();
    
        return view("home",["chirps"=>$chirps]);
    }
}
