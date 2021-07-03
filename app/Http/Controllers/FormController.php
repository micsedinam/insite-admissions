<?php

namespace App\Http\Controllers;

use App\Models\AdmissionPayments;
use App\Models\Department;
use App\Models\Form;
use App\Models\Programme;
use App\Models\ReviewForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use UxWeb\SweetAlert\SweetAlert;

class FormController extends Controller
{
    public function view() { 

        $department = Department::all();
        $programme = Programme::all();
        // $payments = AdmissionPayments::select('user_id')->get();

        // dd($payments);
        // if (condition) {
        //     # code...
        // } else {
        //     # code...
        // }
        
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
            'passport_photo' => 'required|mimes:jpg,png,jpeg|max:1999',
            'certificate_upload' => 'required|mimes:pdf,jpg,png,jpeg|max:1999'
            ]
        );

        if ($request->hasFile('passport_photo')) {
            // saving the image
            $newImageName = time() .'-'. $request->firstname . '-' . $request->lastname . '-'. 'Passport' . '.' . $request->passport_photo->extension();

            //dd($newImageName);

            $request->passport_photo->move(public_path('image_uploads'), $newImageName);
        }

        if ($request->hasFile('certificate_upload')) {
            // saving the document
            $newFileName = time() .'-'. $request->firstname . '-' . $request->lastname . '-'. 'Certificate' . '.' . $request->certificate_upload->extension();

            //dd($newFileName);

            $request->certificate_upload->move(public_path('document_uploads'), $newFileName);
        }
        
        

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

        //dd($form);

        if ($form->save()) {
            alert()->success($request['firstname'].' '.$request['lastname'].' your application successfully submitted.', 'Awesome')->persistent("Close this");
        } else {
            alert()->error($request['firstname'].' '.$request['lastname'].' your application not submitted.')->persistent("Close this");
        }
    
        return view('applicant.home');
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

    public function update(Request $request, $id) { 

        //dd($request->all());
        //proceed to validate uploads and save form content

        $request->validate(
            [
            'passport_photo' => 'mimes:jpg,png,jpeg|max:1999',
            'certificate_upload' => 'mimes:pdf,jpg,png,jpeg|max:1999'
            ]
        );

        //dd($request->all());

        if ($request->hasFile('passport_photo')) {
            // saving the image
            $updatedImageName = time() .'-'. $request->firstname . '-' . $request->lastname . '-'. 'Passport' . '.' . $request->passport_photo->extension();

            //dd($updatedImageName);
            $request->passport_photo->move(public_path('image_uploads'), $updatedImageName);
        }
        
        if ($request->hasFile('certificate_upload')) {
            // saving the document
            $updatedFileName = time() .'-'. $request->firstname . '-' . $request->lastname . '-'. 'Certificate' . '.' . $request->certificate_upload->extension();

            //dd($updatedFileName);
            $request->certificate_upload->move(public_path('document_uploads'), $updatedFileName);
        }    
            
        //dd($request->all());

        $form = Form::findOrFail($id);

        $form->user_id = Auth::id();
        $form->firstname = $request['firstname'];
        $form->lastname = $request['lastname'];
        $form->othername = $request['othername'];
        $form->dob = $request['dob'];
        $form->phone = $request['phone'];
        $form->email = $request['email'];
        $form->post_address = $request['post_address'];
        $form->gender = $request['gender'];
        $form->country = $request['country'];
        $form->nationality = $request['nationality'];
        $form->marital_status = $request['marital_status'];
        $form->children = $request['children'];
        $form->residence = $request['residence'];
        $form->physical_challenge = $request['physical_challenge'];
        $form->challenge = $request['challenge'];
        $form->dept_id = $request['dept_id'];
        $form->prog_id = $request['prog_id'];
        $form->duration = $request['duration'];
        $form->prog_choice = $request['prog_choice'];
        $form->hostel = $request['hostel'];
        $form->instruction_language = $request['instruction_language'];
        $form->lecture_period = $request['lecture_period'];
        $form->school_attended = $request['school_attended'];
        $form->year_started = $request['year_started'];
        $form->year_completed = $request['year_completed'];
        $form->certificate_name = $request['certificate_name'];
        $form->one_referee_name = $request['one_referee_name'];
        $form->one_referee_phone = $request['one_referee_phone'];
        $form->one_referee_email = $request['one_referee_email'];
        $form->one_referee_occupation = $request['one_referee_occupation'];
        $form->one_referee_address = $request['one_referee_address'];
        $form->two_referee_name = $request['two_referee_name'];
        $form->two_referee_phone = $request['two_referee_phone'];
        $form->two_referee_email = $request['two_referee_email'];
        $form->two_referee_occupation = $request['two_referee_occupation'];
        $form->two_referee_address = $request['two_referee_address'];
        $form->form_complete = $request['form_complete'];
        if ($request->hasFile('passport_photo')) {
            $form->passport_photo = $updatedImageName;
        }
        if ($request->hasFile('certificate_upload')) {
            $form->certificate_upload = $updatedFileName;
        }
        

        //dd($form);

        if ($form->update()) {
            alert()->success($request['firstname'].' '.$request['lastname'].' successfully updated.', 'Awesome')->persistent("Close this");
        } else {
            alert()->error($request['firstname'].' '.$request['lastname'].' not saved.')->persistent("Close this");
        }
    
        return view('applicant.home', compact('form'));
    }
}
