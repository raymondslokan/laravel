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
    protected $redirectTo = '/';

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
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'timezone' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'terms' => 'accepted',
            // 'g-recaptcha-response' => function($attribute, $value, $fail) {
            //     // Get cURL resource
            //     $curl = curl_init();
            //     // Set some options - we are passing in a useragent too here
            //     curl_setopt_array($curl, array(
            //       CURLOPT_RETURNTRANSFER => 1,
            //       CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify',
            //       CURLOPT_POST => 1,
            //       CURLOPT_POSTFIELDS => array(
            //           'secret' => '6LfqiFkUAAAAAKn2LqB-S7ETW1UO4UQPcnwTBvZf',
            //           'response' => $value
            //       )
            //     ));
            //     // Send the request & save response to $resp
            //     // looking for $resp->success to be true
            //     $resp = json_decode(curl_exec($curl));
            //     // Close request to clear up some resources
            //     curl_close($curl);
            //
            //     if (!$resp->success) {
            //         return $fail('Recaptcha failed, please try again.');
            //     }
            // },
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
        return User::create([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'timezone' => $data['timezone'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
