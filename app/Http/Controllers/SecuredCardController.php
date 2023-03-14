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
            $data->name = $req->name;
            $data->name_card = $req->name_card;
            $data->DOB = $req->DOB;
            $data->marital_status = $req->marital_status;
            $data->email = $req->email;
            $data->phone = $req->phone;
            $data->address = $req->address;
            $data->mailing_address = $req->mailing_address;
            $data->request_limit = $req->request_limit;
            $data->cred_card_inst = $req->cred_card_inst;
            $data->transfer_amount = $req->transfer_amount;
            $data->acc_number = $req->acc_number;
            $data->approved = $req->approved;

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
