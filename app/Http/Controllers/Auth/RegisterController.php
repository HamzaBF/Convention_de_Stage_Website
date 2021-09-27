<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Employees;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    public function redirectTo() {
        $role = Auth::user()->role; 
            switch ($role) {
            case 'admin':
                return '/admin_dashboard';
            break;
            
            case 'RH':
                return '/RH_dashboard';
            break; 

            case 'encadrant':
                return '/encadrant_dashboard';
            break; 

            case 'stagiaire':
                return '/stagiaire_dashboard';
            break; 
  
            default:
            return '/login'; 
            break;
    }
  }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['string', 'max:255'],
            'g-recaptcha-response' => 'required|captcha'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        
       
        
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            
        ]);

        $encadrant = Employees::where('email',$data['email'])->first();
        if ($encadrant === null) {
            // user doesn't exist
            $user->role = 'stagiaire';
            $user->save();
            return $user;
         }
        
        $user->role = 'encadrant';
        $user->save();
        return $user;
    }
}
