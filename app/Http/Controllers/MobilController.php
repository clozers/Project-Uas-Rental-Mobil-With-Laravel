<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = new Mobil;
        $data = $data->get();
        // dd($data);
        return view('mobil', compact('data', 'request'));
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
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'warna' => 'required|string|max:255',
            'no_polisi' => 'required|string|max:50',
            'jumlah_kursi' => 'required|integer|min:1',
            'tahun_beli' => 'required|date',
            'harga' => 'required|integer|min:10000|max:100000000',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $gambar = $request->file('gambar');
        $filename = date('Y-m-d') . $gambar->getClientOriginalName();
        $path = 'photo-mobil/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($gambar));

        $data['nama'] = $request->nama;
        $data['warna'] = $request->warna;
        $data['no_polisi'] = $request->no_polisi;
        $data['jumlah_kursi'] = $request->jumlah_kursi;
        $data['tahun_beli'] = $request->tahun_beli;
        $data['harga'] = $request->harga;
        $data['gambar'] = $filename;

        Mobil::create($data);

        // Redirect atau response
        return redirect()->back()->with('success', 'Data mobil berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'warna' => 'required|string|max:255',
            'no_polisi' => 'required|string|max:50',
            'jumlah_kursi' => 'required|integer|min:1',
            'tahun_beli' => 'required|date',
            'harga' => 'required|integer|min:10000|max:100000000',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
        $find = Mobil::find($id);

        $data['nama'] = $request->nama;
        $data['warna'] = $request->warna;
        $data['no_polisi'] = $request->no_polisi;
        $data['jumlah_kursi'] = $request->jumlah_kursi;
        $data['tahun_beli'] = $request->tahun_beli;
        $data['harga'] = $request->harga;


        $gambar = $request->file('gambar');
        if ($gambar) {
            $filename = date('Y-m-d') . $gambar->getClientOriginalName();
            $path = 'photo-mobil/' . $filename;

            if ($find->gambar) {
                Storage::disk('public')->delete('photo-mobil/' . $find->gambar);
            }

            Storage::disk('public')->put($path, file_get_contents($gambar));

            $data['gambar'] = $filename;
        }

        $find->update($data);
        return redirect()->route('admin.mobil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request, $id)
    {
        $data = Mobil::find($id);

        if ($data){
            $data->delete();
        }
        return redirect()->route('admin.mobil');
    }
}
