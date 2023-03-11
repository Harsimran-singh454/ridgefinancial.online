<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\credit_rebuilder;
use App\Models\client;



class CreditRebuilderController extends Controller
{


    public function createAccountForm(){
        $client = client::all();
        $account = credit_rebuilder::all();
        return view('Credit_Rebuilder.CreateAccount',['clients'=>$client, 'accounts'=>$account]);
    }

    public function createAccount(Request $request){
        $request->validate([
            'account_number' => 'required',
            'client_id' => 'unique:credit_rebuilder,client_id',
            'monthly_fee' => 'required',
            'amount_saved' => 'required',
            'tot_lineOfCr' => 'required',
            'tot_payments' => 'required',
            'term' => 'required',
            'due_date' => 'required',
            ]);

        $data = credit_rebuilder::create($request->all());
        if($data){
            return redirect()->back()->with('Success','The Account Has Been Created Successfully');
        } else {
            return back()->with('Fail','Something went wrong');
        }
    }


    public function updatePage($id){
        // $data = admin::where('id','=',session('LoggedUser'))->first();
        $info = credit_rebuilder::find($id);
        return view('Credit_Rebuilder.UpdateAccount',['info'=>$info]);
    }

    public function update(Request $req, $id){
        {
            $data=credit_rebuilder::find($id);
            $data->monthly_fee = $req->monthly_fee;
            $data->amount_saved = $req->amount_saved;
            $data->tot_lineOfCr = $req->tot_lineOfCr;
            $data->tot_payments = $req->tot_payments;
            $data->tot_payments_toDate = $req->tot_payments_toDate;
            $data->due_date = $req->due_date;
            $data->save();
            return redirect()->route('Dashboard');
    }
    }


    public function view(){
        $credit_reb = credit_rebuilder::where('client_id',session('LoggedClient'))->first();
        return view('Credit_Rebuilder.view',['data'=>$credit_reb]);
    }



    public function delete($id){
        $data = credit_rebuilder::find($id);
        $data->delete();
        return redirect()->route('Dashboard');
    }
}
