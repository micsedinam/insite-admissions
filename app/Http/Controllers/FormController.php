<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Form;
use App\Models\Programme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use UxWeb\SweetAlert\SweetAlert;

class FormController extends Controller
{
    public function view() { 

        $department = Department::all();
        $programme = Programme::all();

        return view('applicant.applications.apply', compact('department', 'programme')); 
    }  

    public function showProgramme(Request $request)
    {
        if ($request->ajax()) {
            return response(Programme::where('dept_id', $request->dept_id)->get());
        }
    }
  
    public function create(Request $request) { 

        //dd($request->all());
        // $alreadyFiled = Form::select('user_id')
        //     //->where('user_id', Auth::id())
        //     ->first();

        //dd($alreadyFiled);

        //Picking user_ids from the forms table
        // $id = $alreadyFiled->user_id;

        // dd($id);

        //Checking if authenticated user has filled the form or not
        // if (Auth::id() === $id) {
        //     return response()->json(['Error'=>'You have already filled this form']);
        // } else {
            //proceed to validate uploads and save form content

            $request->validate(
                [
                'passport_photo' => 'required|mimes:jpg,png,jpeg|max:5048',
                'certificate_upload' => 'required|mimes:pdf|max:20480'
                ]
            );

            // saving the image
            $newImageName = time() .'-'. $request->firstname . '-' . $request->lastname . '-'. 'Passport' . '.' . $request->passport_photo->extension();

            //dd($newImageName);

            $request->passport_photo->move(public_path('image_uploads'), $newImageName);
            
            // saving the document
            $newFileName = time() .'-'. $request->firstname . '-' . $request->lastname . '-'. 'Certificate' . '.' . $request->certificate_upload->extension();

            $request->certificate_upload->move(public_path('document_uploads'), $newFileName);

            //dd($request->all());

            $form = Form::create(
                [
                'user_id' => Auth::id(),
                'firstname' => $request['firstname'],
                'othername' => $request['othername'],
                'lastname' => $request['lastname'],
                'dob' => $request['dob'],
                'phone' => $request['phone'],
                'email' => $request['email'],
                'post_address' => $request['post_address'],
                'gender' => $request['gender'],
                'country' => $request['country'],
                'nationality' => $request['nationality'],
                'marital_status' => $request['marital_status'],
                'children' => $request['children'],
                'residence' => $request['residence'],
                'physical_challenge' => $request['physical_challenge'],
                'challenge' => $request['challenge'],
                'dept_id' => $request['dept_id'],
                'prog_id' => $request['prog_id'],
                'duration' => $request['duration'],
                'prog_choice' => $request['prog_choice'],
                'hostel' => $request['hostel'],
                'instruction_language' => $request['instruction_language'],
                'lecture_period' => $request['lecture_period'],
                'school_attended' => $request['school_attended'],
                'year_started' => $request['year_started'],
                'year_completed' => $request['year_completed'],
                'certificate_name' => $request['certificate_name'],
                'one_referee_name' => $request['one_referee_name'],
                'one_referee_phone' => $request['one_referee_phone'],
                'one_referee_email' => $request['one_referee_email'],
                'one_referee_occupation' => $request['one_referee_occupation'],
                'one_referee_address' => $request['one_referee_address'],
                'two_referee_name' => $request['two_referee_name'],
                'two_referee_phone' => $request['two_referee_phone'],
                'two_referee_email' => $request['two_referee_email'],
                'two_referee_occupation' => $request['two_referee_occupation'],
                'two_referee_address' => $request['two_referee_address'],
                'form_complete' => $request['form_complete'],
                'passport_photo' => $newImageName,
                'certificate_upload' => $newFileName,
                ]
            );

        if ($form->save()) {
            alert()->success($request['firstname'].' '.$request['lastname'].' successfully saved.', 'Awesome')->persistent("Close this");
        } else {
            alert()->error($request['firstname'].' '.$request['lastname'].' not saved.')->persistent("Close this");
        }
    
        return view('user/home');
    }

    public function showApplicantForm()
    {
        $show = DB::table('forms')
            ->join('users', 'forms.user_id', '=', 'users.id')
            ->join('departments', 'forms.dept_id', '=', 'departments.id')
            ->join('programmes', 'forms.prog_id', '=', 'programmes.id')
            ->where('users.id', '=', Auth::id())
            ->select('forms.*', 'departments.dept_name', 'programmes.prog_name', 'users.name')
            ->get();
        
        //dd($show);

        return view('applicant.applications.show', compact('show'));
    }

    public function edit($id)
    {
        $forms = Form::findOrFail($id);

        $department = Department::all();
        $programme = Programme::all();
        $updates = DB::table('forms')
            ->join('departments', 'forms.dept_id', '=', 'departments.id')
            ->join('programmes', 'forms.prog_id', '=', 'programmes.id')
            ->select('departments.dept_name', 'programmes.prog_name')
            ->first();

        //dd($updates);

        return view('applicant.applications.edit', compact('updates', 'department', 'programme', 'forms'));
    }

