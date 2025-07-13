<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function index()
    {
        return Product::all();
    }

    function save(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string|max:1000',
            ]);

            $product = new Product();
            $product->name = $request->get('name');
            $product->description = $request->get('description');
            $product->save();

            return response()->json(['message' => 'Product berhasil ditambahkan'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e], 500);
        }
    }

    function delete($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();
            return response()->json(['message' => 'Product berhasil dihapus'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Product tidak ditemukan'], 500);
        }
    }
}
