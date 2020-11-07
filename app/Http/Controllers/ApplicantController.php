<?php

namespace App\Http\Controllers;

use App\Applicant;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function index(){
        $applicants = Applicant::all();
        return view('applicant_list',compact('applicants'));
    }


    public function edit(Applicant $applicant){
        return view('edit',compact('applicant'));
    }

    public function update(Applicant $applicant,Request $request){
        $request->validate([
            'name'=>'required|max:255',
            'surname'=>'required|max:255',
            'phone'=>'required|numeric|min:111111111|max:999999999',
            'position'=>'required|max:255',
            'is_hired'=>'numeric|min:0|max:1|nullable'
        ]);

        $data = $request->all();

        $applicant->update($data);

        return back()->with('success','Applicant Successfully Updated');
    }

    public function hire(Applicant $applicant,Request $request){
        $request->validate([
            'is_hired'=>'numeric|min:0|max:1|'
        ]);
        $applicant->update(['is_hired'=>$request->is_hired]);
        return back()->with('success','Status Successfully Changed');
    }
}
