<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\Programme;

class ProgrammeController extends Controller
{
    public function index()
    {
        $dept = Department::select('id', 'dept_name')->get();
        $prog = Programme::all();

        return view('admin.programmes.add', compact('dept', 'prog'));
    }

    public function Store(Request $request)
    {
        $this->validate($request, [
            'prog_name'=>'required|min:5|unique:programmes'],
            ['prog_name.required'=>'You need to enter a programme name.',
                'prog_name.unique'=>"This entry already exists!"]
        );

        if ($request->ajax()) {
            return response()->json(Programme::create($request->all()));
        } else {
            return response()->json(['error' => 'Something went wrong!'], 422);
        }
    }

    public function showProgrammeInformation()
    {
        $prog = $this->ProgInformation();

        //dd($prog);
        return view('admin.programmes.show', compact('prog'));

    }

    public function ProgInformation()
    {
        return Programme::join('departments', 'programmes.dept_id', '=', 'departments.id')
            ->select('programmes.*', 'departments.dept_name')
            ->get();
    }

    public function editProg(Request $request)
    {
        if ($request->ajax()) {
            return response(Programme::find($request->id));
        }
    }

    public function updateProg(Request $request)
    {
        $this->validate($request,[
            'prog_name'=>'required|min:5|unique:programmes'],
            ['prog_name.required'=>'You need to enter a programme name.',
                'prog_name.unique'=>"This entry already exists!"]
        );
        if ($request->ajax()) {
            return response(Programme::updateOrCreate(['id'=>$request->prog_id], $request->all()));
        }
    }
}
