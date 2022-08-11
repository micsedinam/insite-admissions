<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class testController extends Controller
{
    public function index()
    {
        return view('test');
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
            'email' => ['required', 'email'],
            //'password' => ['required', 'string'],
            ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $request)
    {
        function Pin(
            $length=6
        ) {
            $pin = mt_rand(100000, 999999);
            $count = mb_strlen($pin);
            $result = $pin;
    
            for ($i=0; $i < $length; $i++) { 
                $index = rand(0, $count - 1);
                $result .= mb_substr($index, 1);
            }
            return $pin;
        }

        function Serial()
        {
            $chars = array(0,1,2,3,4,5,6,7,8,9,'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
            $sn = '';
            $max = count($chars)-1;
            for($i=0;$i<12;$i++){
                $sn .= (!($i % 4) && $i ? '-' : '').$chars[rand(0, $max)];
            }
            return $sn;
        }

        $pin = Pin();
        $serial = Serial();
        $message = 'Pin: '.$pin.' Serial Number: '.$serial;

        dd($pin);
        
        //dd($request->all());

        $user = User::create(
            [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'pin' => $pin,
                'password' => Hash::make($serial),
            ]
        );

        return response()->json(['success'=> $message]);
        
        //User::$status = SMSAPI::sendMessage($message,$data['email']);

    }

    
}
