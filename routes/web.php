
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CreditRebuilderController;
use App\Http\Controllers\LineOfCrController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\SecuredCardController;
use App\Http\Controllers\MoneyTransferController;
use App\Http\Controllers\InquiriesController;

use App\Models\inquiries;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




// +++++++++++++++++++++   ADMIN   ++++++++++++++++++++++++

Route::get('/adminlogin',[AdminController::class,'Admlogin'])->name('AdminLogin');          // login page
Route::post('/admlg',[AdminController::class,'Adminlogin'])->name('admlg');                 // login logic
Route::get('/registerAdmin',[AdminController::class,'Admregister'])->name('AdminRegister')->middleware(admin::class); // registration page
Route::post('AdminCreate',[AdminController::class,'Admcreate'])->name('admcreate');            // registration logic
Route::get('updateAdmin/{id}',[AdminController::class,'updateAdminPage'])->name('updateAdminPage')->middleware(admin::class);   // Update page
Route::POST('updated/{id}',[AdminController::class,'updateAdmin'])->name('updateAdmin');
Route::get('/adminDashboard',[AdminController::class,'dashboard'])->name('Dashboard');      // dashboard
Route::get('alogout',[AdminController::class,'logout'])->name('logout');                     // logout logic

Route::get('/updatepasswordA/{id}',[AdminController::class,'changePasswordPageA'])->name('changePasswordPageA');
Route::post('/proccessingpasswordA/{id}',[AdminController::class,'changePasswordA'])->name('changePasswordA');





// +++++++++++++++++++++   CLIENT   ++++++++++++++++++++++++

Route::get('/newclient',function(){return view('Client.RegisterClient');})->name('AddClient')->middleware(admin::class);
Route::post('/proccessingclient',[ClientController::class,'createClient'])->name('createClient');

Route::get('/',[ClientController::class, 'clientLoginForm'])->name('ClientLogin');
Route::post('/proccessinglog',[ClientController::class,'Clientlogin'])->name('loggingclient');
Route::get('/profile',[ClientController::class,'profile'])->name('clientProfile');
Route::get('/logout',[ClientController::class,'logout'])->name("logoutClient");
Route::get('/deleteclnt/{id}',[ClientController::class,'delete'])->name("deleteClient");



// admin update route
Route::get('/editclient/{id}',[ClientController::class,'updatePage'])->name('editclient');
Route::post('/editprocc/{id}',[ClientController::class,'update'])->name('editprocc');


//client update route
Route::get('/selfdit/{id}',[ClientController::class, 'clientSelfUpdate'])->name('selfUpdate');
Route::post('/selfproc/{id}',[ClientController::class, 'selfUpdateProccess'])->name('postchanges');



Route::get('/payform',function(){
    return view('payform');
})->name('payform');




// +++++++++++++++++++++   CREDIT REBUILDER   ++++++++++++++++++++++++

Route::get('/newcrbuilder',[CreditRebuilderController::class,'createAccountForm'])->name('AddCreditRebuilder');
Route::post('/proccessingcrbldraccount',[CreditRebuilderController::class,'createAccount'])->name('NewCreditBuilderAccount');

route::get('/crbaccount',[CreditRebuilderController::class,'view'])->name('crbview');

Route::get('/editcardrb/{id}',[CreditRebuilderController::class,'updatePage'])->name('editcardrb')->middleware(admin::class);
Route::post('/editcardrbprocc/{id}',[CreditRebuilderController::class,'update'])->name('editcardrbprocc');

Route::get('/deletecrb/{id}',[CreditRebuilderController::class,'delete'])->name("deleteCardrb");






// +++++++++++++++++++++   LINE OF CREDIT   ++++++++++++++++++++++++

Route::get('/newlineofcr',[LineOfCrController::class,'createAccountForm'])->name('AddLineOfCr');
Route::post('/proccessinglnofcraccount',[LineOfCrController::class,'createAccount'])->name('newLineOfCr');

route::get('/locraccount',[LineOfCrController::class,'view'])->name('locrview');

Route::get('/editlineofcr/{id}',[LineOfCrController::class,'updatePage'])->name('editlineofcr')->middleware(admin::class);
Route::post('/editlineocrprocc/{id}',[LineOfCrController::class,'update'])->name('editlineocrprocc');

Route::get('/deleteloc/{id}',[LineOfCrController::class,'delete'])->name("deleteLoc");







// +++++++++++++++++++++   LOAN   ++++++++++++++++++++++++


Route::get('/newloan',[LoanController::class,'createAccountForm'])->name('AddLoan');
Route::post('/proccessingloanaccount',[LoanController::class,'createAccount'])->name('newLoanAcc');

route::get('/loanaccount',[LoanController::class,'view'])->name('loanrview');

Route::get('/editloan/{id}',[LoanController::class,'updatePage'])->name('editloan')->middleware(admin::class);
Route::post('/editloanprocc/{id}',[LoanController::class,'update'])->name('editloanprocc');

Route::get('/deleteloan/{id}',[LoanController::class,'delete'])->name("deleteLoan");








// +++++++++++++++++++++   MONEY TRANSFER   ++++++++++++++++++++++++


Route::get('moneytransfer',[MoneyTransferController::class,'createReqForm'])->name('NewMoneyTransfer');
Route::post('/proccessingtrnsfrreq',[MoneyTransferController::class,'createReq'])->name('newMoneyTransfer');

Route::get('/transferRequests/{id}',[MoneyTransferController::class,'list'])->name('transferdetails');
Route::any('/deletereq/{id}',[MoneyTransferController::class,'delete'])->name('deletemoneytr');

Route::get('/allreqs',[MoneyTransferController::class,'clientView'])->name('allreq');
Route::any('/markdone/{id}',[MoneyTransferController::class,'done'])->name('markdone')->middleware(admin::class);
Route::any('/decline/{id}',[MoneyTransferController::class,'reject'])->name('declined')->middleware(admin::class);



// +++++++++++++++++++++   SECURED CARD    ++++++++++++++++++++++++


Route::get('/newsecuredcard',[SecuredCardController::class,'createAccountForm'])->name('AddSecuredCard');
Route::post('/proccessingscrdcrdaccount',[SecuredCardController::class,'createAccount'])->name('newSecurdCard');

route::get('/seccardaccount',[SecuredCardController::class,'view'])->name('seccrrview');

Route::get('/editscrcard/{id}',[SecuredCardController::class,'updatePage'])->name('editscrcard');
Route::post('/editscrcardprocc/{id}',[SecuredCardController::class,'update'])->name('editscrcardprocc');


Route::get('/deletesecrd/{id}',[SecuredCardController::class,'delete'])->name("deleteSecrd");





// ++++++++++++++++++++++  INQUIRIES  +++++++++++++++++++++++++++++


Route::get('newinquiry', function () {
    return view('Inquiries.NewInquiry');
});

Route::post('sendingreq', [InquiriesController::class, 'submitReq'])->name('sendreq');

Route::any('req/{id}', [InquiriesController::class, 'view'])->name('viewreq');

Route::any('markdone/{id}', function($id){
    $data = inquiries::find($id);
    $data->status = 'Approved';
    $data->save();
    return redirect()->back();
})->name('markdone');


Route::any('reject/{id}', function($id){
    $data = inquiries::find($id);
    $data->status = 'Rejected';
    $data->save();
    return redirect()->back();
})->name('reject');

