<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function checkout()
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect('/cart')->with('error', 'Your cart is empty');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['qty'];
        }

        return view('customer.checkout', compact('cart', 'total'));
    }

    public function placeOrder()
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('customer.cart')
                ->with('error', 'Your cart is empty');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['qty'];
        }

        $invoice = Invoice::create([
            'customer_id' => session('customer_id'),
            'invoice_no'  => 'INV-' . strtoupper(Str::random(6)),
            'total'       => $total,
            'status'      => 'pending'
        ]);

        foreach ($cart as $productId => $item) {
            InvoiceItem::create([
                'invoice_id' => $invoice->id,
                'product_id' => $productId,
                'price'      => $item['price'],
                'qty'        => $item['qty'],
                'subtotal'   => $item['price'] * $item['qty'],
            ]);
        }

        session()->forget('cart');

        return redirect()->route('customer.invoices')
            ->with('success', 'Order placed successfully');
    }

    public function invoices()
    {
        $invoices = Invoice::where('customer_id', session('customer_id'))
            ->latest()
            ->get();

        return view('customer.invoices', compact('invoices'));
    }

    public function invoiceDetail($id)
    {
        $invoice = Invoice::with('items.product')
            ->where('id', $id)
            ->where('customer_id', session('customer_id'))
            ->firstOrFail();

        return view('customer.invoice-detail', compact('invoice'));
    }
}
