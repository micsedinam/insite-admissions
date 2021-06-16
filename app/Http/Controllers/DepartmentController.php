<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        return view('admin.department.add');
    }

    public function Store(Request $request)
    {
        $this->validate($request, [
            'dept_name' => 'required|min:5|unique:departments'],
            ['dept_name.required'=>'You need to enter a programme name.',
                'dept_name.unique'=>"This entry already exists!"]
        );

        if ($request->ajax()) {
            return response()->json(Department::create($request->all()));
        } else {
            return response()->json(['error' => 'Something went wrong!'], 422);
        }
    }

    public function showDepartmentInformation()
    {
        $dept = $this->DeptInformation();
        return view('admin.department.show', compact('dept'));

    }

    public function DeptInformation()
    {
        return Department::all();
    }

    public function editDept(Request $request)
    {
        if ($request->ajax()) {
            return response(Department::find($request->id));
        }
    }

    public function updateDept(Request $request)
    {
        $this->validate($request,[
            'dept_name' => 'required|min:5|unique:departments'],
            ['dept_name.required'=>'You need to enter a programme name.',
                'dept_name.unique'=>"This entry already exists!"]
        );
        if ($request->ajax()) {
            return response(Department::updateOrCreate(['id'=>$request->dept_id], $request->all()));
        }
    }
}
