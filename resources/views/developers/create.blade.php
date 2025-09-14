@extends('layouts.app')

@section('title', 'Tambah Developer')

@section('content')
    <h1 class="mb-4">Tambah Developer</h1>

    {{-- Tampilkan pesan error validasi jika ada --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('developers.store') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label for="company_name" class="form-label">Perusahaan</label>
            <input type="text" name="company_name" id="company_name" class="form-control" value="{{ old('company_name') }}">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('developers.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
