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
            ->select('forms.*', 'departments.dept_name', 'programmes.prog_name', 'users.name')
            ->latest()
            ->paginate(8);

        // $review = DB::table('review_forms')
        //     ->join('users', 'review_forms.user_id', '=', 'users.id')
        //     ->select('users.name')
        //     ->get();

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


        //dd($updates);

        return view('admin.applications.review', compact('forms', 'department', 'programme', 'view'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'status' => 'required',
            'form_id' => 'required|unique:review_forms'],
            ['status.required'=>'You need to choose an option.',
                'form_id.unique'=>"This entry already exists! Check 'Status Update tab' to make a change."]
        );

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
    public function edit(Request $request)
    {
        if ($request->ajax()) {
            return response(ReviewForm::find($request->id));
        }
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
        $this->validate($request,[
            'status.required'=>'You need to select an option',
            ]
        );
        if ($request->ajax()) {
            return response(ReviewForm::updateOrCreate(['id'=>$request->status_id], $request->all()));
        }
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

        //dd($status);

        return view('admin.applications.status', compact('status'));
    }
}
