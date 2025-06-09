@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Daftar Kategori</h3>

        <form method="GET" action="{{ route('categories.index') }}" class="mb-3">
            <div class="row">
                <div class="col">
                    <input type="text" name="kode" class="form-control" placeholder="Filter Kode"
                        value="{{ request('kode') }}">
                </div>
                <div class="col">
                    <input type="text" name="nama" class="form-control" placeholder="Filter Nama"
                        value="{{ request('nama') }}">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="{{ route('categories.form', ['method' => 'new']) }}" class="btn btn-success">Tambah
                        Kategori</a>
                </div>
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $cat)
                    <tr>
                        <td>{{ $cat->kode }}</td>
                        <td>{{ $cat->nama }}</td>
                        <td>
                            <a href="{{ route('categories.show', $cat->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('categories.form', ['method' => 'edit', 'id' => $cat->id]) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{ route('categories.delete', $cat->id) }}" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin hapus kategori ini?')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $categories->links() }}
    </div>
@endsection
