<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jobs = DB::table('vacancies')->where('expiray_date','>=', now()->toDateString())->count();
        $expiray = DB::table('vacancies')->where('expiray_date','<', now()->toDateString())->count();

        return view('/admin/home',['jobs'=>$jobs, 'expiray'=>$expiray] );
    }
  
}
