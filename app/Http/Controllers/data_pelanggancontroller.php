<?php

namespace App\Http\Controllers;

use Illuminate\support\facades\DB;
use Illuminate\support\facades\Redirect;
use Illuminate\support\facades\Validator;


class data_pelanggancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('data_pelanggan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data_pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_pelanggan' => 'required',
            'nama_pelanggan' => 'required',
            'nohp' => 'required',

        ]);

        $data = [
            'kode_pelanggan' => $request->kode_pelanggan,
            'nama_pelanggan' => $request->nama_pelanggan,
            'nohp' => $request->nohp,

        ];

        DB::table('data_pelanggan')->insert($data);
        return redirect()->route('data_pelanggan.index');

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
        $barang =DB::table('data_pelanggan')->where('data_pelanggan', $id)->first();
    retrun view ('data_pelanggan.edit',compact('data_pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'nohp' => 'required',

        ]);

        $data = [
            'nama_pelanggan' => $request->nama_pelanggan,
            'nohp' => $request->nohp,

        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('data_pelanggan')->where('data_pelanggan', $id)=>delete();
        return redirect()->view('data_pelanggan.index');
    }
}
