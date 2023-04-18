<?php

namespace App\Http\Controllers;

use App\Models\vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/createjob');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $res=new vacancy();
        $res->title=$request->input('title');
        $res->description=$request->input('description');
        $res->expiray_date=$request->input('expiray');
        $res->save();
        $request->session()->flash('status','Job Created Successfully');
        return redirect('/admin/jobs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function show(vacancy $vacancy)
    {
        //
        $i=1;

        return view('/admin/jobs', ['i'=>$i])->with('vacancy',vacancy::paginate(8));
    }
    public function empshow(vacancy $vacancy)
    {
        //
        $i=1;

        return view('/employee/alljobs', ['i'=>$i])->with('vacancy',vacancy::orderBy('expiray_date', 'DESC')->paginate(10));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function edit(vacancy $vacancy,$id)
    {
        //
        return view('/admin/editjob')->with('vacancy',vacancy::find($id) );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vacancy $vacancy)
    {
        //
        $res=vacancy::find($request->id);
        $res->title=$request->input('title');
        $res->description=$request->input('description');
        $res->expiray_date=$request->input('expiray');
        $res->save();
        $request->session()->flash('status','Job Updated Successfully');
        return redirect('/admin/jobs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function destroy(vacancy $vacancy,$id , Request $request)
    {
        vacancy::destroy($id);
        $request->session()->flash('status','Job Deleted Successfully');
        return redirect('/admin/jobs');
    }
}
