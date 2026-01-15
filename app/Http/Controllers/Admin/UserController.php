<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
     // Tampilkan semua data
    public function index()
    {
        return view('admin.crud_tamplate.index');
    }

    // Tampilkan form tambah data
    public function create()
    {
        return view('admin.crud_tamplate.create-update-show');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        //
    }

    // Tampilkan detail satu data
    public function show($id)
    {
        return view('admin.crud_tamplate.create-update-show');
    }

    // Tampilkan form edit data
    public function edit($id)
    {
        return view('admin.crud_tamplate.create-update-show');
    }

    // Update data
    public function update(Request $request, $id)
    {
        //
    }

    // Hapus data
    public function destroy($id)
    {
        //
    }
}
