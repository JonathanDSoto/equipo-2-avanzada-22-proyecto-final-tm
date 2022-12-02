<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
       $users = User::all();
       return view('users.index', compact('users'));
    }

    public function show($id){
        $user = User::where('id', $id)
        ->with('modules.project:id,name')
        ->firstOrFail();
        return view('users.show', compact('user'));
    }

    public function destroy($id){
        $user = User::where('id', $id)->firstOrFail();

        if($user){
            $user->delete();
        }
        return redirect()->back()->with('info', 'Registro borrado correctamente');
    }
 
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'phone' => 'required|numeric|min:10',
            'address' => 'required',
            'NSS' => 'required|unique:users,NSS',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'verify_code' => 'required|digits:4',
            'position' => 'required',
            'salary' => 'required|numeric',
            'hired' => 'required|date'
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'phone' => $request->phone,
            'address' => $request->address,
            'NSS' => $request->NSS,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'verify_code' => Hash::make($request->verufy_code),
            'position' => $request->position,
            'salary' => $request->salary,
            'hired' => $request->hired
        ]);

        return redirect()->back()->with('info', 'Usuario creado correctamente');
    }

    public function update(Request $request){
        $request->validate([
            'name' => 'required',
            'username' => "required|unique:users,username,".$request->id,
            'phone' => 'required|numeric|min:10',
            'address' => 'required',
            'NSS' => "required|unique:users,NSS,".$request->id,
            'email' => "required|email|unique:users,email,".$request->id,
            'password' => 'required',
            'verify_code' => 'required|digits:4',
            'position' => 'required',
            'salary' => 'required|numeric',
            'hired' => 'required|date'
        ]);
 

        $user = User::where('id', $request->id)
        ->update([
            'name' => $request->name,
            'email' => $request->username,
            'phone' =>  $request->phone,
            'address' => $request->address, 
            'NSS' => $request->NSS,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'verify_code' => Hash::make($request->verify_code),
            'position' => $request->position,
            'salary' => $request->salary,
            'hired' => $request->hired
        ]);

        return redirect()->back()->with('info', 'Usuario editado correctamente');
    }
}