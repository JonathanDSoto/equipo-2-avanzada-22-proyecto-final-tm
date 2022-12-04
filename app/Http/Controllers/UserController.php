<?php

namespace App\Http\Controllers;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        if( Auth()->user()->id != $user->id && $user){
           $user->delete();
            return redirect()->action([UserController::class, 'index'])->with('info', 'Registro eliminado correctamente');;
        }

        return redirect()->action([UserController::class, 'index']);
      //  return redirect()->back()->with('info', 'Registro borrado correctamente');
    }
 
    public function store(Request $request){

    //    dd($request);
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'phone' => 'required|numeric|min:10',
            'address' => 'required',
            'NSS' => 'required|numeric|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'verify_code' => 'required|digits:4',
            'position' => 'required',
            'salary' => 'required|numeric',
            // 'hired' => 'required|date'
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
            'hired' => Carbon::now()
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
         //   'password' => 'required',
          //  'verify_code' => 'required|digits:4',
            'position' => 'required',
            'salary' => 'required|numeric',
       //     'hired' => 'required|date'
        ]);
 

/*         if(isset($request->password)){
            $request['password'] =  Hash::make($request->password);
        }
        if(isset($request['verify_code'])) {
            $request['verify_code'] = Hash::make($request->verify_code);
        } */
        $user = User::where('id', $request->id)
        ->update([
            'name' => $request->name,
            'username' => $request->username,
            'phone' =>  $request->phone,
            'email' => $request->email,
            'address' => $request->address, 
            'email' => $request->email,
            'NSS' => $request->NSS,
           // 'password' => Hash::make($request->password),
           // 'verify_code' => Hash::make($request->verify_code),
            'position' => $request->position,
            'salary' => $request->salary,
            // 'hired' => $request->hired
        ]);

    

        return redirect()->back()->with('info', 'Usuario editado correctamente');
    }
}
