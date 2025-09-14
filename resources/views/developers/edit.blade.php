@extends('layouts.app')

@section('title', 'Edit Developer')

@section('content')
    <h1 class="mb-4">Edit Developer</h1>

    {{-- Tampilkan error validasi jika ada --}}
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

    <form method="POST" action="{{ route('developers.update', $developer->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $developer->name) }}">
        </div>

        <div class="mb-3">
            <label for="company_name" class="form-label">Perusahaan</label>
            <input type="text" id="company_name" name="company_name" class="form-control" value="{{ old('company_name', $developer->company_name) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('developers.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