    public function update(Request $request, Form $form) { 

        //dd($request->all());

        //$form_update = Form::findOrFail($id);
        // $alreadyFiled = Form::select('user_id')
        //     //->where('user_id', Auth::id())
        //     ->first();

        //dd($alreadyFiled);

        //Picking user_ids from the forms table
        // $id = $alreadyFiled->user_id;

        // dd($id);

        //Checking if authenticated user has filled the form or not
        // if (Auth::id() === $id) {
        //     return response()->json(['Error'=>'You have already filled this form']);
        // } else {
            //proceed to validate uploads and save form content

            /* $request->validate(
                [
                'passport_photo' => 'required|mimes:jpg,png,jpeg|max:5048',
                'certificate_upload' => 'required|mimes:pdf|max:20480'
                ]
            ); */

        // saving the image
        $newImageName = time() .'-'. $request->firstname . '-' . $request->lastname . '-'. 'Passport' . '.' . $request->passport_photo->extension();

        //dd($newImageName);
        $request->passport_photo->move(public_path('image_uploads'), $newImageName);
            
            // saving the document
        if ($request->certificate_upload == "") {
            //dd($request->all());
        } else {
            $newFileName = time() .'-'. $request->firstname . '-' . $request->lastname . '-'. 'Certificate' . '.' . $request->certificate_upload->extension();

            $request->certificate_upload->move(public_path('document_uploads'), $newFileName);

            //dd($newFileName);
        }
            
            

        //dd($request->all());

        // $form = Form::update(
        //     [
        //     'user_id' => Auth::id(),
        //     'firstname' => $request['firstname'],
        //     'othername' => $request['othername'],
        //     'lastname' => $request['lastname'],
        //     'dob' => $request['dob'],
        //     'phone' => $request['phone'],
        //     'email' => $request['email'],
        //     'post_address' => $request['post_address'],
        //     'gender' => $request['gender'],
        //     'country' => $request['country'],
        //     'nationality' => $request['nationality'],
        //     'marital_status' => $request['marital_status'],
        //     'children' => $request['children'],
        //     'residence' => $request['residence'],
        //     'physical_challenge' => $request['physical_challenge'],
        //     'challenge' => $request['challenge'],
        //     'dept_id' => $request['dept_id'],
        //     'prog_id' => $request['prog_id'],
        //     'duration' => $request['duration'],
        //     'prog_choice' => $request['prog_choice'],
        //     'hostel' => $request['hostel'],
        //     'instruction_language' => $request['instruction_language'],
        //     'lecture_period' => $request['lecture_period'],
        //     'school_attended' => $request['school_attended'],
        //     'year_started' => $request['year_started'],
        //     'year_completed' => $request['year_completed'],
        //     'certificate_name' => $request['certificate_name'],
        //     'one_referee_name' => $request['one_referee_name'],
        //     'one_referee_phone' => $request['one_referee_phone'],
        //     'one_referee_email' => $request['one_referee_email'],
        //     'one_referee_occupation' => $request['one_referee_occupation'],
        //     'one_referee_address' => $request['one_referee_address'],
        //     'two_referee_name' => $request['two_referee_name'],
        //     'two_referee_phone' => $request['two_referee_phone'],
        //     'two_referee_email' => $request['two_referee_email'],
        //     'two_referee_occupation' => $request['two_referee_occupation'],
        //     'two_referee_address' => $request['two_referee_address'],
        //     'passport_photo' => $newImageName,
        //     'certificate_upload' => $newFileName,
        //     ]
        // );

        //dd($request->all());

        if ($form->update($request->all('firstname', 'othername', 'lastname', 'dob', 'phone', 'email', 'post_address', 'gender', 'country', 'nationality', 'marital_status', 'children', 'residence', 'physical_challenge', 'challenge', 'passport_photo', 'dept_id', 'prog_id', 'duration', 'prog_choice', 'hostel', 'instruction_language', 'lecture_period', 'school_attended', 'year_started', 'year_completed', 'certificate_name', 'certificate_upload', 'one_referee_name', 'one_referee_phone', 'one_referee_email', 'one_referee_occupation', 'one_referee_address', 'two_referee_name', 'two_referee_phone', 'two_referee_email', 'two_referee_occupation', 'two_referee_address'))) {
            alert()->success($request['firstname'].' '.$request['lastname'].' successfully saved.', 'Awesome')->persistent("Close this");
        } else {
            alert()->error($request['firstname'].' '.$request['lastname'].' not saved.')->persistent("Close this");
        }
    
        return view('/dashboard', compact('form'));
    }
}
