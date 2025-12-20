<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display customer orders
     */
    public function index(Request $request)
    {
        $query = Order::where('user_id', auth()->id())
            ->with(['items', 'payment'])
            ->orderBy('created_at', 'desc');

        // Filter by status if provided
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        $orders = $query->paginate(10);

        return view('customer.orders', compact('orders'));
    }

    /**
     * Show single order details
     */
    public function show(string $orderNumber)
    {
        $order = Order::where('order_number', $orderNumber)
            ->where('user_id', auth()->id())
            ->with(['items.productVariant.product', 'payment'])
            ->firstOrFail();

        return view('customer.order-detail', compact('order'));
    }

    /**
     * Cancel order
     */
    public function cancel(string $orderNumber)
    {
        $order = Order::where('order_number', $orderNumber)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        // Check if order can be cancelled
        if (!in_array($order->status, ['pending_payment', 'pending_verification'])) {
            return redirect()
                ->route('customer.orders.show', $orderNumber)
                ->with('error', 'This order cannot be cancelled.');
        }

        // Update order status to cancelled
        $order->update(['status' => 'cancelled']);

        return redirect()
            ->route('customer.orders')
            ->with('success', 'Order cancelled successfully.');
    }
}