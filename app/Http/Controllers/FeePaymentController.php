<?php

namespace App\Http\Controllers;

use App\Models\FeePayment;
use App\Models\Profile;
use Illuminate\Http\Request;

class FeePaymentController extends Controller
{
    public function index()
    {
        return view('admin.fees.add');
    }

    public function Store(Request $request)
    {
        $this->validate($request, [
            'index_number' => 'required|min:5|unique:fee_payments'],
            ['index_number.required'=>'You need to enter an index number.',
                'index_number.unique'=>"This index number already exists!"]
        );

        function code(
            $length=8
        ) {
            $code = mt_rand(10000000, 99999999);
            $count = mb_strlen($code);
            $result = $code;
    
            for ($i=0; $i < $length; $i++) { 
                $index = rand(0, $count - 1);
                $result .= mb_substr($index, 1);
            }
            return $code;
        }

        if ($request->ajax()) {

            $feecode = code();

            $data = FeePayment::create(
                [
                    'index_number' => $request['index_number'],
                    'code' => $feecode,
                ]
            );
            //dd($data);
            $data->save();

            return response()->json(['success' => "Saved Successfully"], 201);
        } else {
            return response()->json(['error' => 'Something went wrong!'], 422);
        }
    }

    public function showCodeInformation()
    {
        $feecode = $this->CodeInformation();
        return view('admin.fees.show', compact('feecode'));

    }

    public function CodeInformation()
    {
        return FeePayment::all();
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

    public function verifyFeeCode(Request $request)
    {
        $feecode= FeePayment::where(['code' => $request['code']])
            ->first();
            //dd($feecode);
        
        if ($feecode === null) {
            $message = "Fee verification number does not exist! Kindly contact the Administrator.";

            alert()->error($message, 'Whoops!')->persistent();

            return redirect()->back();
        }

        $index_number = Profile::where(['index_number' => $feecode['index_number']])->first();
        //dd($index_number)

        if ($index_number == null) {
            $message = "Wrong Information'";

            alert()->error($message, 'Whoops!')->persistent();

            return redirect()->back();
        }

        if ($feecode['code'] = $request['code'] && $feecode['index_number'] == $index_number['index_number']) {

            return redirect('student/view/course/list');

        } 
        // else {
        //     $message = "Index number doesn't match!'";

        //     alert()->error($message, 'Whoops!')->persistent();

        //     return redirect()->back();
        // }
    }
}
