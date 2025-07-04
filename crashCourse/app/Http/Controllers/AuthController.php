<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request){
        // validation
        $fields = $request->validate(// $fields gets the fields if they are valid
            [
                'username' => ['required' , 'max:255'],
                'email' => ['required' , 'max:255' , 'email' , 'unique:users'],
                'password' => ['required' , 'max:255' , 'min:3' , 'confirmed']
            ]
        );// if a field is not valid , this function returns an error message to the webpage saying whats wrong with the field and dont continue executing

        //registration
        // btw , laravel automaticly hash ur password if u call it password
        $user = User::create($fields); // this function create a new user with the mentionned fields
    
        //login the user
        Auth::login($user);

        //redirect the user to the home page
        return redirect()->route('/');
    }

    public function login(Request $request){
        $fields = $request->validate(// $fields gets the fields if they are valid
            [
                'email' => ['required' , 'max:255' , 'email'],
                'password' => ['required' , 'max:255' , 'min:3']
            ]
        );

        if(Auth::attempt($fields , $request->remembre)){// attempt() search automaticly on the users table for a user with the same email,
            return redirect()->intended(); // intended() redirects the user where he wanted to go (by default its '/')
        }
        else{
            return back()->withErrors([
                'failed' => 'the credentials do not match our records'//failed is gonna be used in the view to show the error message
            ]);
        }
    }

    public function logout(Request $request){
        //logout user (remove the session and the remembre me session)
        Auth::logout(); 

        //invalidate user's session 
        $request->session()->invalidate();//Destroys all session data & Prevents session fixation attacks.

        //redirect to home
        $request->session()->regenerateToken(); //Regenerates the CSRF token stored in the session.

        return redirect('/');
        
    }
}
