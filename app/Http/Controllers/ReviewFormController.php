<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Form;
use App\Models\Programme;
use App\Models\ReviewForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $show = DB::table('forms')
            ->join('users', 'forms.user_id', '=', 'users.id')
            ->join('departments', 'forms.dept_id', '=', 'departments.id')
            ->join('programmes', 'forms.prog_id', '=', 'programmes.id')
            ->where('forms.form_complete', '=', 'Yes')
            ->where('forms.review_status', '=', null)
            ->select('forms.*', 'departments.dept_name', 'programmes.prog_name', 'users.name')
            ->latest()
            ->paginate(8);

        // $review = DB::table('review_forms')
        //     ->join('forms', 'review_forms.form_id', '=', 'forms.form_id')
        //     ->select('review_forms.*', 'forms.*')
        //     ->paginate(8);

        //dd($review);
        //dd($show);

        return view('admin.applications.show', compact('show'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $forms = Form::findOrFail($id);

        $department = Department::all();
        $programme = Programme::all();
        $view = DB::table('forms')
            ->join('departments', 'forms.dept_id', '=', 'departments.id')
            ->join('programmes', 'forms.prog_id', '=', 'programmes.id')
            ->select('departments.dept_name', 'programmes.prog_name')
            ->first();

        $review = DB::table('review_forms')
            ->join('forms', 'review_forms.form_id', '=', 'forms.form_id')
            ->select('review_forms.status')
            ->get();

        //dd($review);

        //dd($updates);

        return view('admin.applications.review', compact('forms', 'department', 'programme', 'view', 'review'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request, $id)
    {

        //dd($request->all());

        $this->validate($request, [
            'status' => 'required',
            'form_id' => 'required|unique:review_forms'],
            ['status.required'=>'You need to choose an option.',
                'form_id.unique'=>"This entry already exists! Check 'Status Update tab' to make a change."]
        );

        //dd($request->all());

        $form_status = Form::findOrFail($id);
        $form_status->review_status = $request['status'];
        $form_status->save();

        if ($request->ajax()) {
            return response()->json(ReviewForm::create($request->all()));
        } else {
            return response()->json(['error' => 'Something went wrong!'], 422);
        }
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
        $review = ReviewForm::findOrFail($id);

        /* if ($request->ajax()) {
            return response(ReviewForm::find($request->id));
        } */

        return view('admin.applications.status-edit', compact('review'));
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
        //dd($request->all());
        $this->validate($request,[
            'status.required'=>'You need to select an option',
            ]
        );

        //dd($request->all());

        $form_status = Form::findOrFail($request['form_id']);
        $form_status->review_status = $request['status'];

        if ($form_status->update()) {
            //dd($request->all());
            $review = ReviewForm::findOrFail($id);
            $review->user_id = $request['user_id'];
            $review->form_id = $request['form_id'];
            $review->status = $request['status'];
            $review->update();
            
            //alert()->success($request['status'].' successfully saved.', 'Awesome')->persistent("Close this");
            return view('admin.applications.status-edit', compact('review'))->with('success', $request['status'].' successfully saved.');
        } else {
            alert()->error($request['status'].' not saved.')->persistent("Close this");
        }
    
        return view('admin.applications.status-edit', compact('review'));
        

        /* if ($request->ajax()) {
            return response(ReviewForm::updateOrCreate(['id'=>$request->status_id], $request->all()));
        } */
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

    public function applicationStatus()
    {
        $status = DB::table('review_forms')
            ->join('forms', 'review_forms.form_id', '=', 'forms.form_id')
            ->select('review_forms.*', 'forms.firstname', 'forms.lastname', 'forms.othername')
            ->latest()
            ->get();

        $forms = DB::table('forms')->get();

        //dd($status);

        return view('admin.applications.status', compact('status', 'forms'));
    }

    public function reviewed()
    {
        $reviewed = DB::table('forms')
            ->join('users', 'forms.user_id', '=', 'users.id')
            ->join('departments', 'forms.dept_id', '=', 'departments.id')
            ->join('programmes', 'forms.prog_id', '=', 'programmes.id')
            ->where('forms.form_complete', '=', 'Yes')
            ->where('forms.review_status', '!=', null)
            ->select('forms.*', 'departments.dept_name', 'programmes.prog_name', 'users.name')
            ->latest()
            ->paginate(8);

        return view('admin.applications.reviewed', compact('reviewed'));
    }

    public function showReviewed($id)
    {
        $forms = Form::findOrFail($id);

        /* $department = Department::all();
        $programme = Programme::all(); */
        $view = DB::table('forms')
            ->join('departments', 'forms.dept_id', '=', 'departments.id')
            ->join('programmes', 'forms.prog_id', '=', 'programmes.id')
            ->select('departments.dept_name', 'programmes.prog_name')
            ->first();

        return view('admin.applications.show_reviewed', compact('forms', 'view'));
    }
}
