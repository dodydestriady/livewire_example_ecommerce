<?php
namespace App\Repositories;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\DB;

class OrderRepository 
{
    public static function create(Array $request)
    {
        // DB::beginTransaction();
        // try {
            foreach($request['stores'] as $store) {
                $order = auth()->user()->orders()->create([
                    'store_id' => $store['id'],
                    'destination' => $request['destination'],
                    'shipping_fee' => Order::SHIPPING_FEE,
                    'total_price' => 0,
                    'grand_total' => 0
                ]);
                $grand_total = 0;
                foreach($store['cart'] as $cart) {
                    $detail = null;
                    while($detail == null) {
                        $product = Product::where([
                            ['id', $cart['product']['id'] ], 
                            ['stock', '>=', $cart['quantity'] ]
                        ])->decrement('stock', $cart['quantity']);                        

                        if ($product) {
                            $detail = $order->detail()->create([
                                'product_id' => $cart['product']['id'],
                                'quantity' => $cart['quantity'],
                                'price' => $cart['product']['price']
                            ]);
                            $grand_total += $cart['quantity'] + $cart['product']['price'];
                            Cart::find($cart['id'])->delete();
                        } else {
                            //stop transaction because one product doens have enough stock
                        }
                    }
                }
                $order->update(['grand_total', $grand_total + Order::SHIPPING_FEE, 'total_price' => $grand_total]);
            }
            
        // } catch (Exception $e) {

        // }
    }

}