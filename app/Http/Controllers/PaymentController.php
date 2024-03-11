<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use function Psy\debug;

class PaymentController extends Controller
{
    public function charge(String $product, $price)
    {

        $user = Auth::user();
       $inttt =  $user->createSetupIntent();
       Log::info($inttt);
        return view('payment', [
            'user' => $user,
            'intent' => $inttt,
            'product' => $product,
            'price' => $price
        ]);
    }

    public function processPayment(Request $request, String $product, $price)
    {
        $user = Auth::user();
        $paymentMethod = $request->input('payment_method');
        $user->createOrGetStripeCustomer();
        $user->addPaymentMethod($paymentMethod);
       

        try {
            $payment = $user->charge($price * 100, $paymentMethod, [
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
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Error creating subscription. ' . $e->getMessage()]);
        }
        return redirect('home');

        
    }
}
