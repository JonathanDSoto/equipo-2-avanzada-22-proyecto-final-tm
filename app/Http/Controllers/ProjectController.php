<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
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
        $request->validate([
            'name' => 'required|unique:projects,name', 
            'description' => 'required',
            'company' => 'required',
            'leader' => 'required',
            'user_amount' => 'required|numeric',
            'budget' => 'required|numeric',
            'status' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);
 
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

        $p = $project->first();

       $project->users = ($p->modules[0]->users->unique('id')); // usuarios no repiten aunque temgan varios modulos 
        
        $project->percentage_advance = ProjectController::percentage_advance($id);
        $users = User::all();
        #return $project;
        return view('proyects.show', compact('project', 'users'));
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
         $request->validate([
            'name' => 'required|unique:projects,name,'.$request->id, 
            'description' => 'required',
            'company' => 'required',
            'leader' => 'required',
            'user_amount' => 'required|numeric',
            'budget' => 'required|numeric',
            'status' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]); 
    
        $project = Project::find($request->id);
 
        $project->fill($request->all());
        $project->push();
        return redirect()->back()->with('info', 'Registro editado correctamente');    
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

       // return redirect()->back()->with('info', 'Registro eliminado correctamente');
       return redirect()->action([ProjectController::class, 'index'])->with('info', 'Registro eliminado correctamente');;
    }

    public static function percentage_advance($id){
        $p = Project::where('id', $id)
        ->with('modules.users')->first();

        $perc = 0;
        foreach($p->modules as $module){// recorremos los modulos del proyecto
              $perc += ($module->users[0]->pivot->percentage_advance) ?? 0; // todos los usuarios del modulo marcaraan el mismo avance
          //    print_r('modulo     '.$module->id. "        avance :  ".$module->users[0]->pivot->percentage_advance.' ');
        }
        return $perc/$p->modules->count();
    }
}
