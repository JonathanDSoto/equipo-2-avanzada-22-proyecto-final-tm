<?php

namespace App\Http\Controllers;

use App\Models\module;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $projects = Project::all(); 
        $modules = Module::with('project:id,name')->get();
        return view('modules.index', compact('modules', 'projects', 'users'));
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
        //'name' => 'required|regex:/^[a-zA-Z]+$/u
        $request->validate([
            'name' => 'required|regex:/^[a-zA-Z]+$/u',
            'priority' => 'required|numeric',
            'project_id' => 'required|exists:projects,id'
        ]);
        $module = new Module;
        $module->name = $request->name;
        $module->priority = $request->priority;
        $module->project_id = $request->project_id;

        $module->save();

        return redirect()->back()->with('info', 'Registro creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\module  $module
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $module = Module::find($id)
        ->with('users')
        ->with('project:id,name')
        ->get();


        $users = User::all();
        return view('modules.show', compact('module', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit(module $module)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|regex:/^[a-zA-Z]+$/u',
            'priority' => 'required|numeric',
            'project_id' => 'required|exists:projects,id'
        ]);
        $module = Module::where('id', $request->id)->first();
        $module->name = $request->name;
        $module->priority = $request->priority;
        $module->project_id = $request->project_id;
        $module->save();
        return redirect()->back()->with('info', 'Registro actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $module = Module::find($id);
        if($module)
            $module->delete();

     //   return redirect()->back()->with('info', 'Registro eliminado correctamente');
     return redirect()->action([ModuleController::class, 'index'])->with('info', 'Registro eliminado correctamente');

    }

    
    public function attach_user(Request $request){
        $module = Module::where('id', $request->module_id)->first();
        $user = User::find($request->user_id);
        
        if($module && $user){
            // > $module->users()->syncWithoutDetaching([1 => ['role' => 'asdasd', 'percentage_advance' => 50]])  
            // module->users()->syncWithoutDetaching([1 => ['role' => 'asdasd']])
            $module->users()->syncWithoutDetaching([
                $request->user_id
                =>[
                    'role' => $request->role,
                    'percentage_advance' => $request->percentage_advance    
                ]
            ]);
        }

        return redirect()->back()->with('info', 'Usuario asignado correctamente');

    }
}
