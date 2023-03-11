<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\inquiries;

class InquiriesController extends Controller
{


    public function submitReq(Request $request){
        $data = inquiries::create($request->all());
        if($data){
            return redirect()->back()->with('Success','Your Inquiry has been submitted.');
        } else {
            return redirect()->back()->with('fail','Something\'s Wrong.');
        }
    }


    public function view($id){
        $data = inquiries::find($id);
        return view('Inquiries.view', ['data' => $data]);
    }


}
