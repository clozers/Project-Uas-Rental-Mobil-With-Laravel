<?php

namespace App\Http\Controllers;

use App\Models\DataPemesanan;
use Illuminate\Http\Request;
use App\Models\Pemesanan;

class DataPemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {

        $pemesanans = Pemesanan::with('mobil','user')->get();

        return view('datapesanan', compact('pemesanans'));
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
        //
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
}
