<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('restaurant_id', Auth::guard('restaurant')->user()->id)->get();
        return view('pages.manageProduct', compact('products'));
    }

    public function addProduct(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|numeric'
        ]);

        if(Product::where('restaurant_id', Auth::guard('restaurant')->user()->id)->where('name', $request->name)->exists()) {
            return redirect()->back()->with('error', 'Produk sudah ada');
        }

        $file = $request->file('image');
        $contents = file_get_contents($file->getRealPath());
        $base64 = base64_encode($contents);
        $mimeType = $file->getMimeType();
        $base64Data = 'data:' . $mimeType . ';base64,' . base64_encode($contents);

        $product = Product::create([
            'restaurant_id' => Auth::guard('restaurant')->user()->id,
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $base64Data
        ]);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan');
    }

    public function changeProductStatus($id)
    {
        $product = Product::where('id', $id)->first();
        $curr_status = $product->status;
        $product->status = !$curr_status;
        $product->save();

        return redirect()->back()->with('success', 'Status produk berhasil diperbarui');
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->back()->with('success', 'Produk berhasil dihapus');
    }

    public function editProduct(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|numeric'
        ]);

        if($request->file('image') == null)
        {
            Product::find($request->productId)->update([
               "name" => $request->name,
               "price" => $request->price,
               "stock" => $request->stock
            ]);

            return redirect()->back()->with('success', 'Produk berhasil diperbarui');
        }else if($request->file('image') != null) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            $file = $request->file('image');
            $contents = file_get_contents($file->getRealPath());
            $base64 = base64_encode($contents);
            $mimeType = $file->getMimeType();
            $base64Data = 'data:' . $mimeType . ';base64,' . base64_encode($contents);

            Product::find($request->productId)->update([
                "image" => $base64Data,
                "name" => $request->name,
                "price" => $request->price,
                "stock" => $request->stock
            ]);

            return redirect()->back()->with('success', 'Produk berhasil diperbarui');
        }
        
        return redirect()->back()->with('error', 'Produk gagal diperbarui');
    }
}
