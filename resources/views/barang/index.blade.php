@extends('layouts.layout')

@section('header')

    <div class="app-content-header">
        <i--begin::container-->
        <div class="container-fluid">
            <i--begin::row-->
                <div class="row">
                    <div class="col-sm-6">ch3 class="mb-0">data barang</h3></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">aria-current="page">data barang</</li>
                        </ol>
                    </div>
                </div>
            </i--end::row-->
        </div>
        <i--end::container-->
    </div>

    @endsection

    @section('content')

    <table>
        <thead>
            <tr>
                <th>no</th>
                <th>kode barang</th>
                <th>nama barang</th>
                <th>kategori</th>
                <th>stok</th>
                <th>harga</th>
                <th>aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barang as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->kode_barang }}</td>
                <td>{{ $item->nama_barang }}</td>
                <td>{{ $item->kategori->nama_kategori }}</td>
                <td>{{ $item->stok }}</td>
                <td>{{ $item->harga }}</td>
                <td>
                    <a href="/barang/{{ $item->kode_barang }}/edit" class="btn btn-primary">edit</a>
                    <a href="/barang/delete/{{ $item->kode_barang }}" class="btn btn-danger">hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @endsection
