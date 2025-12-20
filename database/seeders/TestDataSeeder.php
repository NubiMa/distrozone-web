<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\CustomerAddress;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Hash;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds for frontend testing.
     */
    public function run(): void
    {
        // Get or create test customer
        $customer = User::firstOrCreate(
            ['email' => 'customer@example.com'],
            [
                'name' => 'John Doe',
                'phone' => '081234567890',
                'password' => Hash::make('password'),
                'role' => 'customer',
                'is_active' => true,
            ]
        );

        // Create customer addresses
        CustomerAddress::create([
            'user_id' => $customer->id,
            'label' => 'Home',
            'recipient_name' => 'John Doe',
            'phone' => '081234567890',
            'address' => '123 Streetwear Blvd, Apt 4B',
            'city' => 'Jakarta Selatan',
            'province' => 'DKI Jakarta',
            'postal_code' => '12190',
            'is_default' => true,
        ]);

        CustomerAddress::create([
            'user_id' => $customer->id,
            'label' => 'Office',
            'recipient_name' => 'John Doe',
            'phone' => '081234567890',
            'address' => '456 Business Street, Floor 5',
            'city' => 'Jakarta Pusat',
            'province' => 'DKI Jakarta',
            'postal_code' => '10110',
            'is_default' => false,
        ]);

        // Get first 3 products
        $products = Product::with('variants')->take(3)->get();

        if ($products->isEmpty()) {
            $this->command->warn('No products found. Please run DatabaseSeeder first.');
            return;
        }

        // Create test orders
        $this->createTestOrder($customer, $products, 'DZ-88329', 'pending_payment');
        $this->createTestOrder($customer, $products, 'DZ-88328', 'processing');
        $this->createTestOrder($customer, $products, 'DZ-88327', 'shipped');
        $this->createTestOrder($customer, $products, 'DZ-88326', 'delivered');

        // Create cart for customer
        $cart = Cart::firstOrCreate(['user_id' => $customer->id]);

        // Add items to cart
        foreach ($products->take(2) as $product) {
            if ($product->variants->isNotEmpty()) {
                $variant = $product->variants->first();

                CartItem::firstOrCreate(
                    [
                        'cart_id' => $cart->id,
                        'product_variant_id' => $variant->id,
                    ],
                    [
                        'quantity' => 1,
                        'price' => $variant->price,
                    ]
                );
            }
        }

        $this->command->info('✅ Test data created successfully!');
        $this->command->info('📧 Customer Email: customer@example.com');
        $this->command->info('🔑 Password: password');
        $this->command->info('📦 Orders created: 4');
        $this->command->info('🛒 Cart items: 2');
        $this->command->info('📍 Addresses: 2');
    }

    /**
     * Create a test order
     */
    private function createTestOrder($customer, $products, $orderNumber, $status)
    {
        // Calculate order totals
        $subtotal = 0;
        $itemsData = [];

        foreach ($products->take(rand(1, 3)) as $product) {
            if ($product->variants->isNotEmpty()) {
                $variant = $product->variants->random();
                $quantity = rand(1, 2);
                $price = $variant->price;
                $itemSubtotal = $price * $quantity;

                $subtotal += $itemSubtotal;

                $itemsData[] = [
                    'product' => $product,
                    'variant' => $variant,
                    'quantity' => $quantity,
                    'price' => $price,
                    'subtotal' => $itemSubtotal,
                ];
            }
        }

        $shippingCost = 24000; // Jakarta
        $total = $subtotal + $shippingCost;

        // Create order
        $order = Order::create([
            'order_number' => $orderNumber,
            'user_id' => $customer->id,
            'status' => $status,
            'subtotal' => $subtotal,
            'shipping_cost' => $shippingCost,
            'total' => $total,
            'recipient_name' => 'John Doe',
            'recipient_phone' => '081234567890',
            'shipping_address' => '123 Streetwear Blvd, Apt 4B',
            'city' => 'Jakarta Selatan',
            'province' => 'DKI Jakarta',
            'postal_code' => '12190',
            'total_weight' => 900,
            'shipping_weight' => 1,
            'created_at' => now()->subDays(rand(1, 30)),
        ]);

        // Create order items
        foreach ($itemsData as $itemData) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $itemData['product']->id,
                'product_variant_id' => $itemData['variant']->id,
                'product_name' => $itemData['product']->name,
                'product_sku' => $itemData['variant']->sku,
                'variant_color' => $itemData['variant']->color,
                'variant_size' => $itemData['variant']->size,
                'quantity' => $itemData['quantity'],
                'price' => $itemData['price'],
                'cost_price' => $itemData['product']->cost_price,
                'subtotal' => $itemData['subtotal'],
            ]);
        }
    }
}