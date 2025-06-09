@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ $method == 'edit' ? 'Edit Kategori' : 'Tambah Kategori' }}</h2>

        <form action="{{ url('categories/form/' . $method . ($method == 'edit' ? '/' . $category->id : '')) }}"
            method="POST">

            @csrf
           
            <div class="mb-3">
                <label for="kode" class="form-label">Kode Kategori</label>
                <input type="text" class="form-control" id="kode" name="kode"
                    value="{{ old('kode', $category->kode ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" id="nama" name="nama"
                    value="{{ old('nama', $category->nama ?? '') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">
                {{ $method == 'edit' ? 'Update' : 'Simpan' }}
            </button>
            <a href="{{ url('categories') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
