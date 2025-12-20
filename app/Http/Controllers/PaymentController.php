<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    /**
     * Show payment verification page
     */
    public function show(string $orderNumber)
    {
        $order = Order::where('order_number', $orderNumber)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        // Check if order is in correct status
        if ($order->status !== 'pending_payment') {
            return redirect()
                ->route('customer.orders.show', $orderNumber)
                ->with('error', 'Payment proof cannot be uploaded for this order.');
        }

        return view('customer.payment-verification', compact('order'));
    }

    /**
     * Verify payment (upload proof)
     */
    public function verify(Request $request, string $orderNumber)
    {
        $order = Order::where('order_number', $orderNumber)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        // Validate
        $validated = $request->validate([
            'payment_proof' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
            'notes' => 'nullable|string|max:500',
        ]);

        // Store payment proof
        $proofPath = $request->file('payment_proof')->store('payment-proofs', 'public');

        // Create or update payment record
        $payment = Payment::updateOrCreate(
            ['order_id' => $order->id],
            [
                'payment_method' => 'bank_transfer',
                'amount' => $order->total,
                'proof_image_path' => $proofPath,
                'proof_uploaded_at' => now(),
                'status' => 'pending',
                'sender_bank_name' => 'Customer Bank', // You can add form fields for these
                'sender_account_name' => auth()->user()->name,
                'sender_account_number' => 'N/A',
            ]
        );

        // Update order status
        $order->update(['status' => 'pending_verification']);

        return redirect()
            ->route('customer.orders.show', $orderNumber)
            ->with('success', 'Payment proof uploaded successfully! Please wait for verification.');
    }
}