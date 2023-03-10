<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\line_of_credit;
use App\Models\client;


class LineOfCrController extends Controller
{

    public function createAccountForm(){
        $client = client::all();
        $account = line_of_credit::all();
        return view('Line_Of_Credit.CreateAccount',['clients'=>$client, 'accounts'=>$account]);
    }


    public function createAccount(Request $request){
        $request->validate([
            'account_number' => 'required',
            'client_id' => 'unique:line_of_credit,client_id',
            'credit_limit' => 'required',
            'current_balance' => 'required',
            'authorizations' => 'required',
            'credit_remaining' => 'required',
            'due_date' => 'required',
            'cycle_date' => 'required',
            ]);

        $data = line_of_credit::create($request->all());
        if($data){
            return redirect()->back()->with('Success','The Account Has Been Created Successfully');
        } else {
            return back()->with('Fail','Something went wrong');
        }
    }

    public function updatePage($id){
        // $data = admin::where('id','=',session('LoggedUser'))->first();
        $info = line_of_credit::find($id);
        return view('Line_Of_Credit.UpdateAccount',['info'=>$info]);
    }

    public function update(Request $req, $id){
        {
            $data=line_of_credit::find($id);
            $data->credit_limit = $req->credit_limit;
            $data->current_balance = $req->current_balance;
            $data->authorizations = $req->authorizations;
            $data->credit_remaining = $req->credit_remaining;
            $data->due_date = $req->due_date;
            $data->cycle_date = $req->cycle_date;

            $data->save();

            return redirect()->route('Dashboard');
    }
    }


    public function view(){
        $line_oCr = line_of_credit::where('client_id',session('LoggedClient'))->first();
        return view('Line_Of_Credit.view',['data'=>$line_oCr]);
    }

    public function delete($id){
        $data = line_of_credit::find($id);
        $data->delete();
        return redirect()->route('Dashboard');
    }

}
