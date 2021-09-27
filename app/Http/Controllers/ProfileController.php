<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
        // if ADMIN
        if($user->role == 'admin')
        {
            return view('profile.admin', compact('user'));
        }

        // if RH
        if($user->role == 'RH')
        {
            return view('profile.RH', compact('user'));
        }

        // if Encadrant
        if($user->role == 'encadrant')
        {
            return view('profile.encadrant', compact('user'));
        }

        // if stagiaire
        if($user->role == 'stagiaire')
        {
            return view('profile.stagiaire', compact('user'));
        }

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name'=>'required',
            'email'=>'required'
        ]);

        $user = User::find($id);
        // if ADMIN
        if($user->role == 'admin')
        {
            $user->name =  $request->get('name');
            $user->email = $request->get('email');
            $user->password = Hash::make($request->get('password'));
            $user->save();

        return redirect('/admin_dashboard')->with('success', 'Profile updated!');
        }

        // if stagiaire
        if($user->role == 'stagiaire')
        {
            $user->name =  $request->get('name');
            $user->email = $request->get('email');
            $user->password = Hash::make($request->get('password'));
            $user->save();

        return redirect('/stagiaire_dashboard')->with('success', 'Profile updated!');
        }

        // if RH
        if($user->role == 'RH')
        {
            $user->name =  $request->get('name');
            $user->email = $request->get('email');
            $user->password = Hash::make($request->get('password'));
            $user->save();

        return redirect('/RH_dashboard')->with('success', 'Profile updated!');
        }

        // if encadrant
        if($user->role == 'encadrant')
        {
            $user->name =  $request->get('name');
            $user->email = $request->get('email');
            $user->password = Hash::make($request->get('password'));
            $user->save();

        return redirect('/encadrant_dashboard')->with('success', 'Profile updated!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
