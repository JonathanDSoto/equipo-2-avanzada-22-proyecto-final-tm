<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        #return $projects;
        return view('proyects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = new Project();
        $project->name = $request->name;
        $project->description = $request->description;
        $project->company = $request->company;
        $project->leader = $request->leader;
        $project->user_amount = $request->user_amount;
        $project->budget = $request->budget;
        $project->status = $request->status;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->save();
        
        return redirect()->back()->with('info', 'Registro creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::where('id', $id)
        ->with('modules.users')
        ->get();
        #return $project;
        return view('proyects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $project = Project::find($request->id);
/*         $request['name'] = 'name';
        $request['description'] = 'de ad';
        $request['leader'] = 'leader ';
        $request['company'] = 'asd'; 
        $request ['user_amount'] = '1';
        $request ['budget'] = '90000';
        $request ['status'] = 'cancelled';

        $request['start_date'] = Carbon::now();
        $request ['end_date'] = Carbon::now()->addYear(); */
        $project->fill($request->all());
        $project->push();
        return redirect()->back('info', 'Registro editado correctamente');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::where('id', $id)->first();
        
        if($project)
            $project->delete();

        return redirect()->back()->with('info', 'Registro eliminado correctamente');
    }
}
