<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $data_user = User::where('id', $user->id)->get();
        $data_mobil = Mobil::all();
        return view('pemesanan',compact('data_mobil','data_user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'mobil_id' => 'required|exists:mobils,id',
            'waktu' => 'required|integer|min:1',
            'jenis_bayar' => 'required|in:cash,card',
        ]);

        // Ambil data mobil untuk mendapatkan harga per hari
        $mobil = Mobil::findOrFail($request->mobil_id);

        // Hitung total harga
        $totalHarga = $mobil->harga * $request->waktu;

        // Simpan data pemesanan
        Pemesanan::create([
            'user_id' => Auth::id(),
            'mobil_id' => $request->mobil_id,
            'lama_sewa' => $request->waktu,
            'total_harga' => $totalHarga,
            'jenis_bayar' => $request->jenis_bayar,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('admin.pemesanan')->with('success', 'Pesanan berhasil dibuat! Untuk Melihat silahkan ke menu History Pesanan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemesanan $pemesanan)
    {
        //
    }
}
