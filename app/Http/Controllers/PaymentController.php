<?php

namespace App\Http\Controllers;

use App\Models\admin\Course;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{
    public function checkout(Request $request, Course $course)
    {
        return view('admin.pages.payment.checkout', compact('course'));
    }
    public function pay(Course $course)
    {
        $precio = $course->price->value;
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('payment.approved', $course),
                "cancel_url" => route('payment.cancel', $course),
            ],
            "purchase_units" => [0 => ["amount" => [
                "currency_code" => "USD",
                "value" => $precio,
            ],
            ],
            ],
        ]);

        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('payment.checkout', $course)
                ->with('error', 'Algo salió mal.');

        } else {
            return redirect()
                ->route('payment.checkout', $course)
                ->with('error', $response['message'] ?? 'Algo salió mal.');
        }

    }
    public function approved(Request $request, Course $course)
    {
        // return ($course);
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            // Matriculamos al alumno
            $course->students()->attach(auth()->user()->id);
            // return redirect()->route('courses.status', $course);

            return redirect()
                ->route('courses.status', $course)
                ->with('success', 'Transacción completa.');
        } else {
            return redirect()
                ->route('payment.checkout', $course)
                ->with('error', $response['message'] ?? 'Algo salió mal.');
        }

    }
    public function cancel(Course $course)
    {
        return redirect()
            ->route('payment.checkout', $course)
            ->with('error', $response['message'] ?? 'Ha cancelado la transacción.');

    }
}