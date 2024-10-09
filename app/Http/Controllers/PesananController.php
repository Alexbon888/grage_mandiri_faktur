<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesanan = Pesanan::all();
        return view('pesanan.index', compact('pesanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pesanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kepada' => 'required',
            'polsek' => 'required',
            'tanggal' => 'required',
            'kendaraan' => 'required',
            'nopol' => 'required',
            'item' => 'required',
            'quant' => 'required',
            'harga' => 'required',
        ]);

        Pesanan::create($request->all());

        return redirect()->route('pesanan.index')
                        ->with('success', 'Pesanan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pesanan $pesanan)
    {
        return view('pesanan.show', compact('pesanan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pesanan $pesanan)
    {
        return view('pesanan.edit', compact('pesanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        $request->validate([
            'kepada' => 'required',
            'polsek' => 'required',
            'tanggal' => 'required',
            'kendaraan' => 'required',
            'nopol' => 'required',
            'item' => 'required',
            'quant' => 'required',
            'harga' => 'required',
        ]);

        $pesanan->update($request->all());

        return redirect()->route('pesanan.index')
                        ->with('success', 'Pesanan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pesanan $pesanan)
    {
        $pesanan->delete();

        return redirect()->route('pesanan.index')
                        ->with('success', 'Pesanan berhasil dihapus.');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $pesanan = Pesanan::where('kepada', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('nopol', 'LIKE', "%{$searchTerm}%")
                    ->get();

        return view('pesanan.index', ['pesanan' => $pesanan]);
    }

}
