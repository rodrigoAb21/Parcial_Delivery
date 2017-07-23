<?php

namespace deli\Http\Controllers\Auth;

use deli\User;
use deli\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

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
            'ci' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono1' => 'required|string|max:255',
            'nacimiento' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \deli\User
     */
    protected function create(array $data)
    {
        return User::create([
            'ci' => $data['ci'],
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'direccion' => $data['direccion'],
            'telefono1' => $data['telefono1'],
            'nacimiento' => $data['nacimiento'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'visible' => '1',
        ]);
    }



    //********************************MODIFICANDO PARA EL PERSONAL**********************************
    public function showRegistrationForm()
    {
        return view('admin.register');
    }

    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/admin';
    }


}
