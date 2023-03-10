<?php
use App\Models\Role;
use App\Models\Visitor;
use App\Models\Uniouninfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SonodController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HoldingtaxController;
use App\Http\Controllers\UniouninfoController;
use App\Http\Controllers\ExpenditureController;
use App\Http\Controllers\NotificationsController;
use App\Models\Sonod;
use App\Models\TikaLog;
use Illuminate\Cache\RedisTaggedCache;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/sms/sent/upcomming', function () {


    $targetDate = date('Y-m-d', strtotime(' +3 day'));
   $tikalogs =  TikaLog::select(['applicantId','tikadose','nextTikaDate'])->distinct()->where(['sms'=>0,'nextTikaDate'=>$targetDate])->get();
    $SmsPhoneNumbers = [];
    foreach ($tikalogs as $tikalog) {

        $messageDose = '';

        if($tikalog->tikadose=='১ম বার'){
            $messageDose = '২য় বার';
        }else if($tikalog->tikadose=='২য় বার'){
            $messageDose = '৩য় বার';
        }else if($tikalog->tikadose=='৩য় বার'){
            $messageDose = '৪র্থ বার';
        }else if($tikalog->tikadose=='৪র্থ বার'){
            $messageDose = '৫ম বার';
        }else if($tikalog->tikadose=='৫ম বার'){
            $messageDose = '';
        }

        $applicantId = $tikalog->applicantId;
        $tikadose = $tikalog->tikadose;
        $sonod = Sonod::find($applicantId);

        array_push(
            $SmsPhoneNumbers,
            [
                'Mobile'=>$sonod->mobile_no,
                'message'=>"$sonod->childs_name এর $messageDose টিকা প্রদানের তারিখঃ ".int_en_to_bn(date("d-m-Y",strtotime($tikalog->nextTikaDate))),
            ]
        );

        // $tikalogUpdate = TikaLog::where(['applicantId'=>$applicantId,'tikadose'=>$tikadose])->get();
        // foreach ($tikalogUpdate as $TikaUp) {
        //    $tika = TikaLog::find($TikaUp->id);
        //    $tika->update(['sms'=>1]);
        // }
    }


    // return $SmsPhoneNumbers;
    foreach ($SmsPhoneNumbers as  $value) {
        // return $value['Mobile'];
        // return $value['message'];
       echo SmsNocSmsSend($value['message'],$value['Mobile']);
    }




});

Route::get('/smstest', function () {

    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];
    $subject = 'hello subject';

    \Mail::to('freelancernishad123@gmail.com')->send(new \App\Mail\MyTestMail($details,$subject));

    dd("Email is Sent.");


});

Route::get('/passGen/{pass}', function ($pass) {
    return  hash::make($pass);
});

Route::get('/qr/scan', function () {
    return  view('qr');
});

Route::get('/tika/verify/{id_no}', function ($id_no) {

    $sonod = Sonod::where('id_no',$id_no)->first();
    return redirect("/card/d/$sonod->id");

});

Route::get('details',[NotificationsController::class,'details']);




Route::get('/unioncreate', function () {

return view('unioncreate');


});

Route::post('unionCreate', [UniouninfoController::class,'unionCreate']);
Auth::routes([
    'login'=>false,
]);
Route::post('login',[LoginController::class,'login']);
Route::post('logout',[LoginController::class,'logout']);
// Route::group(['middleware' => ['is_admin']], function() {
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// });
// Route::group(['middleware' => ['CustomerMiddleware']], function() {
// Route::get('/sub', [App\Http\Controllers\HomeController::class, 'sub'])->name('sub');
// });






Route::get('/sonod/payment/success/{id}', [SonodController::class,'sonodpaymentSuccessView']);
Route::get('/payment/success', [SonodController::class,'sonodpaymentSuccess']);
Route::get('/sonod/payment/{id}', [SonodController::class,'sonodpayment']);
Route::get('/sonod/{name}/{id}', [SonodController::class,'sonodDownload']);
Route::get('/invoice/{name}/{id}', [SonodController::class,'invoice']);
Route::get('/card/{name}/{id}', [SonodController::class,'userDocument']);
Route::get('/information/{name}/{id}', [SonodController::class,'userinformation']);
Route::get('/pay/holding/tax/{id}', [HoldingtaxController::class,'holding_tax_pay_Online']);

Route::get('/holdingPay/success', [HoldingtaxController::class,'holdingPaymentSuccess']);

Route::get('/holding/tax/invoice/{id}', [HoldingtaxController::class,'holdingPaymentInvoice']);

Route::get('/report/export', [PaymentController::class,'export']);

Route::get('/cashbook/download', [ExpenditureController::class,'cashbook_download']);

Route::get('/secretary/approve/{id}', [SonodController::class,'SecretariNotificationApprove']);
Route::get('/chairman/approve/{id}', [SonodController::class,'ChairnamNotificationApprove']);
Route::get('/secretary/pay/{id}', [SonodController::class,'SecretariNotificationPay']);
Route::get('/allow/application/notification', function () {

    return view('applicationNotification');


    });
Route::group(['prefix' => 'dashboard','middleware' => ['auth']], function() {



Route::get('/report/download', [SonodController::class,'ReportDownload']);



    Route::get('/{vue_capture?}', function () {
        // return   Auth::user()->roles->permission;
        $roles = Role::all();
        return view('layout',compact('roles'));
    })->where('vue_capture', '[\/\w\.-]*')->name('dashboard');
});
Route::get('/{vue_capture?}', function () {


        // return  Uniouninfo::find(1);
 $uniounDetials['defaultColor']  = 'green';
      $uniounDetials = json_decode(json_encode($uniounDetials));
     return view('frontlayout',compact('uniounDetials'));

})->where('vue_capture', '[\/\w\.-]*')->name('frontend');
