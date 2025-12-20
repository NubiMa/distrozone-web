<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\CustomerAddress;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display customer addresses
     */
    public function index()
    {
        $addresses = CustomerAddress::where('user_id', auth()->id())
            ->orderBy('is_default', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('customer.addresses', compact('addresses'));
    }

    /**
     * Store new address
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'label' => 'nullable|string|max:255',
            'recipient_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'postal_code' => 'nullable|string|max:10',
            'is_default' => 'boolean',
        ]);

        // If this is set as default, unset other defaults
        if ($validated['is_default'] ?? false) {
            CustomerAddress::where('user_id', auth()->id())
                ->update(['is_default' => false]);
        }

        $address = CustomerAddress::create([
            'user_id' => auth()->id(),
            'label' => $validated['label'] ?? null,
            'recipient_name' => $validated['recipient_name'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'city' => $validated['city'],
            'province' => $validated['province'],
            'postal_code' => $validated['postal_code'] ?? null,
            'is_default' => $validated['is_default'] ?? false,
        ]);

        return redirect()
            ->route('customer.addresses')
            ->with('success', 'Address added successfully!');
    }

    /**
     * Update address
     */
    public function update(Request $request, int $id)
    {
        $address = CustomerAddress::where('user_id', auth()->id())
            ->where('id', $id)
            ->firstOrFail();

        $validated = $request->validate([
            'label' => 'nullable|string|max:255',
            'recipient_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'postal_code' => 'nullable|string|max:10',
            'is_default' => 'boolean',
        ]);

        // If this is set as default, unset other defaults
        if ($validated['is_default'] ?? false) {
            CustomerAddress::where('user_id', auth()->id())
                ->where('id', '!=', $id)
                ->update(['is_default' => false]);
        }

        $address->update($validated);

        return redirect()
            ->route('customer.addresses')
            ->with('success', 'Address updated successfully!');
    }

    /**
     * Delete address
     */
    public function destroy(int $id)
    {
        $address = CustomerAddress::where('user_id', auth()->id())
            ->where('id', $id)
            ->firstOrFail();

        $address->delete();

        return redirect()
            ->route('customer.addresses')
            ->with('success', 'Address deleted successfully!');
    }

    /**
     * Set address as default
     */
    public function setDefault(int $id)
    {
        $address = CustomerAddress::where('user_id', auth()->id())
            ->where('id', $id)
            ->firstOrFail();

        // Unset all other defaults
        CustomerAddress::where('user_id', auth()->id())
            ->update(['is_default' => false]);

        // Set this as default
        $address->update(['is_default' => true]);

        return redirect()
            ->route('customer.addresses')
            ->with('success', 'Default address updated!');
    }
}