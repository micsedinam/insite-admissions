<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('applicant.home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $total_applications = DB::table('forms')
            ->where('forms.form_complete', '=', 'Yes')
            ->count();

        $total_reviewed = DB::table('forms')
            ->where('forms.form_complete', '=', 'Yes')
            ->where('forms.review_status', '!=', null)
            ->count();

        $total_yet_reviewed = DB::table('forms')
            ->where('forms.form_complete', '=', 'Yes')
            ->where('forms.review_status', '=', null)
            ->count();

        //dd($total_yet_reviewed);
        return view('admin.adminHome', compact('total_applications', 'total_reviewed', 'total_yet_reviewed'));
    }
    
}
