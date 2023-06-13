<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ChangePasswordController extends Controller
{
    public function changePassword(Request $request)
    {
        //dd($request->all());
        $this->validate($request, 
            [
                'password' => 'required|string|min:6|confirmed'
            ],
            [
                'password.confirmed'=>'Your password entries need to be same .'
            ]
        );

        //dd($request->all());

        if ($request->ajax()) {

            return response()->json(
                User::where('id', $request['user_id'])
                    ->update(['password' => Hash::make($request['password'])])
            );
        } else {
            return response()->json(['error' => 'Something went wrong!'], 422);
        }
    }
}
