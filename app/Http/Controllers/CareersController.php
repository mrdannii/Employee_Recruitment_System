<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class CareersController extends Controller
{
    //
    public function __construct()
    {

    }
    public function index()
    {
        $i=1;
        $vacancy = DB::table('vacancies')->orderBy('expiray_date', 'desc')->get();
        return view('careers',['vacancy'=>$vacancy, 'i'=>$i ],);
    }
}
