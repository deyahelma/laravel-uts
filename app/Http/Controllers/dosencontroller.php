<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dosenmodel;

class dosencontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosen = dosenmodel::all();
        return view('dosen', compact('dosen'));
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
        $data = new dosenmodel;
        $data->nama = $request->nama;
        $data->nidn = $request->nidn;
        $data->bidang = $request->bidang;
        $data->save();
        return redirect()->route('dosen');
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
        $dosen = dosenmodel::all();
        $dosendetail = dosenmodel::FindOrFail($id);
        return view('dosen', compact('dosen', 'dosendetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = dosenmodel::FindOrFail($id);
        $data->nama = $request->nama;
        $data->nidn = $request->nidn;
        $data->bidang = $request->bidang;
        $data->save();
        return redirect()->route('dosen');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dosendetail = dosenmodel::FindOrFail($id);
        $dosendetail->delete();
        return redirect()->route('dosen');
    }
}
