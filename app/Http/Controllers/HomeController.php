<?php

namespace App\Http\Controllers;

use Illuminated\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
      //  $data = [
        //    'nama' => 'Budi',
          //  'pekerjaan' => 'Developer',
       // ];
       // return view('home')->with($data);

       $nama = "teddy";
       $pekerjaan = "programer";
       return view('home', compact('nama', 'pekerjaan'));
    }
    public function contact()
    {
        return view('contact');
    }
}    