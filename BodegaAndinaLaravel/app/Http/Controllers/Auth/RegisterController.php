<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
    protected $redirectTo = '/home';

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
            'name' => ['required', 'string', 'max:20'],
            'user' => ['required', 'string', 'max:20', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'country' => ['required'],
            'city' => ['nullable'],
            'avatar' => ['required', 'image'],
            'password' => ['required', 'string', 'min:5', 'confirmed', 'regex:/DH/'],
        ], [
          'required' => 'El campo :attribute no puede quedar vacío',
          'unique' => 'El campo :attribute debe ser modificado',
          'min:5' => 'El campo :attribute debe tener al menos 5 caracteres',
          'max:255' => 'El campo :attribute puede tener un máximo de 255 caracteres',
          'max:20' => 'El campo :attribute puede tener un máximo de 20 caracteres',
          'string' => 'El campo :attribute debe ser texto',
          'email' => 'Los datos ingresados en el campo :attribute no corresponden a un correo electrónico',
          'image' => 'El archivo que intenta subir no es tiene un formato de imagen válido',
          'password.regex' => 'La contraseña debe contener las letras DH en mayusculas y continuadas'

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
      $request = request();

      $profileImage = $request->file('avatar');

      $profileImageName = uniqid('img-') . '.' . $profileImage->extension();

			$profileImage->storePubliclyAs("public/avatars", $profileImageName);

      // dd($profileImageName);
        return User::create([
            'name' => $data['name'],
            'user' => $data['user'],
            'email' => $data['email'],
            'country' => $data['country'],
            'city' => $data['city'],
            // 'older' => $data['older'],
            'avatar' => $profileImageName,
            'password' => Hash::make($data['password'])
        ]);
       // $user = User::create([
       //      'name' => $data['name'],
       //      // 'user' => $data['user'],
       //      'email' => $data['email'],
       //      'country' => $data['country'],
       //      // 'older' => $data['older'],
       //      'avatar' => $profileImageName,
       //      'password' => Hash::make($data['password'])
       //  ]);
       //  // dd($user);
    }

}
