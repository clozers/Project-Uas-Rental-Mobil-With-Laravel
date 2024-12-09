<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\Pemesanan;
use App\Models\User;
class DashboardController extends Controller
{
    public function index()
{
    $user = auth()->user();
    $data = User::where('id', $user->id)->get();
    $totaluser = User::count();
    $totalData = Mobil::count(); // Hitung total mobil
    $ttldatapemesanan = Pemesanan::count();
    return view('dashboard', compact('totalData','totaluser','data','ttldatapemesanan'));
}
}
