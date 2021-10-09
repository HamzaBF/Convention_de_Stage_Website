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
         $user = User::find(Auth()->id());
 
         
         if($user->role == 'RH')
         {
            return view('users.actions.RH.index', compact('users','conventions'));
         }
 
         if($user->role == 'admin')
         {
            return view('users.actions.admin.index', compact('users','conventions'));
         }
        
         
     }

     // display all users

     public function display_stagiaire()
     {
         $i = 0;
         $users = User::latest()->paginate(12);
         $conventions = Convention::all();
 
         return view('users.categorie.admin.stagiaire', compact('users','conventions','i'));
     }

     // display all users

     public function display_encadrant()
     {
        
        $i = 0;
        $user = User::find(Auth()->id());
        $users = User::latest()->paginate(12);
        $conventions = Convention::all();

        if($user->role == 'RH')
        {
            return view('users.categorie.RH.Encadrant', compact('users','i'));
        }

        if($user->role == 'admin')
        {
            return view('users.categorie.admin.Encadrant', compact('users','i'));
        }
 
         
     }

     // display all users

     public function display_RH()
     {
        $i = 0;
        $users = User::latest()->paginate(12);
        $user = User::find(Auth()->id());
 
         
         if($user->role == 'RH')
         {
            return view('users.categorie.RH.RH', compact('users','i'));
         }
 
         if($user->role == 'admin')
         {
            return view('users.categorie.admin.RH', compact('users','i'));
         }
     }

     // edit function

     public function edit($id)
    {
        $user = User::find($id);
        return view('users.actions.admin.edit', compact('user'));        
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

            return redirect('/users')->with('success', "L'utilisateur est mise à jour !");
        }

    // Create function

    public function create() 
    { 
        $user = User::find(Auth()->id());
        
        if($user->role == 'RH')
         {
            return view('users.actions.RH.create');
         }
 
         if($user->role == 'admin')
         {
            return view('users.actions.admin.create');
         }
    }

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
        return redirect('/users')->with('success', "l'utilisateur est enregistré !");
    }

    // Destroy function

    public function destroy($id)
        {
        $user = User::find($id);
        $user->delete();

        return redirect('/users')->with('success', "l'utilisateur est supprimé !");
    }

 
}

    
