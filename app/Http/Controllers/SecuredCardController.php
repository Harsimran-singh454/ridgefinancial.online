<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\client;
use App\Models\secured_card;


class SecuredCardController extends Controller
{


    public function createAccountForm(){
        $client = client::all();
        $account = secured_card::all();
        return view('Secured_Card.CreateAccount',['clients'=>$client, 'accounts'=>$account]);
    }


    public function createAccount(Request $request){
        $request->validate([
            'account_number' => 'required',
            'client_id' => 'unique:secured_card,client_id',
            'credit_limit' => 'required',
            'current_balance' => 'required',
            'authorizations' => 'required',
            'credit_remaining' => 'required',
            'due_date' => 'required',
            'cycle_date' => 'required',
            'transactions' => 'required',
            'card_number' => 'required',
            'pin_number' => 'required',
            ]);

        $data = secured_card::create($request->all());
        if($data){
            return redirect()->back()->with('Success','The Account Has Been Created Successfully');
        } else {
            return back()->with('Fail','Something went wrong');
        }
    }



    public function updatePage($id){
        // $data = admin::where('id','=',session('LoggedUser'))->first();
        $info = secured_card::find($id);
        return view('Secured_Card.UpdateAccount',['info'=>$info]);
    }

    public function update(Request $req, $id){
        {

            $data=secured_card::find($id);
            $data->credit_limit = $req->credit_limit;
            $data->current_balance = $req->current_balance;
            $data->payment_amount = $req->payment_amount;
            $data->authorizations = $req->authorizations;
            $data->credit_remaining = $req->credit_remaining;
            $data->due_date = $req->due_date;
            $data->cycle_date = $req->cycle_date;
            $data->transactions = $req->transactions;
            $data->card_number = $req->card_number;
            $data->pin_number = $req->pin_number;

            $data->save();
            return redirect()->route('Dashboard');

        }
    }

    public function view(){
        $secured_card = secured_card::where('client_id',session('LoggedClient'))->first();
        return view('Secured_Card.view',['data'=>$secured_card]);
    }

    public function delete($id){
        $data = secured_card::find($id);
        $data->delete();
        return redirect()->route('Dashboard');
    }


}
