<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;



class PaymentController extends Controller
{
    private $price;
    public function __construct()
    {
        $this->price = env('price', 10);
    }
    public function charge(String $plan)
    {

        $user = Auth::user();
        $inttt =  $user->createSetupIntent();
        Log::info($inttt);
        return view('payment', [
            'user' => $user,
            'intent' => $inttt,
            'product' => $plan,
            'price' => $this->price
        ]);
    }

    public function processPayment(Request $request)
    {
        $user = Auth::user();
        $paymentMethod = $request->input('payment_method');
        $user->createOrGetStripeCustomer();
        $user->addPaymentMethod($paymentMethod);


        try {
            $payment = $user->charge($this->price * 100, $paymentMethod, [
                'return_url' => route('upload-video'),
            ]);
            Log::info($payment);
            // Get the payment ID from the returned object
            $paymentId = $payment->id;

            // Create or update the payment record in your database
            $paymentRecord = Payment::updateOrCreate(['stripe_payment_id' => $paymentId], [
                'user_id' => $user->id,
                // Other payment details you may want to store
            ]);
            Log::info($paymentRecord);
            return redirect('upload-video');
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Error creating subscription. ' . $e->getMessage()]);
        }
        return redirect('homexxx');
    }
}
