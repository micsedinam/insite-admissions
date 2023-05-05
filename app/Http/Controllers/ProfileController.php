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

        return view('student.profile.profile', compact('dept'));
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
        $request->validate( 
            [
                'index_number' => 'required|unique:profiles',
                'profile_photo' => 'required|mimes:jpg,png,jpeg|max:2048'
            ],
            // ['index_number.required'=>'You need to enter an index number.',
            //     'profile_photo.required'=>'You need to upload a photo.',
            //     'index_number.unique'=>'This index number already exists!',
            // ]
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
                //'prog_id' => $request['prog_id'],
                'semester' => $request['semester'],
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

        return redirect('student/edit/profile');
    
        /* if ($request->ajax()) {

            Profile::updateOrCreate(
                ['user_id' => Auth::id()],
                [
                    'level' => $request['level'],
                    'dept_id' => $request['dept_id'],
                    //'prog_id' => $request['prog_id'],
                    'semester' => $request['semester'],
                    'index_number' => $request['index_number'],
                    'profile_photo' => $profilephoto,
                ]
            );
            
            return response()->json(['success' => "Saved Successfully"], 201);
        } else {
            return response()->json(['error' => 'Something went wrong!'], 422);
        } */
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
    public function edit()
    {
        $dept = Department::all();

        $profile = Profile::where('user_id', Auth::id())->first();
        //dd($profile);

        return view('student.profile.edit_profile', compact('profile', 'dept'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //dd($request->all());

        //dd($request->dept_id);
        //dd($request->profile_photo);
        $request->validate( 
            [
                //'index_number' => 'required|unique:profiles|min:14|max:14',
                'profile_photo' => 'mimes:jpg,png,jpeg|max:2048'
            ],
            [
                //'index_number.required'=>'You need to enter an index number.',
                'profile_photo.required'=>'You need to upload a photo.',
                'index_number.unique'=>'This index number already exists!',
                'index_number.min'=>'Your index number cannot be less than 14 characters Eg. IMC/BJ/19/0001',
                'index_number.max'=>'Your index number cannot be more than 14 characters Eg. IMC/BJ/19/0001',
            ]
        );

        //dd($request->dept_id);

        if ($request->hasFile('profile_photo')) {
            // saving the image
            $myprofilephoto = time() .'-'. Auth::user()->name . '-'. 'Profile' . '.' . $request->profile_photo->extension();

            //dd($myprofilephoto);

            $request->profile_photo->move(public_path('image_uploads'), $myprofilephoto);
        }

        //dd($request->dept_id);


        $profile = Profile::findOrFail($request->id);

        //dd($profile);
        
        if ($request->profile_photo == null) {
            $profile->level = $request['level'];
            //dd($request->dept_id);
            $profile->dept_id = $request['dept_id'];
            $profile->semester = $request['semester'];
            $profile->index_number = $request['index_number'];
            $profile->save();
        } else {
            $profile->level = $request['level'];
            //dd($request->dept_id);
            $profile->dept_id = $request['dept_id'];
            $profile->semester = $request['semester'];
            $profile->index_number = $request['index_number'];
            $profile->profile_photo = $myprofilephoto;
            $profile->save();
        }
        
       

        if ($profile->save()) {
            alert()->success(Auth::user()->name .' your profile has been updated.', 'Awesome')->persistent("Close this"); 
        } else {
            alert()->error('Something went wrong')->persistent("Close this");
        }

        return redirect('student/edit/profile');
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
