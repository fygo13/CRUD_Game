@extends('layouts.app')

@section('title', 'Tambah Game')

@section('content')
    <h1 class="mb-4">Tambah Game</h1>

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

    <form method="POST" action="{{ route('games.store') }}">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
        </div>

        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <input type="text" name="genre" id="genre" class="form-control" value="{{ old('genre') }}">
        </div>

        <div class="mb-3">
            <label for="developer_id" class="form-label">Developer</label>
            <select name="developer_id" id="developer_id" class="form-select">
                <option value="">-- Pilih Developer --</option>
                @foreach ($developers as $developer)
                    <option value="{{ $developer->id }}" {{ old('developer_id') == $developer->id ? 'selected' : '' }}>
                        {{ $developer->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('games.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
