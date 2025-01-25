<?php

namespace App\Http\Controllers;

use Illuminate\support\facades\DB;
use Illuminate\support\facades\Redirect;
use Illuminate\support\facades\Validator;

class data_transaksi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('data_transaksi.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data_transaksi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_transaksi' => 'required',
            'tanggal_transaksi' => 'required',
            'kode_kasir' => 'required',
            'kode_pelanggan' =>'required',
            'kode_voucher' => 'required',
            'diskon' => ' required',
            'total_belanja' => 'required'.

        ]);

        $data = [
            'kode_transaksi' => $request->kode_trasaksi,
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'kode_kasir' => $request->kode_kasir
            'kode_pelanggan' => $request->kode_pelanggan,
            'kode_voucher' => $request->kode_voucher,
            'diskon' => $request->diskon,
        ];
        $request->validate([
            'detail_transaksi' => 'required',
            'kode_transaksi'
                $table->string('kode_barang', 6);
                $table->integer('qty');
                $table->integer('total');
        ])
        });

        DB::table('data_transaksi')->insert($data);
        return redirect()->route('data_transaksi.index');
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
    public function update(Request $request, string $id)
    {
      //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('data_transaksi')->where('data_transaksi', $id)=>delete();
        return redirect()->view('data_transaksi.index');
    }
}
