<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\client;
use App\Models\loan;
use App\Models\admin;
use App\Models\credit_rebuilder;
use App\Models\secured_card;
use App\Models\line_of_credit;
use App\Models\money_transfer;


use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{


    public function createClient(Request $req){
        $req->validate([
            'name' => 'required',
            'email' => 'required|email|unique:client,email',
            'address' => 'required',
            'contact' => 'required',
            'DOB' => 'required',
            'pin' => 'required',
            'password' => 'required',
        ]);

        $create = client::create($req->all());
        if($create){
            return redirect()->back()->with('Success','The Client Has Been Created Successfully');
        } else {
            return back()->with('Fail','Something went wrong');
        }
    }



    public function Clientlogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $client = client::where('email','=',$request->email)->first();

        if(!$client){
            return back()->with('fail','Invalid Credentials');
        }else{
            if($request->password == $client->password){
                $request->session()->put('LoggedClient',$client->id);
                return redirect()->route('clientProfile');
            } else {
                return back()->with('fail','Incorrect Password');
            }
        }
    }

    public function logout(){
        session()->pull('LoggedClient');
        return redirect()->route('ClientLogin');
    }


    public function profile(){
        $data = client::find(session('LoggedClient'));

        $loan = loan::where('client_id','=',session('LoggedClient'))->first();
        $credit_reb = credit_rebuilder::where('client_id',session('LoggedClient'))->first();
        $line_oCr = line_of_credit::where('client_id','=',session('LoggedClient'))->first();
        $securedCard = secured_card::where('client_id','=',session('LoggedClient'))->first();
        $moneyt = money_transfer::where('client_id','=',session('LoggedClient'));
        if($data){
            return view('Client.Profile',['client'=>$data,
                                            'loan'=>$loan,
                                            'credit_reb'=>$credit_reb,
                                            'lineoCr'=>$line_oCr,
                                            'sec_card'=>$securedCard,
                                            'money' => $moneyt]);
        } else {
            return "Client Not Found";
        }
    }


        public function clientSelfUpdate($id){
            $client = client::find($id);
            return view('Client.UpdateClient',['client'=>$client]);
        }

        public function selfUpdateProccess(Request $req, $id){
            $data=client::find($id);
            $data->address = $req->address;
            $data->contact = $req->contact;
            $data->pin = $req->pin;
            $data->password = $req->password;
            $data->save();
            return redirect()->back()->with('success');
        }



        public function updatePage($id){
            $data = admin::where('id','=',session('LoggedUser'))->first();
            $client = client::find($id);
            return view('Client.admin_updateClient',['client'=>$client, 'info'=>$data]);
        }

        public function update(Request $req, $id){
            {
                $data=client::find($id);
                $data->name = $req->name;
                $data->email = $req->email;
                $data->address = $req->address;
                $data->contact = $req->contact;
                $data->DOB = $req->DOB;
                $data->pin = $req->pin;
                $data->password = $req->password;
                $data->save();

                return redirect()->back()->with('success');
        }
    }
    public function delete($id){
        $data = client::find($id);
        $data->delete();
        return redirect()->back();
    }
}

