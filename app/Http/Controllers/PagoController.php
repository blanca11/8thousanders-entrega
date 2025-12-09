<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session as CheckoutSession;

class PagoController extends Controller
{
    public function checkout(Request $request)
    {
        // Modo seguro: solo usuarios autenticados
        // if (!auth()->check()) abort(403);

        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $session = CheckoutSession::create([
                'mode' => 'payment', // pago único
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price'    => config('services.stripe.price_id'),
                    'quantity' => 1,
                ]],
                'success_url' => config('services.stripe.success_url') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url'  => config('services.stripe.cancel_url'),
            ]);

            // Redirigir al Checkout de Stripe
            return redirect($session->url);
        } catch (\Exception $e) {
            // Manejo de errores básico
            return back()->with('error', 'No se pudo iniciar el pago: ' . $e->getMessage());
        }
    }

    public function success(Request $request)
    {
        // Aquí podrías verificar el session_id si quieres
        // y marcar el pedido como pagado, etc.
        return view('pago.success');
    }

    public function cancel()
    {
        return view('pago.cancel');
    }
}
