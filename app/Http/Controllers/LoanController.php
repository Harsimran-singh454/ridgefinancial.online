<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\client;
use App\Models\loan;


class LoanController extends Controller
{

    public function createAccountForm(){
        $client = client::all();
        $account = loan::all();
        return view('Loans.CreateAccount',['clients'=>$client, 'accounts'=>$account]);
    }


    public function createAccount(Request $request){
        $request->validate([
            'account_number' => 'required',
            'client_id' => 'unique:loan,client_id',
            'account_balance' => 'required',
            'due_date' => 'required',
            'payment_amount' => 'required',
            'frequency' => 'required',
            'current_balance' => 'required',
            'interest_rate' => 'required',
            'term' => 'required',
            'payment' => 'required',
            ]);

        $data = loan::create($request->all());
        if($data){
            return redirect()->back()->with('Success','The Account Has Been Created Successfully');
        } else {
            return back()->with('Fail','Something went wrong');
        }
    }

    public function updatePage($id){
        // $data = admin::where('id','=',session('LoggedUser'))->first();
        $info = loan::find($id);
        return view('Loans.UpdateAccount',['info'=>$info]);
    }

    public function update(Request $req, $id){
        {
            $data=loan::find($id);
            $data->title = $req->title;
            $data->name = $req->name;
            $data->DOB = $req->DOB;
            $data->email = $req->email;
            $data->phone = $req->phone;
            $data->work_number = $req->work_number;
            $data->address = $req->address;
            $data->loan_amount = $req->loan_amount;
            $data->purpose = $req->purpose;
            $data->status = $req->status;
            $data->account_number = $req->account_number;
            $data->client_id = $req->client_id;
            $data->account_balance = $req->account_balance;
            $data->due_date = $req->due_date;
            $data->payment_amount = $req->payment_amount;
            $data->frequency = $req->frequency;
            $data->current_balance = $req->current_balance;
            $data->interest_rate = $req->interest_rate;
            $data->term = $req->term;

            $data->save();

            return redirect()->back()->with('Success','Information Has Been Update');
    }
    }

    public function view(){
        $loan = loan::where('client_id',session('LoggedClient'))->first();
        return view('Loans.view',['data'=>$loan]);
    }

    public function delete($id){
        $data = loan::find($id);
        $data->delete();
        return redirect()->route('Dashboard');
    }
}
