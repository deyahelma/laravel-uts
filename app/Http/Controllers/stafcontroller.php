<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\stafmodel;

class stafcontroller extends Controller
{

    public function index()
    {
        $staf = stafmodel::all();
        return view('staf', compact('staf'));
    }

    public function store(Request $request)
    {
        $data = new stafmodel;
        $data->nik = $request->nik;
        $data->nama = $request->nama;
        $data->jabatan = $request->jabatan;
        $data->save();
        return redirect()->route('staf');
    }
    public function edit(string $id)
    {
        $staf = stafmodel::all();
        $stafdetail = stafmodel::FindOrFail($id);
        return view('staf', compact('staf', 'stafdetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = stafmodel::FindOrFail($id);
        $data->nik = $request->nik;
        $data->nama = $request->nama;
        $data->jabatan = $request->jabatan;
        $data->save();
        return redirect()->route('staf');
    }
    public function destroy(string $id)
    {
        $stafdetail = stafmodel::FindOrFail($id);
        $stafdetail->delete();
        return redirect()->route('staf');
    }
}
