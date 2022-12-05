<?php

namespace App\Http\Controllers;

use App\Models\Assistance;
use App\Models\Project;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
       $users = User::all();
       return view('users.index', compact('users'));
    }

    public function show($id){
        $user = User::where('id', $id)
        ->with('modules')
        ->firstOrFail();
       
        $project_ids = User::find($id)->modules()->get()->unique('project_id');
        
        $user->project_amount =  $project_ids->count();

        $user->projects = Project::whereIn('id', $project_ids->pluck('id'))
        ->with('modules.users:id,position')->get();

        $sum = 0;
        $a = Assistance::where('user_id', $id)->get()->each(
            function($item, $key) use(&$sum){
                $sum += Carbon::make($item->created_at)->diffInHours(Carbon::make($item->out_time));
            }
        );

        

        foreach($user->projects as $project){
            $project->percentage_advance = ProjectController::percentage_advance($project->id);
        }

    //    return ProjectController::percentage_advance(1);
        $user->total_hours_worked = $sum;  
        $user->finnished_projects = $user->projects->where('status', 'Finalizado')->count();
        return view('users.show', compact('user'));
    }

    public function destroy($id){
        $user = User::where('id', $id)->firstOrFail();

        if( Auth()->user()->id != $user->id && $user){

            if($user->avatar){
                $path = public_path("images/users/$user->avatar");
                File::delete($path);
            }
            
            $user->delete();
            return redirect()->action([UserController::class, 'index'])->with('info', 'Registro eliminado correctamente');


        }

        return redirect()->action([UserController::class, 'index']);
      //  return redirect()->back()->with('info', 'Registro borrado correctamente');
    }
 
    public function store(Request $request){

   //     dd($request);
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
            'avatar' => 'image'
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

        
        if($request->has('avatar')){
            $imageName = time() . '.' . $request->avatar->extension(); 
            $request->avatar->move(public_path('images/users'), $imageName);
            $user->avatar = $imageName;
            $user->save();
        }

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
       //     'hired' => 'required|date',
            'avatar' => 'image'
        ]);
 

 
        $user = User::where('id', $request->id)->first();

            $user->name = $request->name;
            $user->username = $request->username;
            $user->phone =  $request->phone;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->email = $request->email;
            $user->NSS = $request->NSS;
           // 'password' => Hash::make($request->password),
           // 'verify_code' => Hash::make($request->verify_code),
            $user->position = $request->position;
            $user->salary = $request->salary;
    
          
        if($request->has('avatar')){

            if($user->avatar){
                $path = public_path("images/users/$user->avatar");
                File::delete($path);
            }
            
            $imageName = time() . '.' . $request->avatar->extension(); 
            $request->avatar->move(public_path('images/users'), $imageName);
            $user->avatar = $imageName;
        }
        $user->save();
        return redirect()->back()->with('info', 'Usuario editado correctamente');
    }
}
