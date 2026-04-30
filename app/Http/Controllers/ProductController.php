<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Contact;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'stok' => 'required|integer',
        ]);

        Product::create($request->all());

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan!');
    }

    public function contact()
    {
        $contacts = Contact::all();
        return view('contact', compact('contacts'));
    }

    public function storeContact(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'pesan' => 'required',
        ]);

        Contact::create($request->all());

        return redirect()->back()->with('success', 'Kontak berhasil ditambahkan!');
    }
}