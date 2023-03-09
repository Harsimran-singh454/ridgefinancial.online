<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use App\Models\client;
use App\Models\credit_rebuilder;
use App\Models\line_of_credit;
use App\Models\loan;
use App\Models\money_transfer;
use App\Models\secured_card;

use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{

    public function Admregister(){
        return view('Admin.RegisterAdmin');
    }



    public function Admcreate(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admin,email',
            'password' =>'required',
            ]);

        $create = admin::create($request->all());
        if($create){
        return redirect()->back()->with('Success','The Admin Has Been Created Successfully');
        } else {
            return back()->with('Fail','Something went wrong');
        }
    }

    public function Admlogin(){
        if(session('LoggedClient')){
            return redirect()->route('clientProfile');
        }
        elseif(session('LoggedUser')){
            return redirect()->route('Dashboard');
        }
        else{
            return view('Admin.LoginAdmin');
        }
    }




    public function Adminlogin(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $admin = admin::where('email','=',$request->email)->first();

        if(!$admin){
            return back()->with('fail','Invalid Credentials');
        }elseif($admin->status != 'active'){
            return redirect()->back()->with('fail','Your Account has been suspended. Contact our Support Team - (866)-981-9331)');
        } else{
                if($request->password == $admin->password){
                    $request->session()->put('LoggedUser',$admin->id);
                    return redirect()->route('Dashboard');
                } else {
                    return back()->with('fail','Incorrect Password');
                }
            }
        }



    public function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
        }
        return view('Admin.LoginAdmin');
    }



    public function dashboard(){
        $data = admin::where('id','=',session('LoggedUser'))->first();
        if($data){
            $admins = admin::all();
            $clientList = client::all();
            $loanList = loan::all();
            $credit_reb_list = credit_rebuilder::all();
            $line_oCr_list = line_of_credit::all();
            $securedCard_list = secured_card::all();
            $moneytrans_list = money_transfer::all();
            return view('Admin.Dashboard',['admin'=>$data,
                                            'clients'=>$clientList,
                                            'admins'=>$admins,
                                            'loans'=> $loanList,
                                            'cr_rbs'=> $credit_reb_list,
                                            'lineOcrs'=> $line_oCr_list,
                                            'moneyts' => $moneytrans_list,
                                            'secu_cards' => $securedCard_list]);
        } else {
            return redirect('/');
        }
    }


    public function updateAdminPage($id){
            $data = admin::where('id','=',session('LoggedUser'))->first();
            $adm = admin::find($id);
            return view('Admin.UpdateAdmin',['Admin'=>$adm, 'info'=>$data]);
    }


    public function updateAdmin(Request $req, $id)
        {
            $data=admin::find($id);
            $data->name = $req->name;
            $data->email = $req->email;
            $data->role = $req->role;
            $data->password = $req->password;
            $data->status = $req->status;
            $data->save();

            return redirect()->route('Dashboard');
        }

    public function changePasswordPageA($id)

        {
            $data=admin::find($id);
            //return $data;
            return view('changePassword', ['data'=>$data]);
        }

    public function changePasswordA(Request $req, $id){

        $data = admin::find($id);
        if($req->password != $req->confirm_password)
        {
            return redirect()->back()->with('fail', 'Passwords Do not match!');
        }
        else
        {
        $data->password = $req->password;
        $data->save();
        return redirect()->route('Dashboard')->with('success','Password Has Been Updated');
        }

    }

}
