<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Convention;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
     
    // public function __construct()
    // {
    //     $this->middleware(['auth','verified','role:admin']);
    // }
    // display all users

     public function index()
     {
         $users = User::all();
         $conventions = Convention::all();
 
         return view('users.index', compact('users','conventions'));
     }

     // display all users

     public function display_stagiaire()
     {
         $users = User::all();
         $conventions = Convention::all();
 
         return view('users.categorie.stagiaire', compact('users','conventions'));
     }

     // display all users

     public function display_encadrant()
     {
         $users = User::all();
         $conventions = Convention::all();
 
         return view('users.categorie.Encadrant', compact('users'));
     }

     // display all users

     public function display_RH()
     {
         $users = User::all();
 
         return view('users.categorie.RH', compact('users'));
     }

     // edit function

     public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));        
    }

    // update function

    public function update(Request $request, $id)
        {
            $request->validate([
                'name'=>'required',
                'email'=>'required'
            ]);

            $user = User::find($id);
            $user->name =  $request->get('name');
            $user->email = $request->get('email');
            $user->role = $request->get('role');
            $user->save();

            return redirect('/users')->with('success', 'User updated!');
        }

    // Create function

    public function create() { return view('users.create'); }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required'
        ]);

        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'role' => $request->get('role'),
            'password' => Hash::make($request->get('password'))

        ]);
        $user->save();
        return redirect('/users')->with('success', 'Contact saved!');
    }

    // Destroy function

    public function destroy($id)
        {
        $user = User::find($id);
        $user->delete();

        return redirect('/users')->with('success', 'Users deleted!');
    }

 
}

    
