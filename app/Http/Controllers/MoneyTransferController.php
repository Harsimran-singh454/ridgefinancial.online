<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\money_transfer;
use App\Models\client;
use App\Models\secured_card;
use App\Models\line_of_credit;




class MoneyTransferController extends Controller
{


    public function createReqForm(){
        $client = client::where('id',session('LoggedClient'))->first();
        $card = secured_card::where('client_id','=',session('LoggedClient'))->first();
        $loc = line_of_credit::where('client_id','=',session('LoggedClient'))->first();
        if($card != null || $loc != null){
            return view('MoneyTransfer.TransferForm',['client'=>$client, 'card'=>$card, 'loc'=>$loc]);
        } else{
            return redirect()->back()->with('fail','You have to have a Secured card or Line of Credit account to transfer money');
        }
    }

    public function createReq(Request $request){
        $request->validate([
            'sender' => 'required',
            'receipient' => 'required',
            'using' => 'required',
            'details' => 'required',
            'amount' => 'required',
            ]);

        $data = money_transfer::create($request->all());
        if($data){
        return redirect()->back()->with('Success','Your request for transferring money has been submitted. You will be notified once the transefer is completed');
         } else {
        return back()->with('Fail','Something went wrong');
        }
    }

    public function list($id){
        $data = money_transfer::find($id);
        return view('MoneyTransfer.viewreq', ['data' => $data]);
    }

    public function clientView(){
        $data = money_transfer::where('client_id',session('LoggedClient'))->get();
        return view('MoneyTransfer.list',['data'=>$data]);
    }


    public function done($id){
        $data = money_transfer::find($id);
        $data->transferStatus = "completed";
        $data->save();
        return redirect()->back()->with('Success','This Transaction is Marked Done.');
    }

    public function reject($id){
        $data = money_transfer::find($id);
        $data->transferStatus = "Declined";
        $data->save();
        return redirect()->back()->with('Success','This Transaction is Declined Done.');
    }

    public function delete($id){
        $data = money_transfer::find($id);
        $data->delete();
        return redirect()->back();
    }
}
