<?php

namespace App\Http\Controllers;

use Illuminate\support\facades\DB;
use Illuminate\support\facades\Redirect;
use Illuminate\support\facades\Validator;

class data_kategoricontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('data_kategori.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data_kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_kategori' => 'required',
            'nama_kategori' => 'required',
            'supplier' => 'required',

        ]);

        $data = [
            'kode_kategori' => $request->kode_kategori,
            'nama_kategori' => $request->nama_kategori,
            'supplier' => $request->supplier,

        ];

        DB::table('data_kategori')->insert($data);
        return redirect()->route('data_kategori.index');

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
        $data_kategori = DB::table('data_kategori')->where('data_kategori', $id)->first();
        return view('data_kategori.edit', compact('data_kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'supplier' => 'required',

        ]);

        $data = [
            'nama_kategori' => $request->nama_kategori,
            'supplier' => $request->supplier,

        ];

        DB::table('data_kategori')->where('data_kategori', $id)->update($data);
        return redirect()->route('data_kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('data_kategori')->where('data_kategori', $id)->delete();
        return redirect()->view('data_kategori.index');
    }
}
