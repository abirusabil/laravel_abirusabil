<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\RumahSakit;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       $rumahSakits = RumahSakit::all();
        $selectedRS = $request->get('rumah_sakit_id');

        $pasiens = Pasien::with('rumahSakit')
            ->when($selectedRS, function($query) use ($selectedRS) {
                return $query->where('rumah_sakit_id', $selectedRS);
            })
            ->get();

        return view('pasien.index', compact('pasiens', 'rumahSakits', 'selectedRS'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $rumahSakitId = $request->query('rumah_sakit_id');
        $rumahSakits = RumahSakit::all();
        return view('pasien.create', compact('rumahSakits', 'rumahSakitId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pasien' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:15',
            'rumah_sakit_id' => 'required|exists:rumah_sakits,id',
        ]);

        Pasien::create($request->all());

        return redirect()->route('pasien.index')->with('success', 'Pasien berhasil ditambahkan');
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
        $pasien = Pasien::findOrFail($id);
        $rumahSakits = RumahSakit::all();
        return view('pasien.edit', compact('pasien', 'rumahSakits'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_pasien' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:15',
            'rumah_sakit_id' => 'required|exists:rumah_sakits,id',
        ]);

        $pasien = Pasien::findOrFail($id);
        $pasien->update($request->all());

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();

        return response()->json(['success' => true]);
    }

    public function filterByRumahSakit($id)
    {
        $pasiens = Pasien::where('rumah_sakit_id', $id)->with('rumahSakit')->get();
        return response()->json($pasiens);
    }

}
