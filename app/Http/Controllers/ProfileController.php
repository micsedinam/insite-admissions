<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Profile;
use App\Models\Programme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dept = Department::all();
        //$prog = Programme::all();
        $profile = Profile::where('user_id', Auth::id())->first();
        //dd($profile);

        return view('student.profile', compact('dept', 'profile'));
    }

    public function showProgramme(Request $request)
    {
        if ($request->ajax()) {
            return response(Programme::where('dept_id', $request->dept_id)->get());
        }
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
        //dd($request->all());

        //dd($request->profile_photo);
        $this->validate($request, 
            [
                'profile_photo' => 'required|mimes:jpg,png,jpeg|max:1999'
            ]
        );

        if ($request->hasFile('profile_photo')) {
            // saving the image
            $profilephoto = time() .'-'. Auth::user()->name . '-'. 'Profile' . '.' . $request->profile_photo->extension();

            //dd($profilephoto);

            $request->profile_photo->move(public_path('image_uploads'), $profilephoto);
        }

        $data = Profile::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'level' => $request['level'],
                'dept_id' => $request['dept_id'],
                'prog_id' => $request['prog_id'],
                'index_number' => $request['index_number'],
                'profile_photo' => $profilephoto,
            ]
        );
        //dd($data);
        //$data->save();

        if ($data->save()) {
            alert()->success(Auth::user()->name .' your profile has been updated.', 'Awesome')->persistent("Close this");
        } else {
            alert()->error('Something went wrong')->persistent("Close this");
        }
    
        return redirect()->back();

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
