<?php

namespace App\Http\Controllers;

use App\Models\Developer;        // Mengimpor model Developer untuk berinteraksi dengan tabel developers
use Illuminate\Http\Request;     // Mengimpor request untuk menangani data dari form

class DeveloperController extends Controller
{
    /**
     * Menampilkan semua data developer dari database.
     * Display a listing of the resource.
     */
    public function index()
    {
        $developers = Developer::all();     // Mengambil semua data developer
        return view('developers.index', compact('developers'));  // Mengirim data developer ke view 'developers.index'
    }

    /**
     * Menampilkan form untuk menambahkan developer baru.
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mengarahkan ke halaman form tambah developer
        return view('developers.create');
    }

    /**
     * Menyimpan data developer baru ke database.
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang dikirim dari form
        $request->validate([
            'name' => 'required',
            'company_name' => 'required',
        ]);

        Developer::create($request->all());   // Menyimpan data ke tabel developers
        return redirect()->route('developers.index')->with('success', 'Developer ditambahkan!');   // Redirect ke halaman daftar developer dengan pesan sukses
    }

    /**
     * Menampilkan detail developer tertentu (tidak digunakan di kode ini).
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Fungsi ini kosong, bisa diisi untuk menampilkan detail developer
    }

    /**
     * Menampilkan form edit data developer.
     * Show the form for editing the specified resource.
     */
    public function edit(Developer $developer)
    {
        // Mengirim data developer yang akan diedit ke view 'developers.edit'
        return view('developers.edit', compact('developer'));
    }

    /**
     * Memperbarui data developer di database.
     * Update the specified resource in storage.
     */
    public function update(Request $request, Developer $developer)
    {
        // Validasi data
        $request->validate([
            'name' => 'required',
            'company_name' => 'required',
        ]);

        $developer->update($request->all());   // Memperbarui data developer
        return redirect()->route('developers.index')->with('success', 'Developer diupdate!');   // Redirect kembali ke daftar developer dengan pesan sukses
    }

    /**
     * Menghapus developer dari database.
     * Remove the specified resource from storage.
     */
    public function destroy(Developer $developer)
    {
        $developer->delete();  // Menghapus data developer
        return redirect()->route('developers.index')->with('success', 'Developer dihapus!');  // Redirect ke daftar developer dengan pesan sukses
    }
}
