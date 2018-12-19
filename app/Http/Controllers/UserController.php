<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Auth;

use App\User;

class UserController extends Controller
{
    public function index() {
        if (Auth::check()) {
            return redirect('/escritorio');
        } else {
    	   return view('users.index');
        }
    }

    public function signup() {
        if (Auth::check()) {
            return redirect('/escritorio');
        } else {
           return view('users.signup');
        }
    }

    public function store(Request $request) {
    	$rules = [
			'name'      => 'required|min:2',
			'lastname'  => 'required|min:2',
			'email'     => 'required|email|unique:users',
			'password'  => 'required|min:8|max:16',
			'cpassword' => 'same:password',
			'jeffco'    => 'required|confirmed|same:jeffco_confirmation'
    	];

    	$messages = [
			'name.required'     => 'Este campo es necesario',
			'name.min'          => 'Mínimo 2 caracteres',
			
			'lastname.required' => 'Este campo es necesario',
			'lastname.min'      => 'Mínimo 2 caracteres',
			
			'email.required'    => 'Este campo es necesario',
			'email.email'       => 'No tiene formato de e-mail',
			'email.unique'      => 'Ya existe este registro en la base de datos',
			
			'password.required' => 'Este campo es necesario',
			'password.min'      => 'Mínimo 8 caracteres',
			'password.max'      => 'Máximo 16 caracteres',
			
			'cpassword.same'    => 'Las contraseñas no coinciden',
			
			'jeffco.required'   => 'Este campo es necesario',
			'jeffco.confirmed'  => 'Tiene que decir Jeffco',
    	];

    	$validator = Validator::make($request->all(), $rules, $messages);

    	if ($validator->fails()) {
			return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
    	} elseif ($validator->passes()) {
			$user           = new User($request->all());
			$user->name     = $request->name;
			$user->lastname = $request->lastname;
			$user->email    = $request->email;
			$user->password = bcrypt($request->password);
    		$user->save();

    		return redirect('/iniciar-sesion');
    	}
    }

    public function signin(Request $request) {
    	$rules = [
            'email'    => 'required|min:2',
            'password' => 'required|min:8'
        ];

        $messages = [
            'email.required'    => 'Este campo es necesario',
            'email.min'         => 'Este campo necesita al menos 2 caracteres',
            
            'password.required' => 'Este campo es necesario',
            'password.min'      => 'Este campo necesita al menos 8 caracteres',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
        } elseif ($validator->passes()) {
            if (Auth::attempt([
                    'email'    => $request->email,
                    'password' => $request->password,
                    'status'   => true
            ])) {
                return redirect('/escritorio');
            } else {
                return redirect('/iniciar-sesion')
                		->with('login', 'Tus datos son incorrectos o no tienes permisos para acceder');
            }
        }
    }

    public function signout() {
    	Auth::logout();
    	return redirect('/');	
    }
}
