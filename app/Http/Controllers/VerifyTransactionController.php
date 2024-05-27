<?php

namespace App\Http\Controllers;

use App\Models\AdmissionPayments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyTransactionController extends Controller
{
    public function verify()
    {
        $ref = $_GET['reference'];

        //dd($ref);

        if ($ref == "") {
            header("Location:javacript://history.go(-1)");
        }

        //dd($ref);

        $curl = curl_init();

        curl_setopt_array($curl, array(

            CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($ref),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(

            "Authorization: Bearer sk_live_678b65baa6d321ca6f6af8bd7fa69fb9211f6526",
            //"Authorization: Bearer sk_test_1e6a5e71a0b1c34ba58b836b0cb098025244d943",
            "Cache-Control: no-cache",

            ),

            )
        );

    
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;

        } else {

            //echo $response;

            $result = json_decode($response);

        }

        //dd($result);

        if ($result->data->status == "success") {
            $status = $result->data->status;
            $reference = $result->data->reference;
            $lastname = $result->data->customer->last_name;
            $firstname = $result->data->customer->first_name;
            $fullname = $firstname . " " . $lastname;
            $customer_email = $result->data->customer->email;
            $phone = $result->data->customer->phone;
            date_default_timezone_set('Africa/Accra');
            $date_time = date('Y-m-d H:i:s', time());

            $payment = AdmissionPayments::create(
                [
                    'user_id' => Auth::id(),
                    'status' => $status,
                    'reference' => $reference,
                    'fullname' => $fullname,
                    'email' => $customer_email,
                    'phone' => $phone,
                    'payment_date' => $date_time,
                ]
            );

            if ($payment->save()) {
                //alert()->success($fullname.' Payment is successful!', 'Awesome')->persistent("Close this");
                return redirect('user/form')->with('success', $fullname.' Payment is successful!');
            } else {
                //alert()->error($fullname.' Payment Failed')->persistent("Close this");
                return redirect('user/payment')->with('error', $fullname.' Payment Failed');
            }
            
        } else {
            header('404');
        } 
    }

    public function verifyReference(Request $request)
    {
        $reference = AdmissionPayments::where(['reference' => $request['reference']])
            ->first();
            //dd($reference);
        if ($reference === null) {
            $message = "Reference number does not exist!. Start a 'New Application'";

            //alert()->error($message, 'Whoops!')->persistent();
            
            return redirect()->back()->with('error', $message);
        }

        if ($reference['reference'] = $request['reference'] && $reference['status'] == 'success') {

            return redirect('user/form');

        }
    }
}
