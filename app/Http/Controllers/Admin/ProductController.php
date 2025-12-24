<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.product.index', [
            'products' => Product::all()
        ]);
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(Request $request)
    {
        $images = [];

        if ($request->hasFile('product_images')) {
            foreach ($request->file('product_images') as $img) {
                $name = time() . '_' . $img->getClientOriginalName();
                $img->move(public_path('uploads/products'), $name);
                $images[] = $name;
            }
        }

        Product::create([
            'product_name' => $request->product_name,
            'product_detail' => $request->product_detail,
            'product_images' => $images,
            'product_price' => $request->product_price,
            'product_quantity' => $request->product_quantity,
            'product_category' => $request->product_category
        ]);

        return redirect('/admin/products');
    }

    public function edit($id)
    {
        return view('admin.product.edit', [
            'product' => Product::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        // Product::findOrFail($id)->update($request->all());

        Product::findOrFail($id)->update(
            $request->only([
                'product_name',
                'product_detail',
                'product_price',
                'product_quantity',
                'product_category'
            ])
        );

        return redirect('/admin/products');
    }

    public function delete($id)
    {
        Product::findOrFail($id)->delete();
        return back();
    }
}
