<?php

namespace App\Http\Controllers;

use Illuminate\support\facades\DB;
use Illuminate\support\facades\Redirect;
use Illuminate\support\facades\Validator;

class data_kasircontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('data_kasir.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data_kasir.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_kasir' => 'required',
            'nama_kasir' => 'required',
            'shift_mulai' => 'required',
            'shift_akhir' => 'required',
            'nohp' => 'required',
        ]);

        $data = [
            'kode_kasir' => $request->kode_kasir,
            'nama_kasir' => $request->nama_kasir,
            'shift_mulai' => $request->shift_mulai,
            'shift_akhir' => $request->shift_akhir,
            'nohp' => $request->noohp,
        ];

        DB::table('data_kasir')->insert($data);
        return redirect()->route('data_kasir.index');
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
        $data_kasir = DB::table('data_kasir')->where('data_kasir', $id)->first();
        return view('data_kasir.edit', compact('data_kasir'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id);
    {
        $request->validate([
            'kode_kasir' => 'required',
            'nama_kasir' => 'required',
            'shift_mulai' => 'required',
            'shift_akhir' => 'required',
            'nohp' => 'required',
        ]);

        $data = [
            'kode_kasir' => $request->kode_kasir,
            'nama_kasir' => $request->nama_kasir,
            'shift_mulai' => $request->shift_mulai,
            'shift_akhir' => $request->shift_akhir,
            'nohp' => $request->nohp,
        ];

        DB::table('data_kasir')->where('data_kasir', $id)->update($data);
        return redirect()->route('data_kasir.index');
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy(string $id)

    {
        DB::table('data_kasir')->where('data_kasir', $id)->delete();
        return redirect()->view('data_kasir.index');
    };
}
