<?php

namespace App\Http\Controllers;

use App\Models\module;
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
 
        $modules = Module::with('project:id,name')->get();
        return view('modules.index', compact('modules'));
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
        return view('modules.show', compact('module'));
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

        return redirect()->back()->with('info', 'Registro eliminado correctamente');
    }
}
