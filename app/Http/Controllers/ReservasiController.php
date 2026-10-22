<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;

class ReservasiController extends Controller
{
    public function index()
    {
        $reservasis = Reservasi::all();
        return view('index', compact('reservasis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pemesan' => 'required',
            'no_hp' => 'required',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        Reservasi::create($request->all());

        return redirect()->route('reservasi.index');
    }

    public function destroy($id)
    {
        Reservasi::destroy($id);
        return redirect()->route('reservasi.index');
    }
    
}