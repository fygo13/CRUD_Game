@extends('layouts.app')

@section('title', 'Daftar Developer')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Daftar Developer</h1>
        <a href="{{ route('developers.create') }}" class="btn btn-primary">Tambah Developer</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th>Nama</th>
                <th>Perusahaan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($developers as $developer)
                <tr>
                    <td>{{ $developer->name }}</td>
                    <td>{{ $developer->company_name }}</td>
                    <td>
                        <a href="{{ route('developers.edit', $developer->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('developers.destroy', $developer->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus developer ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
