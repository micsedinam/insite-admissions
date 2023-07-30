<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use UxWeb\SweetAlert\SweetAlert;

class AdminRegisterController extends Controller
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
    protected $redirectTo = 'admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('is_admin');
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
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $request
     * @return \App\User
     */
    protected function create(Request $request)
    {
        $register = User::create(
            [
            'name' => $request['name'],
            'email' => $request['email'],
            'is_admin' => $request['is_admin'],
            'password' => Hash::make($request['password']),
            ]
        );

        if ($register->save()) {
            //alert()->success($request['name'].' successfully saved.', 'Awesome')->persistent("Close this");
            return view('auth.admin-register')->with("success", $request['name'].' successfully saved.', 'Awesome');
        } else {
            //alert()->error($request['name'].' not saved.')->persistent("Close this");
            return view('auth.admin-register')->with("success", $request['name'].' not saved.');
        }
    
    }

    public function resetPassword(Request $request)
    {
        //dd($request->all());

        $new_pass = Str::random(10);

        //dd($new_pass);

        $user = User::where('email', $request->email)->select('id')->first();

        //dd($user);


        if ($user == NULL) {
            
            //$message = "Email does not exist. Kindly check and try again";

            //alert()->error($message, 'Sorry!')->persistent();

            return redirect()->back()->with('error', "Sorry!, Email does not exist. Kindly check and try again");

        }

        $reset = User::find($user->id);

        //dd($reset);

        $reset->password = Hash::make($new_pass);

        //dd($reset->password);
        
        if ($reset->save()) {


            //$message = $reset->name."'s new password is: ".$new_pass;

            //alert()->info($message, 'Hi there!')->persistent();

            return redirect()->back()->with('info','Hi there!'. $reset->name."'s new password is: ".$new_pass);

        } else {
            
            //$message = "Nothing happened. Kindly contact technical support";

            //alert()->info($message, 'Hi there!')->persistent();

            return redirect()->back()->with('info','Nothing happened. Kindly contact technical support');
        }
    }
}
