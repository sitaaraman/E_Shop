<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    public function index()
    {
        return view('admin.invoice.index',[
            'invoices'=>Invoice::with('customer')->get()
        ]);
    }

    public function updateStatus($id, $status)
{
    if (!in_array($status, ['pending','paid','cancelled'])) {
        abort(404);
    }

    Invoice::findOrFail($id)->update([
        'status' => $status
    ]);

    return back();
}

}
