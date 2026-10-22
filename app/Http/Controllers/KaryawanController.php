<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    // Tampilkan daftar karyawan & form input
    public function index()
    {
        $karyawans = Karyawan::all();
        return view('karyawan.index', compact('karyawans'));
    }

    // Simpan data karyawan baru
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'level' => 'required',
            'nama_karyawan' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'jabatan' => 'required',
        ]);

        Karyawan::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'level' => $request->level,
            'nama_karyawan' => $request->nama_karyawan,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'jabatan' => $request->jabatan,
        ]);

        return redirect()->route('karyawan.index');
    }

    // Tampilkan halaman edit
    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('karyawan.edit', compact('karyawan'));
    }

    // Process update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'level' => 'required',
            'nama_karyawan' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'jabatan' => 'required',
        ]);

        $karyawan = Karyawan::findOrFail($id);
        
        $data = [
            'username' => $request->username,
            'email' => $request->email,
            'level' => $request->level,
            'nama_karyawan' => $request->nama_karyawan,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'jabatan' => $request->jabatan,
        ];

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $karyawan->update($data);

        return redirect()->route('karyawan.index');
    }

    // Hapus data karyawan
    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();

        return redirect()->route('karyawan.index');
    }
}