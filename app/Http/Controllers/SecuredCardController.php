<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\client;
use App\Models\secured_card;


class SecuredCardController extends Controller
{


    public function createAccountForm(){
        $data = client::all();
        return view('Secured_Card.CreateAccount',['clients'=>$data]);
    }



    public function processForm($id){
        $data = secured_card::find($id);
        if($data)
        return view('Secured_Card.processAccount',['data'=>$data]);
    }


    public function createAccount(Request $request){
        $request->validate([
            'name' => 'required',
            'name_card' => 'required',

            'DOB' => 'required',
            'marital_status' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'mailing_address' => 'required',
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
