@extends('layouts.app')

@section('title', 'Daftar Game')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Daftar Game</h1>
        <a href="{{ route('games.create') }}" class="btn btn-primary">Tambah Game</a>
    </div>

    {{-- Alert sukses --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th>Judul</th>
                <th>Genre</th>
                <th>Developer</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($games as $game)
                <tr>
                    <td>{{ $game->title }}</td>
                    <td>{{ $game->genre }}</td>
                    <td>{{ $game->developer->name }}</td>
                    <td>
                        <a href="{{ route('games.edit', $game->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('games.destroy', $game->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus game ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
