<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;

class HistoryPemesananController extends Controller
{
    public function index()
    {
        // Ambil data pemesanan milik user yang sedang login
        $pemesanans = Pemesanan::with('mobil')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        // Tampilkan data ke view
        return view('history-pemesanan-user', compact('pemesanans'));
    }

}
