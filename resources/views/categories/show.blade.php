@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Detail Kategori</h3>
        <a href="{{ url('categories') }}" class="btn btn-secondary mt-3">Kembali</a>

        <table class="table">
            <tr>
                <th>Kode</th>
                <td>{{ $category->kode }}</td>
            </tr>
            <tr>
                <th>Nama</th>
                <td>{{ $category->nama }}</td>
            </tr>
        </table>

        <h4>Items dalam Kategori Ini</h4>
        @if ($category->masterItems->count() > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Harga Beli</th>
                        <th>Laba</th>
                        <th>Supplier</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category->masterItems as $item)
                        <tr>
                            <td>{{ $item->kode }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->jenis }}</td>
                            <td>{{ $item->harga_beli }}</td>
                            <td>{{ $item->laba }}</td>
                            <td>{{ $item->supplier }}</td>
                            <td>
                                <a href="{{ url('master-items/view/' . $item->kode) }}"
                                    class="btn btn-primary btn-sm">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <em>Tidak ada item pada kategori ini.</em>
        @endif
    </div>
@endsection
